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
        $result = $query->result();
        if (!$result) {
            return false;            
        }
        
        $cUser = new CUser();       
        $cUser->c_user_id = $result[0]->c_user_id;
        $cUser->isactive = $result[0]->isactive;
        $cUser->created = $result[0]->created;
        $cUser->createdby = $result[0]->createdby;
        $cUser->updated = $result[0]->updated;
        $cUser->updatedby = $result[0]->updatedby;
        $cUser->password = $result[0]->password;
        $cUser->phone = $result[0]->phone;
        $cUser->firstname = $result[0]->firstname;
        $cUser->lastname = $result[0]->lastname;
        $cUser->birthday = $result[0]->birthday;
        $cUser->address1 = $result[0]->address1;
        $cUser->address2 = $result[0]->address2;
        $cUser->c_country_id = $result[0]->c_country_id;
        $cUser->c_region_id = $result[0]->c_region_id;
        $cUser->city = $result[0]->city;
        $cUser->postal = $result[0]->postal;
        $cUser->usertype = $result[0]->usertype;
        $cUser->email = $result[0]->email;
        $cUser->registertoken = $result[0]->registertoken;
        $cUser->tokenexpirationdate = $result[0]->tokenexpirationdate;
        $cUser->status = $result[0]->status;

        return $cUser;
   }
   
    public function loadByEmail($email) {
        $query = $this->db->get_where("c_user", array('email' => $email));
        $result = $query->result();
        if (!$result) {
            return false;            
        }
        
        $cUser = new CUser();       
        $cUser->c_user_id = $result[0]->c_user_id;
        $cUser->isactive = $result[0]->isactive;
        $cUser->created = $result[0]->created;
        $cUser->createdby = $result[0]->createdby;
        $cUser->updated = $result[0]->updated;
        $cUser->updatedby = $result[0]->updatedby;
        $cUser->password = $result[0]->password;
        $cUser->phone = $result[0]->phone;
        $cUser->firstname = $result[0]->firstname;
        $cUser->lastname = $result[0]->lastname;
        $cUser->birthday = $result[0]->birthday;
        $cUser->address1 = $result[0]->address1;
        $cUser->address2 = $result[0]->address2;
        $cUser->c_country_id = $result[0]->c_country_id;
        $cUser->c_region_id = $result[0]->c_region_id;
        $cUser->city = $result[0]->city;
        $cUser->postal = $result[0]->postal;
        $cUser->usertype = $result[0]->usertype;
        $cUser->email = $result[0]->email;
        $cUser->registertoken = $result[0]->registertoken;
        $cUser->tokenexpirationdate = $result[0]->tokenexpirationdate;
        $cUser->status = $result[0]->status;

        return $cUser;
   }   
     
    public function save($cUser){    
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (!$cUser->c_user_id) {     
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

            $this->db->where('c_user_id', $cUser->c_user_id);
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