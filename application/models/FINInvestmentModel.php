<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/FINInvestment.php";

class FINInvestmentModel extends CI_Model
{
    
    public function __construct(){
	parent::__construct();
	$this->load->database();
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
        if(!$finInvestment->fin_investment_id){
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
        }
        else{
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
    
    public function getAll(){
       $query = $this->db->get_where("fin_investment", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $data[] = FINInvestment::build($value);
       }
       return $data;
    }  
    
    public function get_investment_project_list($userId){
       $this->db->select("fin.fin_investment_id, fin.status as investmentstatus, fin.amount , date(fin.created) as investmentdate, cur.cursymbol, pr.c_project_id , pr.name,pr.companyname ,pr.projectstatus, COALESCE(pr.longitude,'') as longitude, COALESCE(pr.latitude,'') as latitude ");
       $this->db->from('fin_investment as fin');
       $this->db->join('c_project as pr', 'fin.c_project_id = pr.c_project_id ');
       $this->db->join('c_currency cur', 'pr.c_currency_id =cur.c_currency_id ');
       $this->db->join('c_investor as inv', 'fin.c_investor_id = inv.c_investor_id ');
       $this->db->where('inv.c_user_id', $userId);
       
       $query =  $this->db->get();
       return $query->result() ;
    }
    
    public function getInvestmentStatusName($status){
        log_message("ERROR","ESTADO INVESTMENT :". $status);
        switch ($status) {
            case "PEND": return "Pending";
            case "VO": return "Voided";
            case "ACT": return "Active";
            case "FIN": return "Finished";
            default: break;
        }
        return "uknowkn";
    }
    
}

?>