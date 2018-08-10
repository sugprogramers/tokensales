<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Investor_ProcessDepositFunds_Controller extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CInvestorModel");
        $this->load->model("CAdminModel");        
        $this->load->model("CUserModel");
        
       
        if($this->session->usertype !== "INV"){
            redirect(base_url() . 'login');
        }
    }

    public function index($investorId, $payinAmount) {
        $data = $this->get_paymentInfo($investorId, $payinAmount);
        $this->load->view('header/header_admin');
        $this->load->view('investor_process_depositfunds', $data);
        $this->load->view('footer/footer_admin');
    }
    
    public function get_paymentInfo($investorId, $payinAmount) {

        try {
            $investor = $this->CInvestorModel->get($investorId);
            if(!$investor){
                throw new SDException("Pending Payment not found.");
            }
            
            $cAdmin = $this->CAdminModel->loadByUserId(CUserModel::$CUSER_ADMIN_ID);
            if(!$cAdmin){
                throw new SDException("Error loading payment information.");
            }
            $cUser = $this->CUserModel->get(CUserModel::$CUSER_ADMIN_ID);
            
            $html = '<tr>';
            $html .= '<td class="text-left">Deposit to Smart Developer for increment your balance</td>';
            $html .= '<td>USD</td>';
            $html .= '<td>'.$payinAmount.'</td>';
            $html .= '</tr>';

            $result = array(
                "status" => 'success',
                "msg" => '',
                "dlgInvestorId" => $investorId,
                "dlgPayinAmount" => $payinAmount,
                "dlgName" => $cUser->firstname." ".$cUser->lastname,
                "dlgPaymentMethod" => "Paypal (".$cAdmin->paypalusername.")",
                "dlgAdminPaypalUsername" => $cAdmin->paypalusername,
                "dlgAddress" => $cUser->address1,                
                "dlgCurrencySymbol" => '$',
                "dlgCurrencyCode" => 'USD',
                "dlgPayoutItems" => $html,
            );

            return $result;
            
        } catch(SDException $e){
            $result = array('status' => 'error', 'msg' => $e->getMessage());            
            return $result;
            
        } catch(Exception $e){
            $result = array('status' => 'error', 'msg' => 'Error Retreiving Payment Information. Please try again');
            return $result;
        }
    }

}
