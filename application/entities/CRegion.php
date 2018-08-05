<?php

class CRegion{
    public $c_region_id;
    public $isactive;
    public $created ;
    public $createdby ;
    public $updated ;
    public $updatedby ;
    public $name;
    public $description;
    public $c_country_id;
    
    public static function build($result){
        $cRegion = new CRegion();   

        $cRegion->c_region_id = $result->c_region_id;
        $cRegion->isactive = $result->isactive;
        $cRegion->created = $result->created;
        $cRegion->createdby = $result->createdby;
        $cRegion->updated = $result->updated;
        $cRegion->updatedby = $result->updatedby;
        $cRegion->name = $result->name; 
        $cRegion->description = $result->description; 
        $cRegion->c_country_id = $result->c_country_id; 
        return $cRegion;
    }
}

