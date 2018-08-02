<?php

class FINInvestmentModel extends CI_Model
{
    
    
    private $fin_investment_id;
    private $isactive;
    private $created;
    private $createdby; 
    private $updated;
    private $updatedby;
    private $status;
    private $c_project_id; 
    private $c_investor_id;
    private $startdate;
    private $amount;
    
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }

     public function get_administrator(){
          return $this->db->get("fin_investment");
    }
    
    
    public function get($id) {
       $query = $this->db->get_where("fin_investment", array('fin_investment_id' => $id));
       $result = $query->result()[0];
       
       $this->fin_investment_id = $result->fin_investment_id;
       $this->isactive = $result->$isactive;
       $this->created = $result->created;
       $this->createdby = $result->createdby;
       $this->updated = $result->updated;
       $this->updatedby = $result->updatedby;
       
       $this->status = $result->status;
       $this->c_project_id = $result->c_project_id; 
       $this->c_investor_id = $result->c_investor_id; 
       $this->startdate = $result->startdate; 
       $this->amount = $result->amount; 
       return $this;
    }
    
    function getFin_investment_id() {
        return $this->fin_investment_id;
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

    function getStatus() {
        return $this->status;
    }

    function getC_project_id() {
        return $this->c_project_id;
    }

    function getC_investor_id() {
        return $this->c_investor_id;
    }

    function getStartdate() {
        return $this->startdate;
    }

    function getAmount() {
        return $this->amount;
    }

    function setFin_investment_id($fin_investment_id) {
        $this->fin_investment_id = $fin_investment_id;
    }

    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setCreatedby($createdby) {
        $this->createdby = $createdby;
    }

    function setUpdated($updated) {
        $this->updated = $updated;
    }

    function setUpdatedby($updatedby) {
        $this->updatedby = $updatedby;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setC_project_id($c_project_id) {
        $this->c_project_id = $c_project_id;
    }

    function setC_investor_id($c_investor_id) {
        $this->c_investor_id = $c_investor_id;
    }

    function setStartdate($startdate) {
        $this->startdate = $startdate;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function save(){
        $data = array(
            'fin_investment_id' => $this->fin_investment_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'status' => $this->status,
            'c_project_id' => $this->c_project_id,
            'c_investor_id' => $this->c_investor_id,
            'startdate' => $this->startdate,
            'amount' => $this->amount
        );
        $this->db->where('fin_investment_id', $this->fin_investment_id);
        return $this->db->update('fin_investment', $data);
    }  
}

?>