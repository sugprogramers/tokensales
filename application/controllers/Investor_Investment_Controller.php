<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_Investment_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectdocumenttypeModel");
        
        if($this->session->usertype !== "INV"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {       
        $this->load->view('header/header_admin');
        $this->load->view('investor_investment');
        $this->load->view('footer/footer_admin');        
    }
    
    
    public function get_items(){
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->CProjectdocumenttypeModel->getAll();
      $data = [];
      
      foreach ($query as $obj) {
          
         
           $data[] = array(
                $obj->name,
                $obj->description,               

           );
      }
      
      $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($query),
                 "recordsFiltered" => count($query),
                 "data" => $data
            );

      echo json_encode($result);
     
      
      exit();
   }
    
   
}
