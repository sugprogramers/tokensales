<?php

class FINPaymentOrder
{
    
    public  $fin_payment_order_id; 
    public  $isactive;
    public  $created;
    public  $createdby; 
    public  $updated;
    public  $updatedby;
    public  $status;
    public  $scheduleddate;
    public  $amount;
    public  $ordertype;
    public  $c_project_id;
    public  $c_investor_id;
    
    public  $paymentdate;
     
    public static function build($result){
       $finPaymentOrder = new FINPaymentOrder();   
       
       $finPaymentOrder->fin_payment_order_id = $result->fin_payment_order_id;
       $finPaymentOrder->isactive = $result->isactive;
       $finPaymentOrder->created = $result->created;
       $finPaymentOrder->createdby = $result->createdby;
       $finPaymentOrder->updated = $result->updated;
       $finPaymentOrder->updatedby = $result->updatedby;
       
       $finPaymentOrder->status = $result->status;
       $finPaymentOrder->scheduleddate = $result->scheduleddate;
       $finPaymentOrder->amount = $result->amount; 
       
       $finPaymentOrder->ordertype = $result->ordertype; 
       $finPaymentOrder->c_project_id = $result->c_project_id; 
       $finPaymentOrder->c_investor_id = $result->c_investor_id; 

       $finPaymentOrder->paymentdate = $result->paymentdate; 
       return $finPaymentOrder;
    }
}

