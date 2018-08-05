<?php

class CCurrency {
    
    public $c_currency_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $iso_code;
    public $cursymbol;
    public $description;
    public $stdprecision;

    public static function build($result){
        $cCurrency = new CCurrency();
        
        $cCurrency->c_currency_id = $result->c_currency_id;
        $cCurrency->isactive = $result->isactive;
        $cCurrency->created = $result->created;
        $cCurrency->createdby = $result->createdby;
        $cCurrency->updated = $result->updated;
        $cCurrency->updatedby = $result->updatedby;
        $cCurrency->iso_code = $result->iso_code;
        $cCurrency->cursymbol = $result->cursymbol;
        $cCurrency->description = $result->description;
        $cCurrency->stdprecision = $result->stdprecision; 
        
        return $cCurrency;;
    }    
}