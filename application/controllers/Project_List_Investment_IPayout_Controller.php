<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Project_List_Investment_IPayout_Controller extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINPaymentOrderModel");
        $this->load->model("CAdminModel");
        $this->load->model("CProjectmanagerModel");
        
        if (!$this->session->has_userdata("session_company")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('project_list_investment_ipayout');
        $this->load->view('footer/footer_admin');
    }

    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $cUser = $this->session->session_company['id'];
        
        $cProjectManager = $this->CProjectmanagerModel->loadByUserId($cUser);
        $cProjectManagerId = ($cProjectManager)?$cProjectManager->c_projectmanager_id:"";

        $query = $this->FINPaymentOrderModel->get_project_investments_ipayout($cProjectManagerId);
        $data = [];
        foreach ($query->result() as $r) {
            log_message('error', json_encode($r));
            $data[] = array(
                '<input class="dg_check_item" type="checkbox" name="dg_payment_order_'.$r->fin_payment_order_id.'" value="'.$r->fin_payment_order_id.'" onclick="toggle_payment_order_checkbox(this)" />',
                $r->projectName,
                $r->companyName,
                $r->c_investor_id,
                // $r->investorname,
                // $r->investorEmail,
                $r->amount,
                $r->iso_code,
                DateTime::createFromFormat('Y-m-d H:i:s', $r->scheduleddate)->format('Y-m-d')
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

}
