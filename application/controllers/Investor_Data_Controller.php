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
   
}
