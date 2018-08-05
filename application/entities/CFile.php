<?php

class CFile {
    
    public $c_file_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $name;
    public $datatype;
    public $path;
    
    public static function build($result){
        $cFile = new CFile(); 

        $cFile->c_file_id = $result->c_file_id;
        $cFile->isactive = $result->isactive;
        $cFile->created = $result->created;
        $cFile->createdby = $result->createdby;
        $cFile->updated = $result->updated;
        $cFile->updatedby = $result->updatedby;
        $cFile->name = $result->name;
        $cFile->datatype = $result->datatype;
        $cFile->path = $result->path; 
        
        return $cFile;
    }
}

