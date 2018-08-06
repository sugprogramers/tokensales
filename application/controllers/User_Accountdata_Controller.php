<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class User_Accountdata_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        
        $cUser = $this->CUserModel->get($this->session->id);
        $birthday = DateTime::createFromFormat('Y-m-d H:i:s', $cUser->birthday)->format('Y-m-d');
        $data = array(
                'phone' => $cUser->phone,
                'firstname' => $cUser->firstname,
                'lastname' => $cUser->lastname,
                'birthday' => $birthday,
                'address1' => $cUser->address1,
                'address2' => $cUser->address2,
                'c_country_id' => $cUser->c_country_id,
                'c_region_id' => $cUser->c_region_id,
                'city' => $cUser->city,
                'postal' => $cUser->postal,
                'email' => $cUser->email,
        );
        $this->load->view('header/header_admin');
        $this->load->view('user_accountdata', $data);
        $this->load->view('footer/footer_admin');
    }
    
    public function update_user_information() {
        log_message('error', "helloooooo");
        $firstname = $this->input->post("firstname");
        $lastname = $this->input->post("lastname");
        $phone = $this->input->post("phone");
        $birthday = $this->input->post("birthday");       
        $countryId = $this->input->post("country");
        $regionId = $this->input->post("region");
        $city = $this->input->post("city");
        $postal = $this->input->post("postal");
        $address1 = $this->input->post("address1");
        $address2 = $this->input->post("address2");
      
        try {      
            if(!isset($firstname) || trim($firstname) == '' || !isset($lastname) || trim($lastname) == '') {
                throw new SDException("Firtname/Lastname is not set");
            }
            if(!isset($phone) || trim($phone) == '' ) {
                throw new SDException("Phone is not set");
            }            
            if(!isset($birthday) || trim($birthday) == '' ) {
                throw new SDException("Birthday is not set");
            }
            if(!isset($countryId) || trim($countryId) == ''  || !isset($regionId) || trim($regionId) == '' ) {
                throw new SDException("Select Country/Region");
            }
            if(!isset($city) || trim($city) == '') {
               throw new SDException("City is not set");
            }
            if (!isset($postal) || trim($postal) == '' ) {
                throw new SDException("/Postal is not set");
            }
            if(!isset($address1) || trim($address1) == '' ) {
                throw new SDException("Address1 is not set");
            }
            
            $birthday_date = (new DateTime($birthday))->format('Y-m-d H:i:s');

            /* @var $user CUser */
            $cUser = $this->CUserModel->get($this->session->id);            
            $cUser->firstname = $firstname;
            $cUser->lastname = $lastname;
            $cUser->birthday = $birthday_date;
            $cUser->phone = $phone;
            $cUser->c_country_id = $countryId;
            $cUser->c_region_id = $regionId;
            $cUser->city = $city;
            $cUser->postal = $postal;
            $cUser->address1 = $address1;
            $cUser->address2 = $address2;
            
            $this->CUserModel->save($cUser, $this->session->id);
 
            $response = array('redirect' => '', 'status' => 'success'); 
            echo json_encode($response);
            
        }catch(SDException $e){
            $response = array('status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }        
        catch(Exception $e){
            $response = array('status' => 'error', 'msg' => 'InternalError');
            echo json_encode($response);
        }
    }

}
