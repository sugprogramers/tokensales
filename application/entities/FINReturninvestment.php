<?php

class FINReturninvestment
{
    
    public  $fin_returninvestment_id; 
    public  $isactive;
    public  $created;
    public  $createdby; 
    public  $updated;
    public  $updatedby;
    public  $status;
    public  $scheduleddate;
    public  $fin_investment_id;
    public  $amount;
    public  $paymentdate;
    
    public static function build($result){
       $finReturninvestment = new FINReturninvestment();   
       
       $finReturninvestment->fin_returninvestment_id = $result->fin_returninvestment_id;
       $finReturninvestment->isactive = $result->isactive;
       $finReturninvestment->created = $result->created;
       $finReturninvestment->createdby = $result->createdby;
       $finReturninvestment->updated = $result->updated;
       $finReturninvestment->updatedby = $result->updatedby;
       
       $finReturninvestment->status = $result->status;
       $finReturninvestment->scheduleddate = $result->scheduleddate;
       $finReturninvestment->fin_investment_id = $result->fin_investment_id; 
       $finReturninvestment->amount = $result->amount; 
       $finReturninvestment->paymentdate = $result->paymentdate; 
       return $finReturninvestment;
    }
}

