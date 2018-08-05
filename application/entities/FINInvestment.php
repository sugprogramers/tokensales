<?php

class FINInvestment {   
    
    public $fin_investment_id;
    public $isactive;
    public $created;
    public $createdby; 
    public $updated;
    public $updatedby;
    public $status;
    public $c_project_id; 
    public $c_investor_id;
    public $startdate;
    public $amount;
    
    public static function build($result){
       $finInvestment = new FINInvestment();   
       
       $finInvestment->fin_investment_id = $result->fin_investment_id;
       $finInvestment->isactive = $result->isactive;
       $finInvestment->created = $result->created;
       $finInvestment->createdby = $result->createdby;
       $finInvestment->updated = $result->updated;
       $finInvestment->updatedby = $result->updatedby;
       
       $finInvestment->status = $result->status;
       $finInvestment->c_project_id = $result->c_project_id; 
       $finInvestment->c_investor_id = $result->c_investor_id; 
       $finInvestment->startdate = $result->startdate; 
       $finInvestment->amount = $result->amount; 
       return $finInvestment;
    }
}

