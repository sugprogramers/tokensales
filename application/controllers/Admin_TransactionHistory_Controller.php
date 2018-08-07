<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_TransactionHistory_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model("admin/Administrator_Model");
        
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {       
        $this->load->view('header/header_admin');
        $this->load->view('admin_transaction_history');
        $this->load->view('footer/footer_admin');        
    }
   
}
