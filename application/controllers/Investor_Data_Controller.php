<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_Data_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CInvestorModel");
        
        if($this->session->usertype !== "INV"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {      
        
        $data['userid'] = $this->session->id;
        $dataInvestor = [];
        
        //user info
        $cUser = $this->CUserModel->get($this->session->id);
        $birthday = DateTime::createFromFormat('Y-m-d H:i:s', $cUser->birthday)->format('Y-m-d');
        
        //investor info
        $cInvestor = $this->CInvestorModel->getByUserId($this->session->id);
        
        
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
        
        $dataInvestor = array(
                'c_investor_id' => ($cInvestor)?$cInvestor->c_investor_id:"",
                'c_tax_country_id' => ($cInvestor)?$cInvestor->c_tax_country_id:"",
                'taxfiscalnumber' => ($cInvestor)?$cInvestor->tax_fiscalnumber:"",
                'taxtin' => ($cInvestor)?$cInvestor->tax_ustin:"",
                'taxaddress' => ($cInvestor)?$cInvestor->tax_address1:"",
                'taxcity' => ($cInvestor)?$cInvestor->tax_city:"",
                'taxpostal' => ($cInvestor)?$cInvestor->tax_postal:"",
        );
        
        $data = $data + $dataInvestor; //merge_array($data, $dataInvestor)
        
        
        
        $this->load->view('header/header_admin');
        $this->load->view('investor_accountdata',$data);
        $this->load->view('footer/footer_admin');        
    }
    
    
    public function get_investment_list(){
      
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $userId =$this->input->get("id");
  
      $query = $this->FINInvestmentModel->get_investment_project_list($userId);
      $data = [];
        
      $count = 0;
      foreach ($query as $obj) {
           
           $data[] = array(
                $obj->name,
              
           );
           
           $count++;
          
       }
      
      $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($data),
                 "recordsFiltered" => count($data),
                 "data" => $data
            );

      echo json_encode($result);
      exit();
   }
   
   public function update_user_information() {
        
        
        $firstname = $this->input->post("firstname");
        $lastname = $this->input->post("lastname");
        $phone = $this->input->post("phone");
        $birthday = $this->input->post("birthday");       
        $countryId = $this->input->post("country");
        $regionId = $this->input->post("region");
        $city = "";
        $postal = "";
        $address1 = "";
        $address2 = "";
      
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
    
    
    public function update_tax_information() {
        
        //investor info
        $cInvestorF = $this->CInvestorModel->getByUserId($this->session->id);
        
        $investorId = ($cInvestorF)?$cInvestorF->c_investor_id:"";
        $fiscalNumber = $this->input->post("taxfiscalnumber");
        $tin = $this->input->post("taxtin");       
        $countryId = $this->input->post("taxcountry");
        $address = $this->input->post("taxaddress");
        $city = $this->input->post("taxcity");
        $postal = $this->input->post("taxpostal");
        $paypal = ($cInvestorF)?$cInvestorF->payin_paypalusername:"";
        
        try {      
            
            if(!isset($fiscalNumber) || trim($fiscalNumber) == '' ) {
                throw new SDException("Fiscal Number is not set");
            }            
           
            if(!isset($countryId) || trim($countryId) == '') {
                throw new SDException("Select Country");
            }
            if(!isset($city) || trim($city) == '') {
               throw new SDException("City is not set");
            }
            if (!isset($postal) || trim($postal) == '' ) {
                throw new SDException("/Postal is not set");
            }
            if(!isset($address) || trim($address) == '' ) {
                throw new SDException("Residential Address is not set");
            }
            
            log_message("ERROR", "CITY: " . $city);
            $cInvestor = $this->CInvestorModel->get($investorId);  
            if(!$cInvestor)
                $cInvestor = new CInvestor;
            
            $cInvestor->c_user_id = $this->session->id;
            $cInvestor->c_tax_country_id = $countryId;
            $cInvestor->tax_address1 = $address;
            $cInvestor->tax_city = $city;
            $cInvestor->tax_postal = $postal;
            $cInvestor->tax_fiscalnumber = $fiscalNumber;
            $cInvestor->tax_ustin = $tin;
            $cInvestor->payin_paypalusername= $paypal;
            
            $this->CInvestorModel->save($cInvestor, $this->session->id);
 
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
