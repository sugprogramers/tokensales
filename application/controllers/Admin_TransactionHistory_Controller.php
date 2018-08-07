<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Admin_TransactionHistory_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentHistoryModel");
        $this->load->model("CCurrencyModel");
        $this->load->model("CUserModel");

        if ($this->session->usertype !== "ADM") {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_transaction_history');
        $this->load->view('footer/footer_admin');
    }

    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $data = array();
        try {
            $payment_history_list = $this->FINPaymentHistoryModel->getAll();

            /* @var $payhist FINPaymentHistory */
            foreach ($payment_history_list as $payhist) {
                $curr = $this->CCurrencyModel->get($payhist->c_currency_id);
                $paymentdate = $this->createDateTimeStrFormat($payhist->paymentdate, 'Y-m-d H:i:s');

                $data[] = array(
                    $paymentdate,                    
                    $curr->iso_code,
                    $payhist->amount,
                    $payhist->fromaccount,                    
                    $payhist->toaccount,                    
                    $payhist->description,                    
                    $this->renderPayHistoryType($payhist->type),
                    $this->renderPayHistoryStatus($payhist->status),
                    '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Detail" onclick="open_viewdetail(' . "'" . $payhist->fin_payment_history_id . "'" . ')"><i class="icon wb-more-vertical"></i></a>'
                );
            }

            $result = array(
                "draw" => $draw,
                "recordsTotal" => count($payment_history_list),
                "recordsFiltered" => count($payment_history_list),
                "data" => $data
            );
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
        }

        echo json_encode($result);
    }

    public function renderPayHistoryStatus($status) {
        if ($status === 'PEND') {
            return '<span class="badge badge-dark">Pending</span>';
        } else if ($status === 'CO') {
            return '<span class="badge badge-info">Completed</span>';
        } else if ($status === 'ERR') {
            return '<span class="badge badge-danger">Error</span>';
        } else {
            return '<span class="badge badge-default">NONE</span>';
        }
    }
    
    public function renderPayHistoryType($type) {        
        if ($type === 'INT') {
            return '<span class="badge badge-outline badge-default">Internal</span>';
        } else if ($type === 'EXT') {
            return '<span class="badge badge-outline badge-default">External</span>';        
        } else {
            return '<span class="badge badge-outline badge-default">NONE</span>';
        }
    }
    
    public function get_paymentHistoryDetailById() {
        $finPaymentHistoryId = $this->input->post("id");
        log_message('error', $finPaymentHistoryId);
        
        try {
            $query = $this->FINPaymentHistoryModel->get_paymentHistoryDetailById($finPaymentHistoryId);
            $queryresult = $query->result();
            if(!$queryresult){
                throw new SDException("Payment history data not found.");
            }
            $result = $queryresult[0];
           
            
            $html = '<tr>';
            $html .= '<td class="text-center">1</td>';
            $html .= '<td class="text-left">Loan Payout</td>';
            $html .= '<td>1</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '<td>'.$result->amountformatted.'</td>';
            $html .= '</tr>';

            $result = array(
                "status" => 'success',
                "dlgFinPaymentOrderId" => $result->fin_payment_order_id,
                "dlgCompanyName" => $result->companyname." (".$result->paypalusername.")",
                "dlgProjectName" => $result->name,
                "dlgAddress" => $result->address1,
                "dlgSubTotalAmount" => $result->amountformatted,
                "dlgGrandTotalAmount" => $result->amountformatted,
                "dlgPayoutItems" => $html
            );


            echo json_encode($result);
        }catch(SDException $e){
            $response = array('status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }        
        catch(Exception $e){
            $response = array('status' => 'error', 'msg' => 'Error Retreiving Payment Information. Please try again');
            echo json_encode($response);
        }
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
