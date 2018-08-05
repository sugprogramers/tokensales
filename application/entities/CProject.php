<?php

class CProject{
    
    public $c_project_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $name;    
    public $c_user_id;
    public $c_company_id;    
    public $c_currency_id;    
    public $datecontract;
    public $startdate;
    public $datefinish;
    public $c_projecttype_id;
    public $projectstatus;
    public $propertytype;
    public $qtyproperty;
    public $address1;
    public $c_country_id;
    public $c_region_id;
    public $city;

    // DEVELOPMENT LOAN AMTS
    public $totalyieldperc;
    public $loanterm;
    public $targetamt;
    
    // PAYPAL PAYIN INFORMATION
    public $payin_paypalusername;

    // PROJECT PRESENTATION
    public $homeimage_id;
    public $description;  
    
    public static function build($result){
        $cProject = new CProject();   
    
        $cProject->c_project_id = $result->c_project_id;
        $cProject->isactive = $result->isactive;
        $cProject->created = $result->created;
        $cProject->createdby = $result->createdby;
        $cProject->updated = $result->updated;
        $cProject->updatedby = $result->updatedby;
        $cProject->name = $result->name;
        $cProject->c_user_id = $result->c_user_id;
        $cProject->c_company_id = $result->c_company_id; 
        $cProject->c_currency_id = $result->c_currency_id; 
        $cProject->datecontract = $result->datecontract; 
        $cProject->startdate = $result->startdate; 
        $cProject->datefinish = $result->datefinish; 
        $cProject->c_projecttype_id = $result->c_projecttype_id; 
        $cProject->projectstatus = $result->projectstatus; 
        $cProject->propertytype = $result->propertytype; 
        $cProject->qtyproperty = $result->qtyproperty; 
        $cProject->address1 = $result->address1; 
        $cProject->c_country_id = $result->c_country_id; 
        $cProject->c_region_id = $result->c_region_id; 
        $cProject->city = $result->city; 
        $cProject->totalyieldperc = $result->totalyieldperc; 
        $cProject->loanterm = $result->loanterm; 
        $cProject->targetamt = $result->targetamt; 
        $cProject->payin_paypalusername = $result->payin_paypalusername; 
        $cProject->homeimage_id = $result->homeimage_id; 
        $cProject->description = $result->description; 
        
        return $cProject;
    }
}

