<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Company_PaypalAccount_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CProjectmanagerModel");

        if (!$this->session->has_userdata("session_company")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        /* @var $projectmanager CProjectmanager */
        $projectmanager = $this->CProjectmanagerModel->loadByUserId($this->session->session_company['id']);
        $paypalacct = "";
        if ($projectmanager) {
            $paypalacct = $projectmanager->paypalusername;
        }
        $data = array('paypalacct' => $paypalacct);

        $this->load->view('header/header_admin');
        $this->load->view('company_paypalaccount', $data);
        $this->load->view('footer/footer_admin');
    }

    public function update_paypal_acct() {
        try {
            $paypalacct = $this->input->post('paypalacct');

            if (empty($paypalacct)) {
                throw new SDException('missingFields');
            }

            /* @var $projectmanager CProjectmanager */
            $projectmanager = $this->CProjectmanagerModel->loadByUserId($this->session->session_company['id']);
            if (!$projectmanager) {
                $projectmanager = new CProjectmanager();
                $projectmanager->c_user_id = $this->session->session_company['id'];
                $projectmanager->isactive = 'Y';
                $projectmanager->paypalusername = $paypalacct;
            } else {
                $projectmanager->paypalusername = $paypalacct;
            }

            $this->CProjectmanagerModel->save($projectmanager, $this->session->session_company['id']);


            $response = array('status' => 'success', 'msg' => 'Success');
            echo json_encode($response);
            
        } catch (SDException $e) {
            $response = array('status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
            
        } catch (Exception $e) {
            $response = array('status' => 'error', 'msg' => 'InternalError');
            echo json_encode($response);
        }
    }

}
