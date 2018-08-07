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

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_project_ppayout');
        $this->load->view('footer/footer_admin');
    }

    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->FINPaymentOrderModel->get_projects_ppayout();
        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                $r->name,
                $r->companyname,
                $r->targetamt,
                $r->iso_code,
                DateTime::createFromFormat('Y-m-d H:i:s', $r->datelimit)->format('Y-m-d'),
                $r->amount,
                DateTime::createFromFormat('Y-m-d H:i:s', $r->scheduleddate)->format('Y-m-d'),
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Execute Payment" onclick="open_executepayment('."'".$r->fin_payment_order_id."'".')"><i class="icon wb-edit"></i></a>'
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );


        echo json_encode($result);
        exit();
    }
    
    public function get_paymentOrderInfoById() {

        $finPaymentOrderId = $this->input->post("id");
        log_message('error', $finPaymentOrderId);
        try {
            $query = $this->FINPaymentOrderModel->get_paymentOrderInfoById($finPaymentOrderId);
            $queryresult = $query->result();
            if(!$queryresult){
                throw new SDException("Pending Payment order not found.");
            }
            $result = $queryresult[0];
            
            $cAdmin = $this->CAdminModel->loadByUserId(CAdminModel::$cAdminId);
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
    
    public function execute_paymentorder() {
       
       $finPaymentOrderId = $this->input->post();
      
       try {
           log_message('error', '122:'.implode($finPaymentOrderId,' - '));
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
