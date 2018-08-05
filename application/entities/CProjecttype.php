<?php

class CProjecttype{
    public $c_projecttype_id;
    public $isactive;
    public $created ;
    public $createdby ;
    public $updated ;
    public $updatedby ;
    public $name;
    public $description;
    
    public static function build($result){       
       $cProjecttype = new CProjecttype();   

       $cProjecttype->c_projecttype_id = $result->c_projecttype_id;
       $cProjecttype->isactive = $result->isactive;
       $cProjecttype->created = $result->created;
       $cProjecttype->createdby = $result->createdby;
       $cProjecttype->updated = $result->updated;
       $cProjecttype->updatedby = $result->updatedby;
       $cProjecttype->name = $result->name; 
       $cProjecttype->description = $result->description; 
       return $cProjecttype;
    }
}

