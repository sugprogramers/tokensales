<?php

class CProjectmanager{
    
    public $c_projectmanager_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $c_user_id;
   
    // PAYPAL INFORMATION
    public $paypalusername;  
    
    public static function build($result){
        $cProjectmanager = new CProjectmanager();   

        $cProjectmanager->c_projectmanager_id = $result->c_projectmanager_id;
        $cProjectmanager->isactive = $result->isactive;
        $cProjectmanager->created = $result->created;
        $cProjectmanager->createdby = $result->createdby;
        $cProjectmanager->updated = $result->updated;
        $cProjectmanager->updatedby = $result->updatedby;
        $cProjectmanager->c_user_id = $result->c_user_id;
        $cProjectmanager->paypalusername = $result->paypalusername;
        
        return $cProjectmanager;
    } 
}

