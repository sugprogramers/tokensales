<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Admin_Project_PPayout_Controller extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentOrderModel");
        $this->load->model("CAdminModel");
        
       
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index($finPaymentOrderId) {
        log_message('error', 'got id:'.$finPaymentOrderId);
        $data = $this->get_paymentOrderInfoById($finPaymentOrderId);
        $this->load->view('header/header_admin');
        $this->load->view('admin_project_ppayout', $data);
        $this->load->view('footer/footer_admin');
    }
    
    public function get_paymentOrderInfoById($finPaymentOrderId) {

        try {
            $query = $this->FINPaymentOrderModel->get_paymentOrderInfoById($finPaymentOrderId);
            $queryresult = $query->result();
            if(!$queryresult){
                throw new SDException("Pending Payment order not found.");
            }
            $result = $queryresult[0];
            
            $cAdmin = $this->CAdminModel->loadByUserId(CUserModel::$CUSER_ADMIN_ID);
            if(!$cAdmin){
                throw new SDException("Error loading payment information.");
            }
            
            $html = '<tr>';
            $html .= '<td class="text-center">1</td>';
            $html .= '<td class="text-left">Loan Payout</td>';
            $html .= '<td>1</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '</tr>';

            $result = array(
                "status" => 'success',
                "msg" => '',
                "dlgFinPaymentOrderId" => $result->fin_payment_order_id,
                "dlgCompanyName" => $result->companyname." (".$result->paypalusername.")",
                "dlgPMPaypalUsername" => $result->paypalusername,
                "dlgProjectName" => $result->name,
                "dlgAddress" => $result->address1,
                "dlgSubTotalAmount" => $result->amount,
                "dlgGrandTotalAmount" => $result->amount,
                "dlgCurrencySymbol" => $result->cursymbol,
                "dlgCurrencyCode" => $result->iso_code,
                "dlgPayoutItems" => $html,
            );


            return $result;
        }catch(SDException $e){
            $result = array('status' => 'error', 'msg' => $e->getMessage());
            return $result;
        }        
        catch(Exception $e){
            $result = array('status' => 'error', 'msg' => 'Error Retreiving Payment Information. Please try again');
            return $result;
        }
    }
    
    public function execute_paymentorder() {
       
       $finPaymentOrderId = $this->input->post("dlgFinPaymentOrderId");
      
       try {
            $response = array('msg' => 'Payment executed successfully', 'status' => 'success');
            echo json_encode($response);
            
       }catch(SDException $e){
            $response = array('status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }        
        catch(Exception $e){
            $response = array('status' => 'error', 'msg' => 'Error Executing Payment. Please try again');
            echo json_encode($response);
        }
             
    }

}
