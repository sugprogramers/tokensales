<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Admin_PaypalAccount_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CAdminModel");

        if (!$this->session->has_userdata("session_admin")) {
            redirect(base_url() . 'login');
        } 
    }

    public function index() {
        /* @var $admin CAdmin */
        $admin = $this->CAdminModel->loadByUserId($this->session->session_admin['id']);
        $paypalacct = "";
        if($admin) {
            $paypalacct = $admin->paypalusername;
        }
        $data = array('paypalacct' => $paypalacct);
        
        $this->load->view('header/header_admin');
        $this->load->view('admin_paypalaccount', $data);
        $this->load->view('footer/footer_admin');
    }

    public function update_paypal_acct() {
        try {
            $paypalacct = $this->input->post('paypalacct');

            if (empty($paypalacct)) {
                throw new SDException('missingFields');
            }

            /* @var $admin CAdmin */
            $admin = $this->CAdminModel->loadByUserId($this->session->session_admin['id']);
            if (!$admin) {
                $admin = new CAdmin();
                $admin->c_user_id = $this->session->session_admin['id'];
                $admin->isactive = 'Y';
                $admin->paypalusername = $paypalacct;
                
            } else {
                $admin->paypalusername = $paypalacct;
            }

            $this->CAdminModel->save($admin, $this->session->session_admin['id']);


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
