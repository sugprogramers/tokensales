<?php

include 'application/libraries/PaypalIPN.php';
include 'application/libraries/SDException.php';

class IPN_ProjectPaymentOrder_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentOrderModel");
        $this->load->model("FINPaymentHistoryModel");
        $this->load->model("CProjectModel");
        $this->load->model("CProjectmanagerModel");
        $this->load->model("CUserModel");
    }
    
    public function index($finPaymentOrderId) {   
        log_message('error', "ipn got:".$finPaymentOrderId);
        
        try {
            $this->db->trans_begin();
            
            $finPaymentOrder = $this->FINPaymentOrderModel->get($finPaymentOrderId);
            if(!$finPaymentOrder){
                throw new SDException("payment order not found");
            }
            
            if($finPaymentOrder->ordertype != 'PROMPAYOUT' || $finPaymentOrder->status != 'PEND'){
                throw new SDException("incorrect payment order status");
            }
            
            $cProject = $this->CProjectModel->get($finPaymentOrder->c_project_id);
            if(!$cProject){
                throw new SDException("project not found");
            }
            
            if($cProject->projectstatus != 'COFU'){
                throw new SDException("incorrect project status");
            }
            
            $oldfinPaymentHistory = $this->FINPaymentHistoryModel->loadByPaymentOrderId($finPaymentOrder->fin_payment_order_id);
            if($oldfinPaymentHistory != null){
                throw new SDException("payment order already processed");
            }
            
            $cProjectmanager = $this->CProjectmanagerModel->get($cProject->c_projectmanager_id);
            
            $cUserFrom = CUserModel::$CUSER_ADMIN_ID;
            $cUserTo = $cProjectmanager->c_user_id;
            
            //THESE WILL NEED TO BE RETREIVED VIA POST
            $now = date("Y-m-d H:i:s");
            $c_currency_id = $cProject->c_currency_id;
            $amount = $finPaymentOrder->amount;
            $fromaccount = "fromaccount@gmail.com";
            $toaccount = "toaccount@gmail.com";
            $description = "description payout for project:".$finPaymentOrder->c_project_id;
            
            
            $finPaymentHistory = new FINPaymentHistory();
            $finPaymentHistory->isactive = 'Y';
            $finPaymentHistory->paymentdate = $now;
            $finPaymentHistory->status = "PEND";
            $finPaymentHistory->type = "EXTOUT";
            $finPaymentHistory->c_currency_id = $c_currency_id; 
            $finPaymentHistory->amount = $amount; 
            $finPaymentHistory->fromaccount = $fromaccount; 
            $finPaymentHistory->toaccount = $toaccount; 
            $finPaymentHistory->description = $description; 
            $finPaymentHistory->fin_payment_order_id = $finPaymentOrder->fin_payment_order_id;
            $finPaymentHistory->from_user_id = $cUserFrom; 
            $finPaymentHistory->to_user_id = $cUserTo; 
            
            $this->FINPaymentHistoryModel->save($finPaymentHistory, CUserModel::$CUSER_ADMIN_ID);
            $this->db->query("SELECT fin_project_processloan(?);", array($finPaymentOrder->fin_payment_order_id));
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
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
        log_message('error', "success ipn got:".$finPaymentOrderId);
        $data = $this->get_projectInfoByOrderPaymentId($finPaymentOrderId);
        $this->load->view('header/header_admin');
        $this->load->view('paypal/ipn_projectpaymentorder_success',$data);
        $this->load->view('footer/footer_admin');    
        
    }
    
    public function cancel($finPaymentOrderId) {   
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
        log_message('error', "cancel ipn got:".$finPaymentOrderId);
        $data = $this->get_projectInfoByOrderPaymentId($finPaymentOrderId);
        $this->load->view('header/header_admin');
        $this->load->view('paypal/ipn_projectpaymentorder_cancel',$data);
        $this->load->view('footer/footer_admin');
    }
    
    public function get_projectInfoByOrderPaymentId($finPaymentOrderId) {

        try {
            $query = $this->FINPaymentOrderModel->get_projectInfoByOrderPaymentId($finPaymentOrderId);
            $queryresult = $query->result();
            if(!$queryresult){
                throw new SDException("Payment order not found.");
            }
            $result = $queryresult[0];

            $result = array(
                "status" => 'success',
                "msg" => '',
                "projectName" => $result->name,
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