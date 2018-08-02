<?php

class FINReturninvestmentModel extends CI_Model
{
    
    private  $fin_returninvestment_id; 
    private  $isactive;
    private  $created;
    private  $createdby; 
    private  $updated;
    private  $updatedby;
    private  $status;
    private  $scheduleddate;
    private  $c_investor_id;
    private  $c_project_id; 
    private  $amount;
    private  $paymentdate;
    
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

     public function get($id) {
       $query = $this->db->get_where("fin_returninvestment", array('fin_returninvestment_id' => $id));
       $result = $query->result()[0];
       
       $this->fin_returninvestment_id = $result->fin_returninvestment_id;
       $this->isactive = $result->$isactive;
       $this->created = $result->created;
       $this->createdby = $result->createdby;
       $this->updated = $result->updated;
       $this->updatedby = $result->updatedby;
       
       $this->status = $result->status;
       $this->scheduleddate = $result->scheduleddate;
       $this->c_investor_id = $result->c_investor_id; 
       $this->c_project_id = $result->c_project_id; 
       $this->amount = $result->amount; 
       $this->paymentdate = $result->paymentdate; 
       return $this;
    }
    
    public function getAll(){
       $query = $this->db->get_where("fin_returninvestment", array('isactive' => "Y"));
       $result = $query->result();
       $data = array();
       foreach ($result as $value) {
          $obj = new FINReturninvestmentModel();
          $data[] = $obj->get($value->fin_returninvestment_id);
       }
       return $data;
    }
     
    function getId() {
         return $this->fin_returninvestment_id;
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

     function getScheduleddate() {
         return $this->scheduleddate;
     }

     function getCInvestor() {
         $obj = new CInvestorModel();
         return $obj->get($this->c_investor_id);
     }

     function getCProject() {
         $obj =  new CProjectModel();
         return $obj->get($this->c_project_id);
         
     }

     function getAmount() {
         return $this->amount;
     }

     function getPaymentdate() {
         return $this->paymentdate;
     }

     function setIsactive($isactive) {
         $this->isactive = $isactive;
     }

     function setStatus($status) {
         $this->status = $status;
     }

     function setScheduleddate($scheduleddate) {
         $this->scheduleddate = $scheduleddate;
     }

     function setC_investor_id($c_investor_id) {
         $this->c_investor_id = $c_investor_id;
     }

     function setC_project_id($c_project_id) {
         $this->c_project_id = $c_project_id;
     }

     function setAmount($amount) {
         $this->amount = $amount;
     }

     function setPaymentdate($paymentdate) {
         $this->paymentdate = $paymentdate;
     }


     
     function save() {
        $data = array(
            'fin_returninvestment_id' => $this->fin_returninvestment_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'status' => $this->status,
            'scheduleddate' => $this->scheduleddate,
            'c_investor_id' => $this->c_investor_id,
            'c_project_id' => $this->c_project_id,
            'amount' => $this->amount,
            'paymentdate' => $this->paymentdate
        );
        
        $this->db->where('fin_returninvestment_id', $this->fin_returninvestment_id);
        return $this->db->update('fin_returninvestment', $data);
    }    

}
