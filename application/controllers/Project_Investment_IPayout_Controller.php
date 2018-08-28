<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Project_Investment_IPayout_Controller extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentOrderModel");
        $this->load->model("CAdminModel");
        $this->load->model("CUserModel");
        
        if (!$this->session->has_userdata("session_company")) {
            redirect(base_url() . 'login');
        }
    }

    public function index($finPaymentOrderId) {
        $data = $this->get_paymentOrderInfoById($finPaymentOrderId);
        $this->load->view('header/header_admin');
        $this->load->view('project_investment_ipayout', $data);
        $this->load->view('footer/footer_admin');
    }
    
    public function get_paymentOrderInfoById($finPaymentOrderId) {

        try {
            $query = $this->FINPaymentOrderModel->get_projectInvestmentPaymentOrderInfoById($finPaymentOrderId);
            $queryresult = $query->result();
            if(!$queryresult){
                throw new SDException("Pending Payment order not found.");
            }
            $result = $queryresult[0];
            
            $cAdmin = $this->CAdminModel->loadByUserId(CUserModel::$CUSER_ADMIN_ID);
            if(!$cAdmin){
                throw new SDException("Error loading payment information.");
            }
            $cUser = $this->CUserModel->get(CUserModel::$CUSER_ADMIN_ID);
            
            $html = '<tr>';
            $html .= '<td class="text-center">1</td>';
            $html .= '<td class="text-left">Return of investment payment to investor: '.$result->c_investor_id.' for project: '.$result->projectName.'</td>';
            //$html .= '<td class="text-left">Return of investment payment to investor: '.$result->investorname." (".$result->investorEmail.")".' for project: '.$result->projectName.'</td>';
            $html .= '<td>1</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '</tr>';

            $result = array(
                "status" => 'success',
                "msg" => '',
                "dlgFinPaymentOrderId" => $result->fin_payment_order_id,
                "dlgName" => $cUser->firstname." ".$cUser->lastname,
                "dlgPaymentMethod" => "Paypal: ".$cAdmin->paypalusername,
                "dlgAdminPaypalUsername" => $cAdmin->paypalusername,
                "dlgProjectName" => $result->projectName,
                "dlgAddress" => $cUser->address1,
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
