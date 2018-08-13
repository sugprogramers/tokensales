<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Investor_DepositFunds_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CInvestorModel");
        $this->load->model("FINPaymentHistoryModel");     
        $this->load->model("CCurrencyModel");  

        if ($this->session->usertype !== "INV") {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        /* @var $investor CInvestor */
        $investor = $this->CInvestorModel->getByUserId($this->session->id);
        
        $investorId = '';
        $payinbalance = 0;        
        if ($investor) {
            $investorId = $investor->c_investor_id;
            $payinbalance = $investor->payinbalance;
        }
        // temporary curr_symbol
        $data = array('investorId' => $investorId, 'payinbalance' => $payinbalance, 'curr_symbol' => '$');

        $this->load->view('header/header_admin');
        $this->load->view('investor_depositfunds', $data);
        $this->load->view('footer/footer_admin');
    }   

    public function get_transaction_history_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $data = array();
        try {
            $query = $this->FINPaymentHistoryModel->get_payInPaymentHistoryByUserId($this->session->id);   
        
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
                    $this->renderPayHistoryStatus($payhist->status)
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
