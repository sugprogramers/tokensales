<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/FINReturninvestment.php";

class FINReturninvestmentModel extends CI_Model
{
    
    public function __construct(){
	parent::__construct();
	$this->load->database();    
    }

     public function get($id) {
       $query = $this->db->get_where("fin_returninvestment", array('fin_returninvestment_id' => $id));
       $queryresult = $query->result();
       if (!$queryresult) {
           return null;
       }
       
       $result = $queryresult[0];
       return FINReturninvestment::build($result);
    }
    
    public function save($finReturninvestment, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$finReturninvestment->fin_returninvestment_id){
            $finReturninvestment->fin_returninvestment_id = UUID::getRawUUID();
            $data = array(
                'fin_returninvestment_id' => $finReturninvestment->fin_returninvestment_id,
                'isactive' => $finReturninvestment->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'status' => $finReturninvestment->status,
                'scheduleddate' => $finReturninvestment->scheduleddate,
                'c_investor_id' => $finReturninvestment->c_investor_id,
                'c_project_id' => $finReturninvestment->c_project_id,
                'amount' => $finReturninvestment->amount,
                'paymentdate' => $finReturninvestment->paymentdate
            );
            return $this->db->insert('fin_returninvestment', $data);
        }
        else{
            $data = array(
                'isactive' => $finReturninvestment->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'status' => $finReturninvestment->status,
                'scheduleddate' => $finReturninvestment->scheduleddate,
                'c_investor_id' => $finReturninvestment->c_investor_id,
                'c_project_id' => $finReturninvestment->c_project_id,
                'amount' => $finReturninvestment->amount,
                'paymentdate' => $finReturninvestment->paymentdate
            );

            $this->db->where('fin_returninvestment_id', $finReturninvestment->fin_returninvestment_id);
            return $this->db->update('fin_returninvestment', $data); 
        }
    }
    
    public function getAll(){
       $query = $this->db->get_where("fin_returninvestment", array('isactive' => "Y"));
       $result = $query->result();
       $data = array();
       foreach ($result as $value) {
          $data[] = FINReturninvestment::build($value);
       }
       return $data;
    } 

}
