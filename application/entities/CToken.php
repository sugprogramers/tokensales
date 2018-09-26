<?php

class CToken{
    
    public $c_token_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    
    public $name;
    public $description;
    public $eth_coins;
    public $status;
    
    public static function build($result){
        $cToken = new CToken();   
    
        $cToken->c_token_id = $result->c_token_id;
        $cToken->isactive = $result->isactive;
        $cToken->created = $result->created;
        $cToken->createdby = $result->createdby;
        $cToken->updated = $result->updated;
        $cToken->updatedby = $result->updatedby;
        
        $cToken->name = $result->name;
        $cToken->description = $result->description;
        $cToken->eth_coins = $result->eth_coins; 
        $cToken->status = $result->status;
        
        return $cToken;
    }
}

