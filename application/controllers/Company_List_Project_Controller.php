<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Company_List_Project_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        
        if($this->session->usertype !== "COMPMAN"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {       
        $this->load->view('header/header_admin');
        $this->load->view('company_list_project');
        $this->load->view('footer/footer_admin');        
    }
    
      public function get_project_list() {
        $country_list = $this->CProjectModel->getAllByCompany($this->session->id);

        $html = '<option value="">Choose a Project Manager</option>';
        foreach ($country_list as $country) {
            $html .= '<option value="' . $country->c_projectmanager_id . '">' . $country->paypalusername. '</option>';
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }  
    
   
}