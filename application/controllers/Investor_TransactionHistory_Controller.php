<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Investor_TransactionHistory_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentHistoryModel");
        $this->load->model("CCurrencyModel");
        $this->load->model("CUserModel");

        if ($this->session->usertype !== "INV") {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('investor_transaction_history');
        $this->load->view('footer/footer_admin');
    }

    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $data = array();
        try {

            $query = $this->FINPaymentHistoryModel->loadByUser($this->session->id);            
                        
            foreach ($query->result() as $payhist) {
                $curr = $this->CCurrencyModel->get($payhist->c_currency_id);
                $paymentdate = $this->createDateTimeStrFormat($payhist->paymentdate, 'Y-m-d H:i:s');

                $html_action = '';
                if ($payhist->type === "EXTOUT") {
                    $html_action = '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Detail" onclick="open_viewdetail1(' . "'" . $payhist->fin_payment_history_id . "'" . ')"><i class="icon wb-more-vertical"></i></a>';
                }
 
 
                $data[] = array(
                    $paymentdate,
                    $curr->iso_code,
                    $payhist->amount,
                    $payhist->fromaccount,
                    $payhist->toaccount,
                    $payhist->description,
                    $this->renderPayHistoryType($payhist->type),
                    $this->renderPayHistoryStatus($payhist->status),
                    $html_action
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

    public function renderPayHistoryType($type) {
        $name = $this->FINPaymentHistoryModel->get_typeName($type);
        return '<span class="badge badge-outline badge-default">'.$name.'</span>';
    }

    public function get_paymentHistoryDetailById() {
        $finPaymentHistoryId = $this->input->post("id");

        try {
            $query = $this->FINPaymentHistoryModel->get_paymentHistoryDetailById($finPaymentHistoryId);
            $queryresult = $query->result();
            if (!$queryresult) {
                throw new SDException("Payment history data not found.");
            }
            $result = $queryresult[0];

            $from_user = $this->CUserModel->get($result->from_user_id);
            $to_user = $this->CUserModel->get($result->to_user_id);
            $paymentdate = $this->createDateTimeStrFormat($result->paymentdate, 'Y-m-d H:i:s');

            if ($result->ordertype === 'INVPAYOUT') {
                $html_description = $result->firstname . " " . $result->lastname;
            } else { // 'PROMPAYOUT'
                $html_description = $result->companyname . " (" . $result->paypalusername . ") <br> Project: " . $result->name;
            }
            $html = '<tr>';
            $html .= '<td class="text-left">' . $html_description . '</td>';
            $html .= '<td>' . $result->amountformatted . '</td>';
            $html .= '</tr>';

            $result = array(
                "status" => 'success',
                "dlgFinPaymentHistoryId" => $result->fin_payment_history_id,
                "dlgPaymentDate" => $paymentdate,
                "dlgFromAccount" => $result->fromaccount . " (user: " . $from_user->email . ")",
                "dlgToAccount" => $result->toaccount . " (user: " . $to_user->email . ")",
                "dlgDescription" => $result->description,
                "dlgToTitle" => (($result->ordertype === 'INVPAYOUT') ? 'To Investor:' : 'To Project:'), 
                'dlgPayoutItemTitleDetail' => (($result->ordertype === 'INVPAYOUT') ? 'Investor Detail' : 'Project Detail'),
                "dlgPayoutItems" => $html
            );

            echo json_encode($result);
            
        } catch (SDException $e) {
            $response = array('status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
            
        } catch (Exception $e) {
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
