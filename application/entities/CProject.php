<?php

class CProject{
    
    public $c_project_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $name;    
    public $c_projectmanager_id;
    public $companyname;    
    public $c_currency_id;    
  
    public $c_projecttype_id;
    public $projectstatus;
    public $c_propertytype_id;
    public $qtyproperty;
    public $address1;
    public $c_country_id;
    public $c_region_id;
    public $city;

    // DEVELOPMENT LOAN AMTS
    public $totalyieldperc;
    public $loanterm;
    
    public $datelimit;
    public $targetamt;

    public $startdate;
    // PROJECT PRESENTATION
    public $homeimage_id;
    public $description;  
    
    //maps
    public $longitude;
    public $latitude;  
    
    public static function build($result){
        $cProject = new CProject();   
    
        $cProject->c_project_id = $result->c_project_id;
        $cProject->isactive = $result->isactive;
        $cProject->created = $result->created;
        $cProject->createdby = $result->createdby;
        $cProject->updated = $result->updated;
        $cProject->updatedby = $result->updatedby;
        $cProject->name = $result->name;
        $cProject->c_projectmanager_id = $result->c_projectmanager_id;
        $cProject->companyname = $result->companyname; 
        $cProject->c_currency_id = $result->c_currency_id; 
        $cProject->c_projecttype_id = $result->c_projecttype_id; 
        $cProject->projectstatus = $result->projectstatus; 
        $cProject->c_propertytype_id = $result->c_propertytype_id; 
        $cProject->qtyproperty = $result->qtyproperty; 
        $cProject->address1 = $result->address1; 
        $cProject->c_country_id = $result->c_country_id; 
        $cProject->c_region_id = $result->c_region_id; 
        $cProject->city = $result->city; 
        $cProject->totalyieldperc = $result->totalyieldperc; 
        $cProject->loanterm = $result->loanterm; 
        $cProject->datelimit = $result->datelimit; 
        $cProject->targetamt = $result->targetamt; 
        $cProject->startdate = $result->startdate; 
        $cProject->homeimage_id = $result->homeimage_id; 
        $cProject->description = $result->description; 
        
        $cProject->longitude = $result->longitude; 
        $cProject->latitude = $result->latitude; 
        
        return $cProject;
    }
}

