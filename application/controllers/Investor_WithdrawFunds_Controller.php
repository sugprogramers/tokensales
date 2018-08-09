<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_WithdrawFunds_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
        if($this->session->usertype !== "INV"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {       
        $this->load->view('header/header_admin');
        $this->load->view('investor_withdrawfunds');
        $this->load->view('footer/footer_admin');        
    }
    
   
}
