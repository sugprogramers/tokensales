<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Investor_WithdrawFunds_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CInvestorModel");
        $this->load->model("FINPaymentOrderModel");
        $this->load->model("FINPaymentHistoryModel");     
        $this->load->model("CCurrencyModel");     
        
        if (!$this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $data = $this->get_paymentOrderInfo($this->session->session_investor['id']);

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

            $query = $this->FINPaymentOrderModel->get_payOutPaymentOrderByInvestorId($investor->c_investor_id);
            if ($query->num_rows() > 1) {
                throw new SDException("More than one payment-out order.");
            }

            // New Withdrawal            
            $paymentOrderId = '';
            $paymentOrderAmount = '';
            $paymentOrderCreated = ''; 
            $paymentOrderStatus = '';
            
            // Pre-Existent Withdrawal Payment Order   
            if ($query->num_rows() == 1) {
                $queryresult = $query->result();
                $paymentOrder = $queryresult[0];

                $paymentOrderId = $paymentOrder->fin_payment_order_id;
                $paymentOrderAmount = $paymentOrder->amount;
                $paymentOrderCreated = $this->createDateTimeStrFormat($paymentOrder->scheduleddate, 'Y-m-d H:i:s');
                $paymentOrderStatus = $this->FINPaymentOrderModel->get_statusName($paymentOrder->status);
            }

            // temporary static fromCurrSymbol
            $result = array(
                'status' => 'success',
                'msg' => '',
                'frmInvestorId' => $investor->c_investor_id,
                'frmTotalWithdrawAmount' => $investor->payoutbalance,
                'frmCurrSymbol' => '$',
                'frmPayinPaypal' => $investor->payin_paypalusername,
                'frmPaymentOrderId' => $paymentOrderId,
                'frmWithdrawAmount' => $paymentOrderAmount,
                'frmScheduledTime' => $paymentOrderCreated,
                'frmWithdrawStatus' => $paymentOrderStatus,
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

    public function update_payment_order() {
        $paymentOrderId = $this->input->post("paymentOrderId");
        $withrawalAmount = $this->input->post("withdrawalAmount");

        try {
            /* @var $investor CInvestor */
            $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
            if (!$investor) {
                throw new SDException("Investor not found.");
            }            

            if (trim($paymentOrderId) !== '') {
                throw new SDException("Existent Withdrawal payment orders cannot be edited.");
            }
            
            $query = $this->FINPaymentOrderModel->get_payOutPaymentOrderByInvestorId($investor->c_investor_id);
            if ($query->num_rows() > 0) {
                throw new SDException("Already exists a payment order to withdraw, please refresh.");
            }

            if ($withrawalAmount <= 0 || ($withrawalAmount > $investor->payoutbalance)) {
                throw new SDException("Invalid balance.");
            }

            $paymentOrder = new FINPaymentOrder();
            $paymentOrder->isactive = 'Y';
            $paymentOrder->ordertype = 'INVPAYOUT';
            $paymentOrder->status = 'PEND';
            $paymentOrder->scheduleddate = date("Y-m-d H:i:s");
            $paymentOrder->amount = $withrawalAmount;
            $paymentOrder->c_investor_id = $investor->c_investor_id;

            $this->FINPaymentOrderModel->save($paymentOrder, $this->session->session_investor['id']);

            $response = array(
                'status' => 'success',
                'msg' => '',
                'frmPaymentOrderId' => $paymentOrder->fin_payment_order_id,
                'frmScheduledTime' => $this->createDateTimeStrFormat($paymentOrder->scheduleddate, 'Y-m-d H:i:s'),
                'frmWithdrawStatus' => $this->FINPaymentOrderModel->get_statusName($paymentOrder->status),
            );

            echo json_encode($response);            
            
        } catch (SDException $e) {
            $response = array('status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);            
            
        } catch (Exception $e) {
            $response = array('status' => 'error', 'msg' => 'Error Retreiving Payment Information. Please try again');
            echo json_encode($response);            
            
        }
    }
    
    public function get_transaction_history_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $data = array();
        try {
            $query = $this->FINPaymentHistoryModel->get_payOutPaymentHistoryByUserId($this->session->session_investor['id']);   
        
            foreach ($query->result() as $payhist) {
                $curr = $this->CCurrencyModel->get($payhist->c_currency_id);
                $paymentdate = $this->createDateTimeStrFormat($payhist->paymentdate, 'Y-m-d H:i:s');
 
                $data[] = array(
                    $paymentdate,
                    $curr->iso_code,
                    $payhist->amount,
                    $payhist->fromaccount,
                    $payhist->toaccount,
                    $payhist->description,
                    $this->renderPayHistoryStatus($payhist->status),
                    $payhist->fin_payment_order_id
                );
            }

            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $data
            );
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
        }

        echo json_encode($result);        
    }

    public function renderPayHistoryStatus($status) {
        $name = $this->FINPaymentHistoryModel->get_statusName($status);
        if ($status === 'PEND') {
            return '<span class="badge badge-dark">'.$name.'</span>';
        } else if ($status === 'CO') {
            return '<span class="badge badge-info">'.$name.'</span>';
        } else if ($status === 'ERR') {
            return '<span class="badge badge-danger">'.$name.'</span>';
        } 
        return '<span class="badge badge-default">'.$name.'</span>';        
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
