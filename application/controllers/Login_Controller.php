<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Login_Model");
    }

    public function index() {
        $this->load->view('header/header_login');
        $this->load->view('login');
        $this->load->view('footer/footer_login');
    }

    public function login_user() {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $resp = $this->Login_Model->login($email, $password);
        if ($resp) {
            $data = [
                "id" => $resp->c_user_id,
                "name" => $resp->username,
                "login" => TRUE
            ];

            $this->session->set_userdata($data);
        } else {
            echo "error";
        }
    }

    public function logout_user() {
        
    }

}
