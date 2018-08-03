<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Login_Model");
    }

    public function index() {
        if ($this->session->userdata("login_admin")) {
            redirect(base_url() . 'admin_dashboard');
        }
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
                "firstname" => $resp->firstname,
                "lastname" => $resp->lastname,
                "email" => $resp->email,
                "login_admin" => TRUE
            ];

            $this->session->set_userdata($data);
            $response = array('redirect' => base_url() . 'admin_dashboard', 'status' => 'success');
            echo json_encode($response);
        } else {
            $response = array('redirect' => '', 'status' => 'error');
            echo json_encode($response);
        }
    }

    public function logout_user() {
        $this->session->sess_destroy();
        redirect(base_url() . 'login');
    }

}
