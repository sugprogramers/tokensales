<?php

class CProjectdocument {
    
    public $c_projectdocument_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $c_project_id;
    public $c_projectdocumenttype_id;
    public $c_file_id;    
    public $status;   
    
    public static function build($result){
        $cProjectdocument = new CProjectdocument();   

        $cProjectdocument->c_projectdocument_id = $result->c_projectdocument_id;
        $cProjectdocument->isactive = $result->isactive;
        $cProjectdocument->created = $result->created;
        $cProjectdocument->createdby = $result->createdby;
        $cProjectdocument->updated = $result->updated;
        $cProjectdocument->updatedby = $result->updatedby;
        $cProjectdocument->c_project_id = $result->c_project_id;
        $cProjectdocument->c_projectdocumenttype_id = $result->c_projectdocumenttype_id;
        $cProjectdocument->c_file_id = $result->c_file_id; 
        $cProjectdocument->status = $result->status; 
        
        return $cProjectdocument;
    }
}

