<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/FINPaymentOrder.php";

class FINPaymentOrderModel extends CI_Model
{
    
    public function __construct(){
	parent::__construct();
	$this->load->database();    
    }

     public function get($id) {
       $query = $this->db->get_where("fin_payment_order", array('fin_payment_order_id' => $id));
       $queryresult = $query->result();
       if (!$queryresult) {
           return null;
       }
       
       $result = $queryresult[0];
       return FINPaymentOrder::build($result);
    }
    
    public function save($finPaymentOrder, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$finPaymentOrder->fin_payment_order_id){
            $finPaymentOrder->fin_payment_order_id = UUID::getRawUUID();
            $data = array(
                'fin_payment_order_id' => $finPaymentOrder->fin_payment_order_id,
                'isactive' => $finPaymentOrder->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'status' => $finPaymentOrder->status,
                'scheduleddate' => $finPaymentOrder->scheduleddate,
                'amount' => $finPaymentOrder->amount,
                'ordertype' => $finPaymentOrder->ordertype,
                'fin_investment_id' => $finPaymentOrder->fin_investment_id,
                'c_project_id' => $finPaymentOrder->c_project_id,
                'c_investor_id' => $finPaymentOrder->c_investor_id,
                'paymentdate' => $finPaymentOrder->paymentdate
            );
            return $this->db->insert('fin_payment_order', $data);
        }
        else{
            $data = array(
                'isactive' => $finPaymentOrder->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'status' => $finPaymentOrder->status,
                'scheduleddate' => $finPaymentOrder->scheduleddate,
                'amount' => $finPaymentOrder->amount,
                'ordertype' => $finPaymentOrder->ordertype,
                'fin_investment_id' => $finPaymentOrder->fin_investment_id,
                'c_project_id' => $finPaymentOrder->c_project_id,
                'c_investor_id' => $finPaymentOrder->c_investor_id,
                'paymentdate' => $finPaymentOrder->paymentdate
            );

            $this->db->where('fin_payment_order_id', $finPaymentOrder->fin_payment_order_id);
            return $this->db->update('fin_payment_order', $data); 
        }
    }
    
    public function getAll(){
       $query = $this->db->get_where("fin_payment_order", array('isactive' => "Y"));
       $result = $query->result();
       $data = array();
       foreach ($result as $value) {
          $data[] = FINPaymentOrder::build($value);
       }
       return $data;
    } 

}
