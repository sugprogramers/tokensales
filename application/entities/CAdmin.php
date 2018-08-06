<?php

class CAdmin{
    
    public $c_admin_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $c_user_id;
   
    // PAYPAL INFORMATION
    public $paypalusername;  
    
    public static function build($result){
        $cAdmin = new CAdmin();   

        $cAdmin->c_admin_id = $result->c_admin_id;
        $cAdmin->isactive = $result->isactive;
        $cAdmin->created = $result->created;
        $cAdmin->createdby = $result->createdby;
        $cAdmin->updated = $result->updated;
        $cAdmin->updatedby = $result->updatedby;
        $cAdmin->c_user_id = $result->c_user_id;
        $cAdmin->paypalusername = $result->paypalusername;
        
        return $cAdmin;
    } 
}

