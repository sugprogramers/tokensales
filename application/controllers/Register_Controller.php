<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUser/CUserModel");
        $this->load->model("CCountry/CCountryModel");
        $this->load->model("CRegion/CRegionModel");
    }

    public function index() {
        $this->load->view('header/header_register');
        $this->load->view('register');
        $this->load->view('footer/footer_register');
    }

    public function register_user() {
        $firstname = $this->input->post("firstname");
        $lastname = $this->input->post("lastname");
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $phone = $this->input->post("phone");
        $birthday = $this->input->post("birthday");       
        $countryId = $this->input->post("country");
        $regionId = $this->input->post("region");
        $city = $this->input->post("city");
        $postal = $this->input->post("postal");
        $address1 = $this->input->post("address1");
        $address2 = $this->input->post("address2");
        $usertype = $this->input->post("usertype");                 
      
       try {      
            if(!isset($firstname) || trim($firstname) == '' || !isset($lastname) || trim($lastname) == '') {
                throw new Exception("Firtname/Lastname is not set");
            }
            if(!isset($email) || trim($email) == ''  || !isset($password) || trim($password) == '' ) {
                throw new Exception("Email/Password is not set");
            }
            if(!isset($phone) || trim($phone) == '' ) {
                throw new Exception("Phone is not set");
            }            
            if(!isset($birthday) || trim($birthday) == '' ) {
                throw new Exception("Birthday is not set");
            }
            if(!isset($countryId) || trim($countryId) == ''  || !isset($regionId) || trim($regionId) == '' ) {
                throw new Exception("Select Country/Region");
            }
            if(!isset($city) || trim($city) == '') {
               throw new Exception("City is not set");
            }
            if (!isset($postal) || trim($postal) == '' ) {
                throw new Exception("/Postal is not set");
            }
            if(!isset($address1) || trim($address1) == '' ) {
                throw new Exception("Address1 is not set");
            }
            
            /* @var $user CUser */
            $user = $this->CUserModel->loadByEmail($email);
            if($user != null) {
                throw new Exception("Email already used");
            }
        
            $birthday_date = (new DateTime($birthday))->format('Y-m-d H:i:s');
            
            $type = (strcmp($usertype,"investor") == 0 ? "INV" : "COMPMAN");
           
            $newuser = new CUserModel();
            $newuser->setFirstname($firstname);
            $newuser->setLastname($lastname);
            $newuser->setEmail($email);
            $newuser->setPassword($password);
            $newuser->setBirthday($birthday_date);
            $newuser->setPhone($phone);
            $newuser->setCCountryId($countryId);
            $newuser->setCRegionId($regionId);
            $newuser->setCity($city);
            $newuser->setPostal($postal);
            $newuser->setAddress1($address1);
            $newuser->setAddress2($address2);
            $newuser->setUsertype($type);
            
            $newuser->save();
 
            $response = array('redirect' => '', 'status' => 'success'); //'redirect' => base_url() . 'login'
            echo json_encode($response);
            
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
             
    }    
    
    public function get_country_list() {
        $country_list = $this->CCountryModel->getAll();
        
        $html = '<option value="">Choose a Country</option>';        
        foreach ($country_list as $country) {     
            if ($country->getId() == "100") { // ee.uu.
                $html .= '<option value="'.$country->getId().'" selected>'.$country->getName().'</option>';            
            } else {
                $html .= '<option value="'.$country->getId().'">'.$country->getName().'</option>';            
            }
        }
        $response = array('html' => $html); 
        echo json_encode($response);
    }
    
    public function get_region_list() {
        log_message('error', 'mi primer log');
        $countryId = $this->input->post("countryId");
        $region_list = $this->CRegionModel->getRegionsByCountry($countryId);
        
        $html = '<option value="">Choose a Region</option>';
        foreach ($region_list as $region) {     
            $html .= '<option value="'.$region->getId().'">'.$region->getDescription().'</option>';            
        }
        $response = array('html' => $html); 
        echo json_encode($response);
    }

}
