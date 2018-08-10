<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_List_Investor_Controller extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CInvestorModel");
        $this->load->model("FINInvestmentModel");
        
       
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_list_investor');
        $this->load->view('footer/footer_admin');
    }

    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->CUserModel->get_all_investor();
        $data = [];
        foreach ($query->result() as $r) {
            
            $objInvestor = $this->CInvestorModel->getByUserId($r->c_user_id);
            if(!$objInvestor)
                continue;
            
            $status = $this->CInvestorModel->getInvestorStatusName($objInvestor->status);
            $notes = $objInvestor->validationnotes;
            $investamt = $this->FINInvestmentModel->getTotalInvestedByInvestor($objInvestor->c_investor_id);
            $data[] = array(
                $r->email,
                $r->firstname . " " .$r->lastname,
                $investamt,
                $notes,
                $status,
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Edit Notes" onclick="edit_document('."'".$objInvestor->c_investor_id."'".')"><i class="icon wb-edit"></i></a>
		 <a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="View Info" onclick="investor_viewinfo('."'".$objInvestor->c_investor_id."'".')"><i class="icon wb-search"></i></a>'
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
