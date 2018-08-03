<?php

include "application/libraries/UUID.php";

class CUserModel extends CI_Model
{
  private $c_User_Id;
  private $isactive;
  private $created ;
  private $createdby ;
  private $updated ;
  private $updatedby ;
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
    

    public function get($id) {
       $query = $this->db->get_where("c_user", array('c_user_id' => $id));
       $result = $query->result()[0];
       $this->c_User_Id = $result->c_user_id;
       $this->isactive = $result->isactive;
       $this->created = $result->created;
       $this->createdby = $result->createdby;
       $this->updated = $result->updated;
       $this->updatedby = $result->updatedby;
       $this->password = $result->password;
       $this->phone = $result->phone;
       $this->firstname = $result->firstname;
       $this->lastname = $result->lastname;
       $this->birthday = $result->birthday;
       $this->address1 = $result->address1;
       $this->address2 = $result->address2;
       $this->c_country_id = $result->c_country_id;
       $this->c_region_id = $result->c_region_id;
       $this->city = $result->city;
       $this->postal = $result->postal;
       $this->usertype = $result->usertype;
       $this->email = $result->email;
       $this->registertoken = $result->registertoken;
       $this->tokenexpirationdate = $result->tokenexpirationdate;
       $this->status = $result->status;
       
       return $this;
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
     
     function getId() {
         return $this->c_User_Id;
     }

     function getIsactive() {
         return $this->isactive;
     }

     function getPassword() {
         return $this->password;
     }

     function getPhone() {
         return $this->phone;
     }

     function getFirstname() {
         return $this->firstname;
     }

     function getLastname() {
         return $this->lastname;
     }

     function getBirthday() {
         return $this->birthday;
     }

     function getAddress1() {
         return $this->address1;
     }

     function getAddress2() {
         return $this->address2;
     }

     function getCCountry() {
         $obj = new CCountryModel();
         return $obj->get($this->c_country_id);
     }

     function getCRegion() {
         $obj = new CRegionModel();
         return $obj->get($this->c_region_id);
     }

     function getCity() {
         return $this->city;
     }

     function getPostal() {
         return $this->postal;
     }

     function getUsertype() {
         return $this->usertype;
     }

     function getEmail() {
         return $this->email;
     }

     function getRegistertoken() {
         return $this->registertoken;
     }

     function getTokenexpirationdate() {
         return $this->tokenexpirationdate;
     }

     function getStatus() {
         return $this->status;
     }

     function setCUserId($c_User_Id) {
         $this->c_User_Id = $c_User_Id;
     }

     function setIsactive($isactive) {
         $this->isactive = $isactive;
     }

     function setPassword($password) {
         $this->password = $password;
     }

     function setPhone($phone) {
         $this->phone = $phone;
     }

     function setFirstname($firstname) {
         $this->firstname = $firstname;
     }

     function setLastname($lastname) {
         $this->lastname = $lastname;
     }

     function setBirthday($birthday) {
         $this->birthday = $birthday;
     }

     function setAddress1($address1) {
         $this->address1 = $address1;
     }

     function setAddress2($address2) {
         $this->address2 = $address2;
     }

     function setCCountryId($c_country_id) {
         $this->c_country_id = $c_country_id;
     }

     function setCRegionId($c_region_id) {
         $this->c_region_id = $c_region_id;
     }

     function setCity($city) {
         $this->city = $city;
     }

     function setPostal($postal) {
         $this->postal = $postal;
     }

     function setUsertype($usertype) {
         $this->usertype = $usertype;
     }

     function setEmail($email) {
         $this->email = $email;
     }

     function setRegistertoken($registertoken) {
         $this->registertoken = $registertoken;
     }

     function setTokenexpirationdate($tokenexpirationdate) {
         $this->tokenexpirationdate = $tokenexpirationdate;
     }

     function setStatus($status) {
         $this->status = $status;
     }

     
   
    function save(){    
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (!$this->c_User_Id) {     
            // NEW
            $data = array(
                'c_user_id' => UUID::getRawUUID(),
                'isactive' => 'Y',
                'created' => $now,
                'createdby' => '100',
                'updated' => $now,
                'updatedby' => '100',
                'password' => $this->password,
                'phone' => $this->phone,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'birthday' => $this->birthday,
                'address1' => $this->address1,
                'address2' => $this->address2,
                'c_country_id' => $this->c_country_id,
                'c_region_id' => $this->c_region_id,
                'city' => $this->city,
                'postal' => $this->postal,
                'usertype' => $this->usertype,
                'email' => $this->email,
                'status' => 'PEND'
            );
            return $this->db->insert('c_user', $data);                    
        } else {
            // UPDATE
            $data = array(
                'isactive' => $this->isactive,
                'updated' => $now,
                'updatedby' => $this->updatedby,
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

            $this->db->where('c_user_id', $this->c_User_Id);
            return $this->db->update('c_user', $data);  
        }

    }  

}

?>