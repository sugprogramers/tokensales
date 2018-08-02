<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUser/CUserModel");
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
            $now = (new DateTime())->format('Y-m-d H:i:s');
           
            $newuser = new CUserModel();
            $newuser->setFirstname($firstname);
            $newuser->setLastname($lastname);
            $newuser->setEmail($email);
            $newuser->setPassword($password);
            $newuser->setBirthday($now); //($birthday);
            $newuser->setPhone($phone);
            $newuser->setCCountryId("100"); //($countryId);
            $newuser->setCRegionId("103"); //($regionId);
            $newuser->setCity($city);
            $newuser->setPostal($postal);
            $newuser->setAddress1($address1);
            $newuser->setAddress2($address2);
            $newuser->setUsertype("INV"); //($usertype);
            
            $newuser->save();
 
            $response = array('redirect' => '', 'status' => 'success'); //'redirect' => base_url() . 'login'
            echo json_encode($response);
            
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
             
    }

}
