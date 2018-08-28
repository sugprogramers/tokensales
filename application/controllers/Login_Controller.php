<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("Login_Model");
    }

    public function index() {
        if ($this->session->has_userdata("session_admin")) {
            redirect(base_url() . 'admin_dashboard');
        }
        if ($this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'investor_dashboard');
        }
        if ($this->session->has_userdata("session_company")) {
            redirect(base_url() . 'company_dashboard');
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
            if ($resp->usertype === "ADM") {
                $session_admin = [
                    "id" => $resp->c_user_id,
                    "firstname" => $resp->firstname,
                    "lastname" => $resp->lastname,
                    "email" => $resp->email,
                ];

                $data = [
                    "session_admin" => $session_admin,
                ];
                $this->session->set_userdata($data);

                $response = array('redirect' => base_url() . 'admin_dashboard', 'status' => 'success');
            }

            if ($resp->usertype === "INV") {
                $session_investor = [
                    "id" => $resp->c_user_id,
                    "firstname" => $resp->firstname,
                    "lastname" => $resp->lastname,
                    "email" => $resp->email,
                ];

                $data = [
                    "session_investor" => $session_investor,
                ];
                $this->session->set_userdata($data);

                $response = array('redirect' => base_url() . 'investor_dashboard', 'status' => 'success');
            }
            if ($resp->usertype === "COMPMAN") {
                $session_company = [
                    "id" => $resp->c_user_id,
                    "firstname" => $resp->firstname,
                    "lastname" => $resp->lastname,
                    "email" => $resp->email,
                ];

                $data = [
                    "session_company" => $session_company
                ];
                $this->session->set_userdata($data);

                $response = array('redirect' => base_url() . 'company_dashboard', 'status' => 'success');
            }

            echo json_encode($response);
        } else {
            log_message('error', "login_user-10 error");
            $response = array('redirect' => '', 'status' => 'error');
            echo json_encode($response);
        }
    }

    public function login_user_from_admin() {
        $cUserId = $this->input->post("userId");

        /* @var $user CUser */
        $user = $this->CUserModel->get($cUserId);

        $email = $user->email;
        $password = $user->password;
        $resp = $this->Login_Model->login($email, $password);
        if ($resp) {
            $session_investor = array();
            $session_company = array();

            if ($resp->usertype === "INV") {
                $session_investor = [
                    "id" => $resp->c_user_id,
                    "firstname" => $resp->firstname,
                    "lastname" => $resp->lastname,
                    "email" => $resp->email,
                ];

                $data = [
                    "session_investor" => $session_investor
                ];
                $this->session->set_userdata($data);

                $response = array('redirect' => base_url() . 'investor_dashboard', 'status' => 'success');
            }
            if ($resp->usertype === "COMPMAN") {
                $session_company = [
                    "id" => $resp->c_user_id,
                    "firstname" => $resp->firstname,
                    "lastname" => $resp->lastname,
                    "email" => $resp->email,
                ];

                $data = [
                    "session_company" => $session_company
                ];
                $this->session->set_userdata($data);

                $response = array('redirect' => base_url() . 'company_dashboard', 'status' => 'success');
            }

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

    public function logout_investor_from_admin() {
        $this->session->unset_userdata("session_investor");
        redirect(base_url() . 'admin_list_investor');
    }

    public function logout_company_from_admin() {
        $this->session->unset_userdata("session_company");
        redirect(base_url() . 'admin_list_company');
    }

}
