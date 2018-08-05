<?php

class CProjectdocumenttype {
    public $c_projectdocumenttype_id;
    public $isactive;
    public $created ;
    public $createdby ;
    public $updated ;
    public $updatedby ;
    public $name;
    public $description;
    public $ismandatory;
    
    public static function build($result){
       $cProjectdocumenttype = new CProjectdocumenttype();   

       $cProjectdocumenttype->c_projectdocumenttype_id = $result->c_projectdocumenttype_id;
       $cProjectdocumenttype->isactive = $result->isactive;
       $cProjectdocumenttype->created = $result->created;
       $cProjectdocumenttype->createdby = $result->createdby;
       $cProjectdocumenttype->updated = $result->updated;
       $cProjectdocumenttype->updatedby = $result->updatedby;
       $cProjectdocumenttype->name = $result->name; 
       $cProjectdocumenttype->description = $result->description; 
       $cProjectdocumenttype->ismandatory = $result->ismandatory; 
       return $cProjectdocumenttype;
    }
}

