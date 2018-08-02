<?php

class FinPaymentHistoryModel extends CI_Model
{
    
    private $fin_payment_history_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $paymentdate;
    private $status;
    private $type;
    private $c_currency_id;
    private $amount;
    private $fromaccount;
    private $toaccount;
    private $description;
    private $fin_investment_id; 
    private $fin_returninvestment_id;
    
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function get($id) {
       $query = $this->db->get_where("fin_payment_history", array('fin_payment_history_id' => 'Y'));
       $result = $query->result()[0];
       
       $this->fin_payment_history_id = $result->$fin_payment_history_id;
       $this->isactive = $result->$isactive;
       $this->created = $result->created;
       $this->createdby = $result->createdby;
       $this->updated = $result->updated;
       $this->updatedby = $result->updatedby;
       
       $this->$paymentdate = $result->$paymentdate;
       $this->status = $result->status;
       $this->type = $result->type;
       $this->c_currency_id = $result->c_currency_id; 
       $this->amount = $result->amount; 
       $this->fromaccount = $result->fromaccount; 
       $this->toaccount = $result->toaccount; 
       $this->description = $result->description; 
       $this->in_investment_id = $result->in_investment_id; 
       $this->fin_returninvestment_id = $result->fin_returninvestment_id; 
       return $this;
    }
    
    public function getAll(){
       $query = $this->db->get_where("fin_payment_history", array('isactive' => "Y"));
       $result = $query->result();
       $data = array();
       foreach ($result as $value) {
          $obj = new FinPaymentHistoryModel();
          $data[] = $obj->get($value->fin_payment_history_id);
       }
       return $data;
    }
    
    function getId() {
        return $this->fin_payment_history_id;
    }

    function getIsactive() {
        return $this->isactive;
    }

    function getCreated() {
        return $this->created;
    }

    function getCreatedby() {
        return $this->createdby;
    }

    function getUpdated() {
        return $this->updated;
    }

    function getUpdatedby() {
        return $this->updatedby;
    }

    function getPaymentdate() {
        return $this->paymentdate;
    }

    function getStatus() {
        return $this->status;
    }

    function getType() {
        return $this->type;
    }

    function getCCurrency() {
        $obj = new CCurrencyModel();
        return $obj->get($this->c_currency_id);
    }

    function getAmount() {
        return $this->amount;
    }

    function getFromaccount() {
        return $this->fromaccount;
    }

    function getToaccount() {
        return $this->toaccount;
    }

    function getDescription() {
        return $this->description;
    }

    function getFinInvestment() {
        $obj = new FINInvestmentModel();
        return $obj->get($this->fin_investment_id);
    }

    function getFinReturninvestment() {
        $obj = new FINReturninvestmentModel();
        return $obj->get($this->fin_returninvestment_id);
    }

     function setIsactive($isactive) {
        $this->isactive = $isactive;
    }

    function setPaymentdate($paymentdate) {
        $this->paymentdate = $paymentdate;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setCCurrencyId($c_currency_id) {
        $this->c_currency_id = $c_currency_id;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setFromaccount($fromaccount) {
        $this->fromaccount = $fromaccount;
    }

    function setToaccount($toaccount) {
        $this->toaccount = $toaccount;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setFinInvestmentId($fin_investment_id) {
        $this->fin_investment_id = $fin_investment_id;
    }

    function setFinReturninvestmentId($fin_returninvestment_id) {
        $this->fin_returninvestment_id = $fin_returninvestment_id;
    }
            

    function save() {
        $data = array(
            'fin_payment_history_id' => $this->fin_payment_history_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'paymentdate' => $this->paymentdate,
            'status' => $this->status,
            'type' => $this->type,
            'c_currency_id' => $this->c_currency_id,
            'amount' => $this->amount,
            'fromaccount' => $this->fromaccount,
            'toaccount' => $this->toaccount,
            'description' => $this->description,
            'fin_investment_id' => $this->fin_investment_id,
            'fin_returninvestment_id' => $this->fin_returninvestment_id
        );
        
        $this->db->where('fin_payment_history_id', $this->fin_payment_history_id);
        return $this->db->update('fin_payment_history', $data);
    }    
     

}

?>