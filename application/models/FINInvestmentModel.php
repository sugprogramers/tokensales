<?php

include_once "application/libraries/UUID.php";
include_once "application/entities/FINInvestment.php";
include_once "application/entities/CInvestor.php";
include_once "application/entities/CProject.php";

class FINInvestmentModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model("FINInvestmentModel");
        $this->load->model("CProjectModel");
        $this->load->model("CInvestorModel");
    }

    public function get($id) {
        $query = $this->db->get_where("fin_investment", array('fin_investment_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }

        $result = $queryresult[0];
        return FINInvestment::build($result);
    }

    public function save($finInvestment, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (!$finInvestment->fin_investment_id) {
            $finInvestment->fin_investment_id = UUID::getRawUUID();
            $data = array(
                'fin_investment_id' => $finInvestment->fin_investment_id,
                'isactive' => $finInvestment->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'status' => $finInvestment->status,
                'c_project_id' => $finInvestment->c_project_id,
                'c_investor_id' => $finInvestment->c_investor_id,
                'startdate' => $finInvestment->startdate,
                'amount' => $finInvestment->amount
            );
            return $this->db->insert('fin_investment', $data);
        } else {
            $data = array(
                'isactive' => $finInvestment->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'status' => $finInvestment->status,
                'c_project_id' => $finInvestment->c_project_id,
                'c_investor_id' => $finInvestment->c_investor_id,
                'startdate' => $finInvestment->startdate,
                'amount' => $finInvestment->amount
            );
            $this->db->where('fin_investment_id', $finInvestment->fin_investment_id);
            return $this->db->update('fin_investment', $data);
        }
    }

    public function getAll() {
        $query = $this->db->get_where("fin_investment", array('isactive' => 'Y'));
        $result = $query->result();
        $data = array();
        foreach ($result as $value) {
            $data[] = FINInvestment::build($value);
        }
        return $data;
    }

    public function get_investment_project_list($userId) {
        $this->db->select("fin.fin_investment_id, fin.status as investmentstatus, fin.amount , date(fin.created) as investmentdate, cur.cursymbol, pr.c_project_id , pr.name,pr.companyname ,pr.projectstatus, COALESCE(pr.longitude,'') as longitude, COALESCE(pr.latitude,'') as latitude ");
        $this->db->from('fin_investment as fin');
        $this->db->join('c_project as pr', 'fin.c_project_id = pr.c_project_id ');
        $this->db->join('c_currency cur', 'pr.c_currency_id =cur.c_currency_id ');
        $this->db->join('c_investor as inv', 'fin.c_investor_id = inv.c_investor_id ');
        $this->db->where('inv.c_user_id', $userId);

        $query = $this->db->get();
        return $query->result();
    }

    public function getTotalInvestedByInvestor($investorId) {
        log_message("ERROR", "--***-- " . $investorId);
        //Esto a lo largo debe de ser una consulta mas compleja 
        //donde saca el real investment, quitando las devoluciones y todo eso
        $this->db->select("COALESCE(sum(amount),0) as amount ");
        $this->db->from('fin_investment');
        $this->db->where('c_investor_id', $investorId);
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->amount;
    }

    public function getInvestmentStatusName($status) {
        log_message("ERROR", "ESTADO INVESTMENT :" . $status);
        switch ($status) {
            case "PEND": return "Pending";
            case "VO": return "Voided";
            case "ACT": return "Active";
            case "FIN": return "Finished";
            default: break;
        }
        return "uknowkn";
    }

    public function getSumAmountByProject($c_project_id) {

        $this->db->select("COALESCE(sum(amount),0) as amount ");
        $this->db->from('fin_investment');
        $this->db->where('c_project_id', $c_project_id);
        $this->db->or_where(array('status' => 'ACT', 'status' => 'FIN'));
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->amount;
    }

    public function getCountInvestorsByProject($c_project_id) {

        $this->db->select("count(c_investor_id) as countinvestors ");
        $this->db->from('fin_investment');
        $this->db->where('c_project_id', $c_project_id);
        $this->db->or_where(array('status' => 'ACT', 'status' => 'FIN'));
        $this->db->distinct();
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->countinvestors;
    }

    public function invesment($monto, $c_project_id, $c_user_id) {

        $sumatotal = $this->getSumAmountByProject($c_project_id);
        $objInvestor = $this->CInvestorModel->getByUserId($c_user_id);
        $objProject = $this->CProjectModel->get($c_project_id);

        if ($objProject && $objProject->projectstatus == 'FU') {

            if ($objInvestor && (($objProject->targetamt - $sumatotal) >= $monto) && ($objInvestor->payinbalance >= $monto) ) {


                $now = (new DateTime())->format('Y-m-d H:i:s');

                $fin = new FINInvestment();
                $fin->amount = $monto;
                $fin->c_investor_id = $objInvestor->c_investor_id;
                $fin->c_project_id = $c_project_id;
                $fin->isactive = 'Y';
                $fin->status = 'PEND';
                $fin->startdate = $now;

                $val = $this->save($fin, $c_user_id);
                if ($val) {
                    $objInvestor->payinbalance =  $objInvestor->payinbalance - $monto;
                    $this->CInvestorModel->save( $objInvestor, $c_user_id);
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        else {return false;}
    }

}

?>