<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Admin_List_Project_PPayout_Controller extends CI_Controller {

    
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
        $this->load->view('admin_list_project_ppayout');
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
                '<input class="dg_check_item" type="checkbox" name="dg_payment_order_'.$r->fin_payment_order_id.'" value="'.$r->fin_payment_order_id.'" onclick="toggle_payment_order_checkbox(this)" />',
                $r->name,
                $r->companyname,
                $r->targetamt,
                $r->iso_code,
                DateTime::createFromFormat('Y-m-d H:i:s', $r->datelimit)->format('Y-m-d'),
                $r->amount,
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