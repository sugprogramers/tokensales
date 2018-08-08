<?php

class FINPaymentHistory
{
    
    public $fin_payment_history_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $paymentdate;
    public $status;
    public $type;
    public $c_currency_id;
    public $amount;
    public $fromaccount;
    public $toaccount;
    public $description;
    public $fin_payment_order_id;
    
    public $from_user_id;
    public $to_user_id;
    
    public static function build($result){
       $finPaymentHistory = new FINPaymentHistory();   
       
       $finPaymentHistory->fin_payment_history_id = $result->fin_payment_history_id;
       $finPaymentHistory->isactive = $result->isactive;
       $finPaymentHistory->created = $result->created;
       $finPaymentHistory->createdby = $result->createdby;
       $finPaymentHistory->updated = $result->updated;
       $finPaymentHistory->updatedby = $result->updatedby;
       
       $finPaymentHistory->paymentdate = $result->paymentdate;
       $finPaymentHistory->status = $result->status;
       $finPaymentHistory->type = $result->type;
       $finPaymentHistory->c_currency_id = $result->c_currency_id; 
       $finPaymentHistory->amount = $result->amount; 
       $finPaymentHistory->fromaccount = $result->fromaccount; 
       $finPaymentHistory->toaccount = $result->toaccount; 
       $finPaymentHistory->description = $result->description; 
       $finPaymentHistory->fin_payment_order_id = $result->fin_payment_order_id; 
       
       $finPaymentHistory->from_user_id = $result->from_user_id; 
       $finPaymentHistory->to_user_id = $result->to_user_id; 
       
       return $finPaymentHistory;
    }
}

