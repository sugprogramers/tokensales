<?php

include 'application/libraries/PaypalIPN.php';
include 'application/libraries/SDException.php';
include 'application/controllers/Utils.php';

class IPN_Investor_DepositPaymentHistory_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentHistoryModel");
        $this->load->model("CInvestorModel");
        $this->load->model("CUserModel");
        $this->load->model("CAdminModel");
    }

    public function index($investorId, $payinAmount) {

        try {
            $payinAmount = str_replace(",", "", $payinAmount);
            
            $this->db->trans_begin();

            /* @var $investor CInvestor */
            $investor = $this->CInvestorModel->get($investorId);
            if (!$investor) {
                throw new SDException("investor information not found");
            }
            
            $admin = $this->CAdminModel->loadByUserId(CUserModel::$CUSER_ADMIN_ID);
            
            $cUserFrom = $investor->c_user_id;
            $cUserTo = CUserModel::$CUSER_ADMIN_ID;
            
            //THESE WILL NEED TO BE RETREIVED VIA POST
            $now = date("Y-m-d H:i:s");
            $c_currency_id = "100";
            $amount = $payinAmount;
            $fromaccount = "fromaccount@gmail.com";
            $toaccount = $admin->paypalusername; // "toaccount@gmail.com";
            $description = "Description payin of $" . $amount . " to increment payin-balance of investor ID:" . $investor->c_investor_id;


            $finPaymentHistory = new FINPaymentHistory();
            $finPaymentHistory->isactive = 'Y';
            $finPaymentHistory->paymentdate = $now;
            $finPaymentHistory->status = "PEND";
            $finPaymentHistory->type = "EXTIN";
            $finPaymentHistory->c_currency_id = $c_currency_id;
            $finPaymentHistory->amount = $amount;
            $finPaymentHistory->fromaccount = $fromaccount;
            $finPaymentHistory->toaccount = $toaccount;
            $finPaymentHistory->description = $description;
            $finPaymentHistory->from_user_id = $cUserFrom;
            $finPaymentHistory->to_user_id = $cUserTo;

            $this->FINPaymentHistoryModel->save($finPaymentHistory, CUserModel::$CUSER_ADMIN_ID);

            $this->db->query("SELECT fin_investor_processpayin(?, ?, ?);", array($finPaymentHistory->fin_payment_history_id, $investor->c_investor_id, $amount));

            $this->db->trans_commit();
        } catch (SDException $e) {
            $this->db->trans_rollback();
            $this->output->set_header("HTTP/1.1 500 Internal Server Error");
            return;
        } catch (Exception $e) {
            $this->db->trans_rollback();
            $this->output->set_header("HTTP/1.1 500 Internal Server Error");
            return;
        }

        $this->output->set_header("HTTP/1.1 200 OK");
    }

    public function success($investorId, $payinAmount) {
        if (!$this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'login');
        }

        $investor = $this->CInvestorModel->get($investorId);
        if (!$investor) {
            $result = array('status' => 'error', 'msg' => 'Error Payment Information.');
            
        } else {
            $investor_user = $this->CUserModel->get($investor->c_user_id);
            if (!$investor_user) {
                $result = array('status' => 'error', 'msg' => 'Error Payment Information.');
                
            } else {
                $data = array("status" => 'success', "msg" => '', "email" => $investor_user->email, "amount" => Utils::format_number($payinAmount, 2));
            }
        }

        $this->load->view('header/header_admin');
        $this->load->view('paypal/ipn_investor_depositpaymenthistory_success', $data);
        $this->load->view('footer/footer_admin');
    }

    public function cancel($investorId, $payinAmount) {
        if (!$this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'login');
        }

        $investor = $this->CInvestorModel->get($investorId);
        if (!$investor) {
            $result = array('status' => 'error', 'msg' => 'Error Payment Information.');
            
        } else {
            $investor_user = $this->CUserModel->get($investor->c_user_id);
            if (!$investor_user) {
                $result = array('status' => 'error', 'msg' => 'Error Payment Information.');
                
            } else {
                $data = array("status" => 'success', "msg" => '', "email" => $investor_user->email, "amount" => Utils::format_number($payinAmount, 2));
            }
        }
        
        $this->load->view('header/header_admin');
        $this->load->view('paypal/ipn_investor_depositpaymenthistory_cancel', $data);
        $this->load->view('footer/footer_admin');
    }

}
