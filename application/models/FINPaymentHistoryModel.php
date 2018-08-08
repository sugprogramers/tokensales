<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/FINPaymentHistory.php";

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
                'fin_payment_order_id' => $finPaymentHistory->fin_payment_order_id,
                'from_user_id' => $finPaymentHistory->from_user_id,
                'to_user_id' => $finPaymentHistory->to_user_id
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
                'fin_payment_order_id' => $finPaymentHistory->fin_payment_order_id,
                'from_user_id' => $finPaymentHistory->from_user_id,
                'to_user_id' => $finPaymentHistory->to_user_id
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

    
    public function loadByUser($userId){
        
        //$this->db->table('fin_payment_history');
        $this->db->where('from_user_id', $userId);
        $this->db->or_where('to_user_id', $userId);
        
        return $this->db->get('fin_payment_history');
    } 
    
    public function get_paymentHistoryDetailById($finPaymentHistoryId){
        
        $this->db->select('ph.fin_payment_history_id, ph.description, ph.paymentdate, ph.fromaccount, ph.toaccount, ph.from_user_id, ph.to_user_id, (curr.cursymbol || ph.amount) as amountformatted,
            po.ordertype, p.name, p.companyname, pm.paypalusername, iu.firstname, iu.lastname ');
        $this->db->from('fin_payment_history as ph');
        $this->db->join('c_currency as curr', 'ph.c_currency_id = curr.c_currency_id');
        $this->db->join('fin_payment_order as po','ph.fin_payment_order_id = po.fin_payment_order_id');
        $this->db->join('c_project as p', 'po.c_project_id = p.c_project_id ', 'left');
        $this->db->join('c_projectmanager as pm', 'p.c_projectmanager_id = pm.c_projectmanager_id', 'left');
        $this->db->join('c_investor as i', 'po.c_investor_id = i.c_investor_id ', 'left');
        $this->db->join('c_user as iu', 'i.c_user_id = iu.c_user_id ', 'left');
        $this->db->where('ph.fin_payment_history_id', $finPaymentHistoryId);
        return $this->db->get();
    } 
    
    
    public function get_statusName($status) {
        if ($status === 'PEND') {
            return 'Pending';
        } 
        if ($status === 'CO') {
            return 'Completed';
        } 
        if ($status === 'ERR') {
            return 'Error';
        } 
        return 'NONE';        
    }
    
    public function get_typeName($type) {
        if ($type === 'INT') {
            return 'Internal';
        } else if ($type === 'EXTIN') {
            return 'External-In';
        } else if ($type === 'EXTOUT') {
            return 'External-Out';
        } 
        return 'NONE';        
    }
    
    public function loadByPaymentOrderId($finPaymentOrderId) {
        $query = $this->db->get_where("fin_payment_history", array('fin_payment_order_id' => $finPaymentOrderId));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];      
        return FINPaymentHistory::build($result);
    }

}

?>