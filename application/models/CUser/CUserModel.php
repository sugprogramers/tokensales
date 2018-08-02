<?php

class CUserModel extends CI_Model
{
  private $c_User_Id;
  private $isactive;
  private $created ;
  private $createdby ;
  private $updated ;
  private $updatedby ;
  private $username ;
  private $password ;
  private $phone ;
  private $firstname;
  private $lastname;
  private $birthday ;
  private $address1;
  private $address2;
  private $c_country_id ;
  private $c_region_id;
  private $city;
  private $postal ;
  private $usertype ;
  private $email ;
  private $registertoken ;
  private $tokenexpirationdate;
  private $status ;
    
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    

     public function getAll(){
          return $this->db->get("c_user");
     }
     
     
    public function get($id) {
       $query = $this->db->get_where("c_user", array('c_user_id' => $id));
       $result = $query->result()[0];
       
       $this->c_User_Id = $result->c_user_id;
       $this->isactive = $result->isactive;
       $this->created = $result->created;
       $this->createdby = $result->createdby;
       $this->updated = $result->updated;
       $this->updatedby = $result->updatedby;
       $this->username = $result->username; 
       return $this;
   }
   
    function save(){
        $data = array(
            'c_User_Id' => $this->c_User_Id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'username' => $this->username,
            'password' => $this->password,
            'phone' => $this->phone,
            'firstname' => $this->firstname,
            'lastname' => $this->lastnam,
            'birthday' => $this->birthday,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'c_country_id' => $this->c_country_id,
            'c_region_id' => $this->c_region_id,
            'city' => $this->city,
            'postal' => $this->postal,
            'usertype' => $this->usertype,
            'email' => $this->email,
            'registertoken' => $this->registertoken,
            'tokenexpirationdate' => $this->tokenexpirationdate,
            'status' => $this->status
        );
        $this->db->where('c_User_Id', $this->c_User_Id);
        return $this->db->update('c_User', $data);
    }  

}

?>