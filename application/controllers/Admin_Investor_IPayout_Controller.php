<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Admin_Investor_IPayout_Controller extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentOrderModel");
        $this->load->model("CAdminModel");
        $this->load->model("CUserModel");
        
       
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index($finPaymentOrderId) {
        $data = $this->get_paymentOrderInfoById($finPaymentOrderId);
        $this->load->view('header/header_admin');
        $this->load->view('admin_investor_ipayout', $data);
        $this->load->view('footer/footer_admin');
    }
    
    public function get_paymentOrderInfoById($finPaymentOrderId) {

        try {
            $query = $this->FINPaymentOrderModel->get_investorPaymentOrderInfoById($finPaymentOrderId);
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
            $html .= '<td class="text-left">Investor Withdrawal</td>';
            $html .= '<td>1</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '</tr>';

            $result = array(
                "status" => 'success',
                "msg" => '',
                "dlgFinPaymentOrderId" => $result->fin_payment_order_id,
                "dlgName" => $result->name." (".$result->email.")",
                "dlgPaymentMethod" => "Paypal: ".$result->payin_paypalusername,
                "dlgIPaypalUsername" => $result->payin_paypalusername,
                "dlgInvestorName" => $result->name,
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

}
