<?php

class CCountry {
    
    public $c_country_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $name;
    public $description;
    public $countrycode;  
    
    public static function build($result){
        $cCountry = new CCountry();
        $cCountry->c_country_id = $result->c_country_id;
        $cCountry->isactive = $result->isactive;
        $cCountry->created = $result->created;
        $cCountry->createdby = $result->createdby;
        $cCountry->updated = $result->updated;
        $cCountry->updatedby = $result->updatedby;
        $cCountry->name = $result->name;
        $cCountry->description = $result->description;
        $cCountry->countrycode = $result->countrycode; 
        
        return $cCountry;
    }
}