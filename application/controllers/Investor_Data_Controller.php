<?php

include 'application/libraries/SDException.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_Data_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CInvestorModel");
        $this->load->model("CFileModel");
        
        if (!$this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {      
        
        $data['userid'] = $this->session->session_investor['id'];
        $dataInvestor = [];
        
        //user info
        $cUser = $this->CUserModel->get($this->session->session_investor['id']);
        $birthday = DateTime::createFromFormat('Y-m-d H:i:s', $cUser->birthday)->format('Y-m-d');
        
        //investor info
        $cInvestor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
        
        
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
        
        $fileFront = $this->CFileModel->get(($cInvestor)?$cInvestor->c_docimgfront_id:"");
        $pathFront = ($fileFront)?$fileFront->path.$fileFront->name : "";
        $fileBack = $this->CFileModel->get(($cInvestor)?$cInvestor->c_docimgback_id:"");
        $pathBack = ($fileBack)?$fileBack->path.$fileBack->name : "";
        
        $dataInvestor = array(
                'c_investor_id' => ($cInvestor)?$cInvestor->c_investor_id:"",
                'c_tax_country_id' => ($cInvestor)?$cInvestor->c_tax_country_id:"",
                'taxfiscalnumber' => ($cInvestor)?$cInvestor->tax_fiscalnumber:"",
                'taxtin' => ($cInvestor)?$cInvestor->tax_ustin:"",
                'taxaddress' => ($cInvestor)?$cInvestor->tax_address1:"",
                'taxaddresssec' => ($cInvestor)?$cInvestor->tax_address2:"",
                'taxcity' => ($cInvestor)?$cInvestor->tax_city:"",
                'taxprovince' => ($cInvestor)?$cInvestor->tax_province:"",
                'taxpostal' => ($cInvestor)?$cInvestor->tax_postal:"",
                'taxisuscitizen' => ($cInvestor)?(($cInvestor->tax_isuscitizen=="Y")?"Y":"N"):"N",
                'paypalacct' => ($cInvestor)?$cInvestor->payin_paypalusername:"",
            
                'documenttype' => ($cInvestor)?$cInvestor->documenttype:"",
                'documentno' => ($cInvestor)?$cInvestor->documentnumber:"",
                
                'imgFront' => $pathFront, //"./upload/imgs/2d2391831b36f5135e472d02be29145d.png",
                'imgBack' => $pathBack,//"./upload/imgs/072eaa5741ba4213221ed5138eb2d7a9.png",
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
            $cUser = $this->CUserModel->get($this->session->session_investor['id']);       
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
            
            $this->CUserModel->save($cUser, $this->session->session_investor['id']);
 
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
        $cInvestorF = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
        $investorId = ($cInvestorF)?$cInvestorF->c_investor_id:"";
        
        
        $fiscalNumber = $this->input->post("taxfiscalnumber");
        $isCitizen =   ($this->input->post("isuscitizen"))?"Y":"N";
        $tin = $this->input->post("taxtin");       
        $countryId = $this->input->post("taxcountry");
        $address = $this->input->post("taxaddress");
        $addressSec = $this->input->post("taxaddresssec");
        $city = $this->input->post("taxcity");
        $province = $this->input->post("taxprovince");
        $postal = $this->input->post("taxpostal");
        
        $status = ($cInvestorF)?$cInvestorF->status:"PEND";
        $user = ($cInvestorF)?$cInvestorF->c_user_id:$this->session->session_investor['id']; 
        $paypal = ($cInvestorF)?$cInvestorF->payin_paypalusername:"";
        $payinbalance = ($cInvestorF)?$cInvestorF->payinbalance:0;
        $payoutbalance = ($cInvestorF)?$cInvestorF->payoutbalance:0;
        $pendingbalance = ($cInvestorF)?$cInvestorF->pendingbalance:0;
        
        
        
        try {      
            log_message("ERROR", 'FISCAL NUMBER: ' . $fiscalNumber);
            /*if(!isset($fiscalNumber) || trim($fiscalNumber) == '' ) {
                throw new SDException("Fiscal Number is not set");
            } */           
           
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
            
            $cInvestor = $this->CInvestorModel->get($investorId); 
            
            if(!$cInvestor)
                $cInvestor= new CInvestor();
            
            $cInvestor->isactive = "Y";
            $cInvestor->c_user_id = $this->session->session_investor['id'];
            $cInvestor->c_tax_country_id = $countryId;
            $cInvestor->tax_address1 = $address;
            $cInvestor->tax_address2 = $addressSec;
            $cInvestor->tax_city = $city;
            $cInvestor->tax_province = $province;
            $cInvestor->tax_postal = $postal;
            $cInvestor->status = $status;
            $cInvestor->tax_fiscalnumber = $fiscalNumber;
            $cInvestor->tax_isuscitizen = $isCitizen; 
            $cInvestor->tax_ustin = $tin;
            $cInvestor->payin_paypalusername= $paypal;
            $cInvestor->payinbalance= $payinbalance;
            $cInvestor->payoutbalance= $payoutbalance;
            $cInvestor->pendingbalance= $pendingbalance;
            
            $this->CInvestorModel->save($cInvestor, $this->session->session_investor['id']);
 
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
    
    public function update_tax_paypal_information() {
        
        //investor info
        $cInvestorF = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
        $investorId = ($cInvestorF)?$cInvestorF->c_investor_id:"";
        $paypal = $this->input->post("paypalacct");
        
        
        $isCitizen = ($cInvestorF)?$cInvestorF->tax_isuscitizen:"Y";
        $status = ($cInvestorF)?$cInvestorF->status:"PEND";
        $user = ($cInvestorF)?$cInvestorF->c_user_id:$this->session->session_investor['id']; 
        $payinbalance = ($cInvestorF)?$cInvestorF->payinbalance:0;
        $payoutbalance = ($cInvestorF)?$cInvestorF->payoutbalance:0;
        $pendingbalance = ($cInvestorF)?$cInvestorF->pendingbalance:0;
        
        
        try {      
            
            if(!isset($paypal) || trim($paypal) == '' ) {
                throw new SDException("Paypal Account is not set");
            }            

            $cInvestor = $this->CInvestorModel->get($investorId);  
            if(!$cInvestor)
                $cInvestor= new CInvestor();
           
            $cInvestor->isactive = "Y";
            $cInvestor->c_user_id = $user;
            $cInvestor->status = $status;
            
            
            $cInvestor->tax_isuscitizen = $isCitizen; 
            $cInvestor->payin_paypalusername= $paypal;
            $cInvestor->payinbalance= $payinbalance;
            $cInvestor->payoutbalance= $payoutbalance;
            $cInvestor->pendingbalance= $pendingbalance;
            
            
            
            
            $this->CInvestorModel->save($cInvestor, $this->session->session_investor['id']);
 
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
    
    public function update_identification_information() {
        
        
        $doctype = $this->input->post("userdocumentype");
        $docnumber = $this->input->post("userdocno");
        
        //log_message("ERROR",base_url()."upload/imgs/");
        $path = "./upload/imgs/";
        $config['upload_path']= $path;
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
       
        /*$config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        */
        $this->load->library('upload',$config);
        
        $fileFront = new CFile();
        $fileBack = new CFile();
        
        try {   
            
            
            
            if($this->upload->do_upload("imagenfront")){
                $dataF = array('upload_data' => $this->upload->data());
                $imgFromName = $dataF['upload_data']['file_name'];
                //Create File OBJ/
                
                $fileFront->isactive = "Y";
                $fileFront->name = $imgFromName;
                $fileFront->path = $path;
                $fileFront->datatype = "IMG";
                $this->CFileModel->save($fileFront, $this->session->session_investor['id']);
                
            }else{
                if(!strpos(strtolower($this->upload->error_msg[0]), 'not select a file'))
                  throw new SDException($this->upload->error_msg[0]);
            }

            if($this->upload->do_upload("imagenback")){
                $dataB = array('upload_data' => $this->upload->data());
                $imgBackName = $dataB['upload_data']['file_name'];
                //Create File OBJ/
                $fileBack->isactive = "Y";
                $fileBack->name = $imgBackName;
                $fileBack->path = $path;
                $fileBack->datatype = "IMG";
                $this->CFileModel->save($fileBack, $this->session->session_investor['id']);
            }else{
                if(!strpos(strtolower($this->upload->error_msg[0]), 'not select a file'))
                  throw new SDException($this->upload->error_msg[0]);
            }
        
           //investor info
           $cInvestorF = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
           $investorId = ($cInvestorF)?$cInvestorF->c_investor_id:"";
           $paypal = ($cInvestorF)?$cInvestorF->payin_paypalusername:"";
           
            $isCitizen = ($cInvestorF)?$cInvestorF->tax_isuscitizen:"Y";
            $status = ($cInvestorF)?$cInvestorF->status:"PEND";
            $user = ($cInvestorF)?$cInvestorF->c_user_id:$this->session->session_investor['id']; 
            $payinbalance = ($cInvestorF)?$cInvestorF->payinbalance:0;
            $payoutbalance = ($cInvestorF)?$cInvestorF->payoutbalance:0;
            $pendingbalance = ($cInvestorF)?$cInvestorF->pendingbalance:0;
           
           
           $cInvestor = $this->CInvestorModel->get($investorId);  
           if(!$cInvestor)
                $cInvestor= new CInvestor();
           
           $cInvestor->c_user_id = $user;
           $cInvestor->status = $status;
           $cInvestor->isactive = "Y";
           $cInvestor->c_docimgfront_id = $fileFront->c_file_id;
           $cInvestor->c_docimgback_id = $fileBack->c_file_id;
           $cInvestor->documentnumber = $docnumber; 
           $cInvestor->documenttype = $doctype;
           
           $cInvestor->tax_isuscitizen = $isCitizen; 
           $cInvestor->payin_paypalusername= $paypal;
           $cInvestor->payinbalance= $payinbalance;
           $cInvestor->payoutbalance= $payoutbalance;
           $cInvestor->pendingbalance= $pendingbalance;
           
           
           
           $this->CInvestorModel->save($cInvestor, $this->session->session_investor['id']);
           
         
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
