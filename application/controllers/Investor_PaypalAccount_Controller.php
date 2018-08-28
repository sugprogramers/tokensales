<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Investor_PaypalAccount_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CInvestorModel");

        if (!$this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        /* @var $investor CInvestorModel */
        $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
        $paypalacct = "";
        if ($investor) {
            $paypalacct = $investor->payin_paypalusername;
        }
        $data = array('paypalacct' => $paypalacct);

        $this->load->view('header/header_admin');
        $this->load->view('investor_paypalaccount', $data);
        $this->load->view('footer/footer_admin');
    }

    public function update_paypal_acct() {
        try {
            $paypalacct = $this->input->post('paypalacct');

            if (empty($paypalacct)) {
                throw new SDException('missingFields');
            }

            /* @var $investor CInvestorModel */
            $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
            if (!$investor) {
                $investor = new CInvestor();
                $investor->c_user_id = $this->session->session_investor['id'];
                $investor->isactive = 'Y';
                $investor->tax_isuscitizen = 'Y'; // default
                $investor->documenttype = 'PASS'; // default
                $investor->status = 'PEND'; // default
                $investor->payinbalance = 0; // default
                $investor->payoutbalance = 0; // default
                $investor->pendingbalance = 0; // default                
                $investor->payin_paypalusername = $paypalacct;
                
            } else {
                $investor->payin_paypalusername = $paypalacct;
            }

            $this->CInvestorModel->save($investor, $this->session->session_investor['id']);


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
