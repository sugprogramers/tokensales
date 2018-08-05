<?php

class CEmailqueueModel {
    
    public $c_emailqueue_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $rcptto;
    public $subject;
    public $body;
    public $status;
    public $emaillog;    
    public $c_user_id;
    
    public static function build($result){
        $cEmailqueue = new CEmailqueueModel();   
        
        $cEmailqueue->c_emailqueue_id = $result->c_emailqueue_id;
        $cEmailqueue->isactive = $result->isactive;
        $cEmailqueue->created = $result->created;
        $cEmailqueue->createdby = $result->createdby;
        $cEmailqueue->updated = $result->updated;
        $cEmailqueue->updatedby = $result->updatedby;
        $cEmailqueue->rcptto = $result->rcptto;
        $cEmailqueue->subject = $result->subject;
        $cEmailqueue->body = $result->body;
        $cEmailqueue->status = $result->status; 
        $cEmailqueue->emaillog = $result->emaillog; 
        $cEmailqueue->c_user_id = $result->c_user_id;                
        
        return $cEmailqueue;
    }
}

