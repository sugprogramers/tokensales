<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CCountryModel");
        $this->load->model("CRegionModel");
        
    }

    public function index() {
        if ($this->session->usertype === "ADM") {
            redirect(base_url() . 'admin_dashboard');
        }
        if ($this->session->usertype === "INV") {
            redirect(base_url() . 'investor_dashboard');
        }
        if ($this->session->usertype === "COMPMAN") {
            redirect(base_url() . 'company_dashboard');
        }
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
           
            $newuser = new CUser();
            $newuser->isactive = "Y";
            $newuser->firstname = $firstname;
            $newuser->lastname = $lastname;
            $newuser->email = $email;
            $newuser->password = $password;
            $newuser->birthday = $birthday_date;
            $newuser->phone = $phone;
            $newuser->c_country_id = $countryId;
            $newuser->c_region_id = $regionId;
            $newuser->city = $city;
            $newuser->postal = $postal;
            $newuser->address1 = $address1;
            $newuser->address2 = $address2;
            $newuser->usertype = $type;
            
            $this->CUserModel->save($newuser, "100");
 
            $response = array('redirect' => '', 'status' => 'success'); //'redirect' => base_url() . 'login'
            echo json_encode($response);
            
       } catch (Exception $e) {
            //log_message('error', $e->getMessage());
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
             
    }    
    
    public function get_country_list() {
        $countryId = "100";// ee.uu.
        if($this->input->post("countryId") !== NULL){
            $countryId = $this->input->post("countryId");
        }
        

        $country_list = $this->CCountryModel->getAll();
        
        $html = '<option value="">Choose a Country</option>';        
        foreach ($country_list as $country) {     
            if ($country->c_country_id == $countryId) {
                $html .= '<option value="'.$country->c_country_id.'" selected>'.$country->name.'</option>';            
            } else {
                $html .= '<option value="'.$country->c_country_id.'">'.$country->name.'</option>';            
            }
        }
        $response = array('html' => $html); 
        echo json_encode($response);
    }
    
    public function get_region_list() {
        $countryId = $this->input->post("countryId");
        $regionId = "";
        if($this->input->post("regionId") !== NULL){
            $regionId = $this->input->post("regionId");
        }
        $region_list = $this->CRegionModel->getRegionsByCountry($countryId);
        
        $html = '<option value="">Choose a Region</option>';
        foreach ($region_list as $region) { 
            if ($region->c_region_id == $regionId) {
                $html .= '<option value="'.$region->c_region_id.'" selected>'.$region->description.'</option>';            
            } else {
                $html .= '<option value="'.$region->c_region_id.'">'.$region->description.'</option>';            
            }
        }
        $response = array('html' => $html); 
        echo json_encode($response);
    }

}
