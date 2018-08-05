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
}

?>