<?php

class CSalesPhase {

    public $c_sales_phase_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $coins_amt;
    public $c_user_id;
    public $c_token_phase_id;
    public $date;
    public $validation_string;
    public $payment_address;
    public $phase_number;
    public $status;

    public static function build($result) {
        $cSalesPhase = new CSalesPhase();

        $cSalesPhase->c_sales_phase_id = $result->c_sales_phase_id;
        $cSalesPhase->isactive = $result->isactive;
        $cSalesPhase->created = $result->created;
        $cSalesPhase->createdby = $result->createdby;
        $cSalesPhase->updated = $result->updated;
        $cSalesPhase->updatedby = $result->updatedby;

        $cSalesPhase->coins_amt = $result->coins_amt;
        $cSalesPhase->c_user_id = $result->c_user_id;
        $cSalesPhase->c_token_phase_id = $result->c_token_phase_id;
        $cSalesPhase->date = $result->date;
        $cSalesPhase->validation_string = $result->validation_string;
        $cSalesPhase->payment_address = $result->payment_address;
        $cSalesPhase->phase_number = $result->phase_number;
        $cSalesPhase->status = $result->status;


        return $cSalesPhase;
    }

}
