<?php
class CCompany {
    
    public $c_company_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $c_user_id;
    public $name;
    public $description;
    public $url;
    public $taxid;
    public $address1;
    public $address2;
    public $c_country_id;    
    public $c_region_id;    
    public $city;  
    public $postal;  
    
    public static function build($result){
        $cCompany = new CCompany();   
        $cCompany->c_company_id = $result->c_company_id;
        $cCompany->isactive = $result->isactive;
        $cCompany->created = $result->created;
        $cCompany->createdby = $result->createdby;
        $cCompany->updated = $result->updated;
        $cCompany->updatedby = $result->updatedby;
        $cCompany->c_user_id = $result->c_user_id;
        $cCompany->name = $result->name;
        $cCompany->description = $result->description;
        $cCompany->url = $result->url;
        $cCompany->taxid = $result->taxid;
        $cCompany->address1 = $result->address1;
        $cCompany->address2 = $result->address2;
        $cCompany->c_country_id = $result->c_country_id;
        $cCompany->c_region_id = $result->c_region_id;
        $cCompany->city = $result->city;
        $cCompany->postal = $result->postal;
        
        return $cCompany;
    }
}

?>