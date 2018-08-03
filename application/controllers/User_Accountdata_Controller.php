<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Accountdata_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUser/CUserModel");
    }

    public function index() {
        if (!$this->session->userdata("login_admin")) {
            redirect(base_url() . 'login');
        }
        $this->load->view('header/header_admin');
        $this->load->view('user_accountdata');
        $this->load->view('footer/footer_admin');
    }

}
