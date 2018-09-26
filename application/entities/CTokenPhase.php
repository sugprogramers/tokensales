<?php

class CTokenPhase{
    
    public $c_token_phase_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $total_coins_available;
    public $total_coins_sold;
    public $c_token_id;
    public $status;
    
    public static function build($result){
        $cTokenPhase = new CTokenPhase();   
    
        $cTokenPhase->c_token_phase_id = $result->c_token_phase_id;
        $cTokenPhase->isactive = $result->isactive;
        $cTokenPhase->created = $result->created;
        $cTokenPhase->createdby = $result->createdby;
        $cTokenPhase->updated = $result->updated;
        $cTokenPhase->updatedby = $result->updatedby;
        $cTokenPhase->total_coins_available = $result->total_coins_available;
        $cTokenPhase->total_coins_sold = $result->total_coins_sold;
        $cTokenPhase->c_token_id = $result->c_token_id; 
        $cTokenPhase->status = $result->status;
        
        return $cTokenPhase;
    }
}

