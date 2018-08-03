<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_Changepassword_Controller extends CI_Controller {

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
        $this->load->view('user_changepassword');
        $this->load->view('footer/footer_admin');
    }
    
    public function changePassword(){
        log_message('error', 'Enter changePassword with POST' . implode($this->input->post(NULL, TRUE)));

        $response = array('status' => 'success', 'msg' => 'Success');
        echo json_encode($response);
    }

}
