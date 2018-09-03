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
       $this->db->select("fin.fin_investment_id, "
                . " COALESCE(( select  sum(amount) from fin_payment_order where ordertype = 'RETIPAYIN' and fin_investment_id = fin.fin_investment_id),0) as earning, "
                . " COALESCE(ROUND(fin.amount*100/pr.targetamt,2),0) as percent,  case when  pr.projectstatus = 'ACT' THEN 0 ELSE 1 END as sorte, "
                . "fin.status as investmentstatus, fin.amount , date(fin.created) as investmentdate, cur.cursymbol, pr.c_project_id , pr.name,pr.companyname ,pr.projectstatus, COALESCE(pr.longitude,'') as longitude, COALESCE(pr.latitude,'') as latitude ");
        
        $this->db->from('fin_investment as fin');
        $this->db->join('c_project as pr', 'fin.c_project_id = pr.c_project_id ');
        $this->db->join('c_currency cur', 'pr.c_currency_id =cur.c_currency_id ');
        $this->db->join('c_investor as inv', 'fin.c_investor_id = inv.c_investor_id ');
        $this->db->where('inv.c_user_id', $userId);
        $this->db->or_where('pr.projectstatus' , 'FU');
        $this->db->or_where('pr.projectstatus' , 'COFU');
        $this->db->or_where('pr.projectstatus' , 'NCOFU');
        $this->db->or_where('pr.projectstatus' , 'FIN');
        $this->db->or_where('pr.projectstatus' , 'ACT');
        
        $this->db->order_by("sorte");
        
        

        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_investment_total_by_project_list($userId) {
       $this->db->select("sum(fin.amount) as amount , pr.c_project_id , pr.name,pr.companyname, cur.c_currency_id");

       $this->db->from('fin_investment as fin');
       $this->db->join('c_project as pr', 'fin.c_project_id = pr.c_project_id ');
       $this->db->join('c_currency cur', 'pr.c_currency_id =cur.c_currency_id ', 'left');
       $this->db->join('c_investor as inv', 'fin.c_investor_id = inv.c_investor_id ');
       $this->db->where('inv.c_user_id', $userId);
         $this->db->group_by('pr.c_project_id, pr.name,pr.companyname, cur.c_currency_id'); 

        $query = $this->db->get();
        return $query->result();
    }
    
    
     public function get_investment_detail($investmentId) {
         
       $this->db->select("fin.fin_investment_id, trunc(fin.startdate) as invdate, COALESCE(fin.amount,0) as invamount,"
                . " COALESCE(( select  sum(amount) from fin_payment_order where ordertype = 'RETIPAYIN' and fin_investment_id = fin.fin_investment_id),0) as invearns, "
                . " COALESCE(ROUND(CASE WHEN pr.targetamt = 0 THEN 0 ELSE (fin.amount*100/pr.targetamt) END ,2),0) as invpercent, "
                . " COALESCE(ROUND(CASE WHEN pr.targetamt = 0 THEN 0 ELSE (fin.amount*100/pr.targetamt) END ,0),0) as invpercentround, "
                . " COALESCE(pr.targetamt,0) as targetamt, trunc(pr.startdate) as startdate, pr.name as projectname, pr.totalyieldperc as totalyieldperc , cur.cursymbol " );
               
        $this->db->from('fin_investment as fin');
        $this->db->join('c_project as pr', 'fin.c_project_id = pr.c_project_id ');
        $this->db->join('c_currency cur', 'pr.c_currency_id =cur.c_currency_id ');
        $this->db->where('fin.fin_investment_id', $investmentId);

        $query = $this->db->get();
        return $query->result()[0];
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
        $this->db->or_where('status' , 'ACT');
        $this->db->or_where('status' , 'FIN');
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->amount;
    }
    
    public function getAmountInvestedByInvestorProject($userId, $c_project_id) {

        $this->db->select("COALESCE(sum(fin.amount),0) as amount ");
        $this->db->from('fin_investment as fin');
        $this->db->join('c_investor as inv', 'fin.c_investor_id = inv.c_investor_id ');
        $this->db->where('fin.c_project_id', $c_project_id);
        $this->db->where('inv.c_user_id',$userId);
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
    
    
   

 public function getSumAmountPerDay($idcompany=null, $idinvestor=null) {

        $this->db->select("COALESCE(sum(fin_investment.amount),0) as suma,  to_char( fin_investment.created, 'YYYY-MM-DD') as fecha ");
        $this->db->from('fin_investment');
        $this->db->join('c_project', 'c_project.c_project_id = fin_investment.c_project_id');   
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');  
        if($idcompany!=null)
            {$this->db->where('c_projectmanager.c_user_id', $idcompany);}
        $this->db->join('c_investor', 'c_investor.c_investor_id = fin_investment.c_investor_id');  
        if($idinvestor!=null)
            {$this->db->where('c_investor.c_user_id', $idinvestor);}
        //$this->db->where('status' , 'ACT');
        //$this->db->or_where('status' , 'FIN');
        $this->db->group_by("2");
        return $this->db->get();
        
    }
    
    public function getStatusOfInvestmentFromProject($status) {
        
        switch ($status) {
            case "COFU": return "Parked";
            case "NCOFU": return "Funding did not Complete";
            case "VO": return "Voided";
            case "ACT": return "Driving";
            case "FI": return "Finished";
            case "FU": return "Parked";
            default: break;
        }
        return "uknowkn";
    }

}

?>