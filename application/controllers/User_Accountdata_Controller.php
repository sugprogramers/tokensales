<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Accountdata_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        
        if (!isset($this->session->id)){
            redirect(base_url() . 'login');
        }
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('user_accountdata');
        $this->load->view('footer/footer_admin');
    }

}
