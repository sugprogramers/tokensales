<?php

include "application/libraries/UUID.php";
include "application/entities/CUser.php";

class CUserModel extends CI_Model
{
    public function __construct(){
	parent::__construct();
	$this->load->database();
    }
    

    public function get($id) {
       $query = $this->db->get_where("c_user", array('c_user_id' => $id));
       $result = $query->result()[0];
       $cUser = new CUser();
       
       $cUser->c_user_Id = $result->c_user_id;
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
     
    public function save($cUser){    
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (!$cUser->c_user_Id) {     
            // NEW
            $data = array(
                'c_user_id' => UUID::getRawUUID(),
                'isactive' => 'Y',
                'created' => $now,
                'createdby' => '100',
                'updated' => $now,
                'updatedby' => '100',
                'password' => $cUser->password,
                'phone' => $cUser->phone,
                'firstname' => $cUser->firstname,
                'lastname' => $cUser->lastname,
                'birthday' => $cUser->birthday,
                'address1' => $cUser->address1,
                'address2' => $cUser->address2,
                'c_country_id' => $cUser->c_country_id,
                'c_region_id' => $cUser->c_region_id,
                'city' => $cUser->city,
                'postal' => $cUser->postal,
                'usertype' => $cUser->usertype,
                'email' => $cUser->email,
                'status' => 'PEND'
            );
            return $this->db->insert('c_user', $data);                    
        } else {
            // UPDATE
            $data = array(
                'isactive' => $cUser->isactive,
                'updated' => $now,
                'updatedby' => $cUser->updatedby,
                'password' => $cUser->password,
                'phone' => $cUser->phone,
                'firstname' => $cUser->firstname,
                'lastname' => $cUser->lastnam,
                'birthday' => $cUser->birthday,
                'address1' => $cUser->address1,
                'address2' => $cUser->address2,
                'c_country_id' => $cUser->c_country_id,
                'c_region_id' => $cUser->c_region_id,
                'city' => $cUser->city,
                'postal' => $cUser->postal,
                'usertype' => $cUser->usertype,
                'email' => $cUser->email,
                'registertoken' => $cUser->registertoken,
                'tokenexpirationdate' => $cUser->tokenexpirationdate,
                'status' => $cUser->status
            );

            $this->db->where('c_user_id', $cUser->c_User_Id);
            return $this->db->update('c_user', $data);  
        }

    }  
    
    
    public function getAll(){
       $query = $this->db->get_where("c_user", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $obj = new CUserModel();
           $data[] = $obj->get($value->c_user_id);
       }
       return $data;
    }
    
    public function get_all_investor(){
         $this->db->where("usertype", "INV");
        return $this->db->get("c_user");
    } 
    
    public function get_all_company(){
         $this->db->where("usertype", "COMPMAN");
        return $this->db->get("c_user");
    } 

}

?>