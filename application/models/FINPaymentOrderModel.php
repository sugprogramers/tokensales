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
    
    public function get_projects_ppayout(){
        $this->db->select('po.fin_payment_order_id, p.name, p.companyname, p.targetamt, curr.iso_code, p.datelimit, po.amount, po.scheduleddate');
        $this->db->from('fin_payment_order as po');
        $this->db->join('c_project  as p', 'po.c_project_id = p.c_project_id ');
        $this->db->join('c_currency as curr', 'p.c_currency_id = curr.c_currency_id');
        $this->db->where('po.status', 'PEND');
        return $this->db->get();
    }
    
    public function get_paymentOrderInfoById($finPaymentOrderId){
        
        $this->db->select('po.fin_payment_order_id, p.name, p.companyname, p.targetamt, curr.iso_code, p.datelimit, po.amount, po.scheduleddate, pm.paypalusername, pmu.address1, (curr.cursymbol || po.amount) as amountformatted, curr.cursymbol, curr.iso_code');
        $this->db->from('fin_payment_order as po');
        $this->db->join('c_project  as p', 'po.c_project_id = p.c_project_id ');
        $this->db->join('c_currency as curr', 'p.c_currency_id = curr.c_currency_id');
        $this->db->join('c_projectmanager as pm', 'p.c_projectmanager_id = pm.c_projectmanager_id');
        $this->db->join('c_user as pmu', 'pm.c_user_id = pmu.c_user_id');
        $this->db->where('po.fin_payment_order_id', $finPaymentOrderId);
        $this->db->where('po.status', 'PEND');
        return $this->db->get();
    }
    
    public function get_projectInfoByOrderPaymentId($finPaymentOrderId){
        
        $this->db->select('p.name');
        $this->db->from('fin_payment_order as po');
        $this->db->join('c_project  as p', 'po.c_project_id = p.c_project_id ');
        $this->db->where('po.fin_payment_order_id', $finPaymentOrderId);
        return $this->db->get();
    }

}
