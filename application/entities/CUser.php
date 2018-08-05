<?php

class CUser {

    public $c_user_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $password;
    public $phone;
    public $firstname;
    public $lastname;
    public $birthday;
    public $address1;
    public $address2;
    public $c_country_id;
    public $c_region_id;
    public $city;
    public $postal;
    public $usertype;
    public $email;
    public $registertoken;
    public $tokenexpirationdate;
    public $status;
    
    public static function build($result){
        $cUser = new CUser();

        $cUser->c_user_id = $result->c_user_id;
        $cUser->isactive = $result->isactive;
        $cUser->created = $result->created;
        $cUser->createdby = $result->createdby;
        $cUser->updated = $result->updated;
        $cUser->updatedby = $result->updatedby;
        $cUser->password = $result->password;
        $cUser->phone = $result->phone;
        $cUser->firstname = $result->firstname;
        $cUser->lastname = $result->lastname;
        $cUser->birthday = $result->birthday;
        $cUser->address1 = $result->address1;
        $cUser->address2 = $result->address2;
        $cUser->c_country_id = $result->c_country_id;
        $cUser->c_region_id = $result->c_region_id;
        $cUser->city = $result->city;
        $cUser->postal = $result->postal;
        $cUser->usertype = $result->usertype;
        $cUser->email = $result->email;
        $cUser->registertoken = $result->registertoken;
        $cUser->tokenexpirationdate = $result->tokenexpirationdate;
        $cUser->status = $result->status;

        return $cUser;
    }

}