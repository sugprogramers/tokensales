<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_View_Project_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
        if($this->session->usertype !== "COMPMAN"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {       
        $this->load->view('header/header_admin');
        $this->load->view('company_view_project');
        $this->load->view('footer/footer_admin');        
    }
    
   
}