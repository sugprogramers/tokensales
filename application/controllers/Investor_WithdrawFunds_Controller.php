<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Investor_WithdrawFunds_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CInvestorModel");
        $this->load->model("FINPaymentOrderModel");

        if ($this->session->usertype !== "INV") {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $data = $this->get_paymentOrderInfo($this->session->id);       
        $this->load->view('header/header_admin');
        $this->load->view('investor_withdrawfunds', $data);
        $this->load->view('footer/footer_admin');
    }

    public function get_paymentOrderInfo($cUserId) {
        try {
            /* @var $investor CInvestor */
            $investor = $this->CInvestorModel->getByUserId($cUserId);
            if (!$investor) {
                throw new SDException("Investor not found.");
            }

            $query = $this->FINPaymentOrderModel->get_payOutPaymentOrderByInvestor($investor->c_investor_id);
            if ($query->num_rows() > 1) {
                throw new SDException("More than one payment-out order.");
            }                                   
            
            if ($query->num_rows() == 0) {
                // New Withdrawal            
                $paymentOrderCreated = date("Y-m-d H:i:s");
                $paymentOrderStatus = 'New Withdrawal';
                $paymentOrderId = '<None>';
                $paymentOrderAmount = '';
                
                $investorId = $investor->c_investor_id;
                $payoutbalance = $investor->payoutbalance;
                $payin_paypalusername = $investor->payin_paypalusername;  
                
                $newPaymentOrder = 'Y';
                
            } else {
                // Pre-Existent Withdrawal Payment Order   
                $queryresult = $query->result(); 
                $paymentOrder = $queryresult[0];
            
                $paymentOrderCreated = $this->createDateTimeStrFormat($paymentOrder->created,'Y-m-d H:i:s');
                $paymentOrderStatus = $this->FINPaymentOrderModel->get_statusName($paymentOrder->status);
                $paymentOrderId = $paymentOrder->fin_payment_order_id;
                $paymentOrderAmount = $paymentOrder->amount;
                
                $investorId = $investor->c_investor_id;
                $payoutbalance = $investor->payoutbalance;
                $payin_paypalusername = $investor->payin_paypalusername;                    
                
                $newPaymentOrder = 'N';
            }
            
            // temporary static curr_symbol
            $result = array(
                'investorId' => $investorId,
                'payoutbalance' => $payoutbalance,
                'curr_symbol' => '$',
                'payin_paypalusername' => $payin_paypalusername,
                'finPaymentOrderId' => $paymentOrderId,
                'paymentOrderAmount' => $paymentOrderAmount,
                'creationtime' => $paymentOrderCreated,
                'status' => $paymentOrderStatus,
                'newPaymentOrder' => $newPaymentOrder
            );

            return $result;
            
        } catch (SDException $e) {
            $result = array('status' => 'error', 'msg' => $e->getMessage());
            return $result;
            
        } catch (Exception $e) {
            $result = array('status' => 'error', 'msg' => 'Error Retreiving Payment Information. Please try again');
            return $result;
            
        }
    }
    
    public function save($cInvestorId, $withdrawAmount) {
        
    }
    
    public function createDateTimeStrFormat($strDate, $format = 'Y-m-d') {
        if (!$format || strcmp(trim($format), '') == 0) {
            $format = 'Y-m-d';
        }
        if (stripos($strDate, '.')) {
            return DateTime::createFromFormat('Y-m-d H:i:s.u', $strDate)->format($format);
        } else {
            return DateTime::createFromFormat('Y-m-d H:i:s', $strDate)->format($format);
        }
    }    

}
