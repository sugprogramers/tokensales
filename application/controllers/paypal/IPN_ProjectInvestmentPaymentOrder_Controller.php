<?php

include 'application/libraries/PaypalIPN.php';
include 'application/libraries/SDException.php';

class IPN_ProjectInvestmentPaymentOrder_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentOrderModel");
        $this->load->model("FINPaymentHistoryModel");
        $this->load->model("CInvestorModel");
        $this->load->model("CProjectModel");
        $this->load->model("CProjectmanagerModel");
        $this->load->model("FINInvestmentModel");
        $this->load->model("CUserModel");
    }
    
    public function index($finPaymentOrderId) {   
        
        try {
            $this->db->trans_begin();
            
            $finPaymentOrder = $this->FINPaymentOrderModel->get($finPaymentOrderId);
            if(!$finPaymentOrder){
                throw new SDException("payment order not found");
            }
            
            if($finPaymentOrder->ordertype != 'RETIPAYIN' || $finPaymentOrder->status != 'PEND'){
                throw new SDException("incorrect payment order status");
            }
            
            $finInvestment = $this->FINInvestmentModel->get($finPaymentOrder->fin_investment_id);
            if(!$finInvestment){
                throw new SDException("investment not found");
            }
            
            $cProject = $this->CProjectModel->get($finInvestment->c_project_id);
            $cProjectManager = $this->CProjectmanagerModel->get($cProject->c_projectmanager_id);
            
            $oldfinPaymentHistory = $this->FINPaymentHistoryModel->loadByPaymentOrderId($finPaymentOrder->fin_payment_order_id);
            if($oldfinPaymentHistory != null){
                throw new SDException("payment order already processed");
            }
                        
            $cUserFrom = $cProjectManager->c_user_id;
            $cUserTo = CUserModel::$CUSER_ADMIN_ID;
            
            //THESE WILL NEED TO BE RETREIVED VIA POST
            $now = date("Y-m-d H:i:s");
            $c_currency_id = "100";
            $amount = $finPaymentOrder->amount;
            $fromaccount = "fromaccount@gmail.com";
            $toaccount = "toaccount@gmail.com";
            $description = "description payout for investment:".$finPaymentOrder->fin_investment_id;
            
            
            $finPaymentHistory = new FINPaymentHistory();
            $finPaymentHistory->isactive = 'Y';
            $finPaymentHistory->paymentdate = $now;
            $finPaymentHistory->status = "PEND";
            $finPaymentHistory->type = "RETIPAYIN";
            $finPaymentHistory->c_currency_id = $c_currency_id; 
            $finPaymentHistory->amount = $amount; 
            $finPaymentHistory->fromaccount = $fromaccount; 
            $finPaymentHistory->toaccount = $toaccount; 
            $finPaymentHistory->description = $description; 
            $finPaymentHistory->fin_payment_order_id = $finPaymentOrder->fin_payment_order_id;
            $finPaymentHistory->from_user_id = $cUserFrom; 
            $finPaymentHistory->to_user_id = $cUserTo; 
            
            $this->FINPaymentHistoryModel->save($finPaymentHistory, CUserModel::$CUSER_ADMIN_ID);
            $this->db->query("SELECT fin_projectinvestment_processpayout(?);", array($finPaymentOrder->fin_payment_order_id));
            $this->db->trans_commit();
        }catch(SDException $e){
            $this->db->trans_rollback();
            $this->output->set_header("HTTP/1.1 500 Internal Server Error");
            return;
        }        
        catch(Exception $e){
            $this->db->trans_rollback();
            $this->output->set_header("HTTP/1.1 500 Internal Server Error");
            return;
        }
        
        $this->output->set_header("HTTP/1.1 200 OK");
    }
    
    public function success($finPaymentOrderId) { 
        if($this->session->usertype !== "COMPMAN"){
            redirect(base_url() . 'login');
        }
        $data = $this->get_projectInvestmentInfoByOrderPaymentId($finPaymentOrderId);
        $this->load->view('header/header_admin');
        $this->load->view('paypal/ipn_projectinvestmentpaymentorder_success',$data);
        $this->load->view('footer/footer_admin');    
        
    }
    
    public function cancel($finPaymentOrderId) {   
        if($this->session->usertype !== "COMPMAN"){
            redirect(base_url() . 'login');
        }
        $data = $this->get_projectInvestmentInfoByOrderPaymentId($finPaymentOrderId);
        $this->load->view('header/header_admin');
        $this->load->view('paypal/ipn_projectinvestmentpaymentorder_cancel',$data);
        $this->load->view('footer/footer_admin');
    }
    
    public function get_projectInvestmentInfoByOrderPaymentId($finPaymentOrderId) {

        try {
            $query = $this->FINPaymentOrderModel->get_projectInvestmentInfoByOrderPaymentId($finPaymentOrderId);
            $queryresult = $query->result();
            if(!$queryresult){
                throw new SDException("Payment order not found.");
            }
            $result = $queryresult[0];

            $result = array(
                "status" => 'success',
                "msg" => '',
                "projectName" => $result->projectName,
                "investorName" => $result->investorname." (".$result->investorEmail.")",
                
            );


            return $result;
        }catch(SDException $e){
            $result = array('status' => 'error', 'msg' => $e->getMessage());
            return $result;
        }        
        catch(Exception $e){
            $result = array('status' => 'error', 'msg' => 'Error Retreiving Payment Order Information.');
            return $result;
        }
    }
   
}