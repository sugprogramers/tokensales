<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Profile_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
       //$this->load->model("Login_Model");
    }

    public function index() {
        if (!$this->session->userdata("login_admin")) {
            redirect(base_url() . 'login');
        }
        $this->load->view('header/header_admin');
        $this->load->view('admin_profile');
        $this->load->view('footer/footer_admin');
    }

}
