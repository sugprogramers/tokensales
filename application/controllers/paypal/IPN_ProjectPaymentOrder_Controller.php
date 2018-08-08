<?php

include 'application/libraries/PaypalIPN.php';
include 'application/libraries/SDException.php';

class IPN_ProjectPaymentOrder_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentOrderModel");
    }
    
    public function index($finPaymentOrderId) {   
        log_message('error', "ipn got:".$finPaymentOrderId);
        
        
        
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