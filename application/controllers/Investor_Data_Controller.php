<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_Data_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINInvestmentModel");
        $this->load->model("CProjectModel");
        
        if($this->session->usertype !== "INV"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {      
        
        $data['userid'] = $this->session->id;
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
