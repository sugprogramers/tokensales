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
    
    public function getAll(){
       $query = $this->db->get_where("fin_investment", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $obj = new FINInvestmentModel();
           $data[] = $obj->get($value->fin_investment_id);
       }
       return $data;
    }
    
    function getId() {
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

    function getCProject() {
        $obj =  new CProjectModel();
        return $obj->get($this->c_project_id);
    }

    function getCInvestor() {
        $obj = new CInvestorModel();
        return $obj->get($this->c_investor_id);
    }

    function getStartdate() {
        return $this->startdate;
    }

    function getAmount() {
        return $this->amount;
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

    function setCProjectId($c_project_id) {
        $this->c_project_id = $c_project_id;
    }

    function setCInvestorId($c_investor_id) {
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