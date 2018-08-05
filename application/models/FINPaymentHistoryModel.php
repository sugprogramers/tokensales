<?php
include "application/libraries/UUID.php";
include "application/entities/FINPaymentHistory.php";

class FINPaymentHistoryModel extends CI_Model
{  
    
    public function __construct(){
	parent::__construct();
	$this->load->database();
    }
    
    public function get($id) {
       $query = $this->db->get_where("fin_payment_history", array('fin_payment_history_id' => $id));
       $queryresult = $query->result();
       if (!$queryresult) {
           return null;
       }
        
       $result = $queryresult[0]; 
       return FINPaymentHistory::build($result);
    }

    public function save($finPaymentHistory, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$finPaymentHistory->fin_payment_history_id){
            $finPaymentHistory->fin_payment_history_id = UUID::getRawUUID();
            $data = array(
                'fin_payment_history_id' => $finPaymentHistory->fin_payment_history_id,
                'isactive' => $finPaymentHistory->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'paymentdate' => $finPaymentHistory->paymentdate,
                'status' => $finPaymentHistory->status,
                'type' => $finPaymentHistory->type,
                'c_currency_id' => $finPaymentHistory->c_currency_id,
                'amount' => $finPaymentHistory->amount,
                'fromaccount' => $finPaymentHistory->fromaccount,
                'toaccount' => $finPaymentHistory->toaccount,
                'description' => $finPaymentHistory->description,
                'fin_investment_id' => $finPaymentHistory->fin_investment_id,
                'fin_returninvestment_id' => $finPaymentHistory->fin_returninvestment_id
            );
            return $this->db->insert('fin_payment_history', $data);
        }
        else{
            $data = array(
                'isactive' => $finPaymentHistory->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'paymentdate' => $finPaymentHistory->paymentdate,
                'status' => $finPaymentHistory->status,
                'type' => $finPaymentHistory->type,
                'c_currency_id' => $finPaymentHistory->c_currency_id,
                'amount' => $finPaymentHistory->amount,
                'fromaccount' => $finPaymentHistory->fromaccount,
                'toaccount' => $finPaymentHistory->toaccount,
                'description' => $finPaymentHistory->description,
                'fin_investment_id' => $finPaymentHistory->fin_investment_id,
                'fin_returninvestment_id' => $finPaymentHistory->fin_returninvestment_id
            );

            $this->db->where('fin_payment_history_id', $finPaymentHistory->fin_payment_history_id);
            return $this->db->update('fin_payment_history', $data);   
        }
    } 
    
    public function getAll(){
       $query = $this->db->get_where("fin_payment_history", array('isactive' => "Y"));
       $result = $query->result();
       $data = array();
       foreach ($result as $value) {
          $data[] = FINPaymentHistory::build($value);
       }
       return $data;
    }   

}

?>