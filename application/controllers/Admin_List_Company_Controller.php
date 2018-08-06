<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_List_Company_Controller extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_list_company');
        $this->load->view('footer/footer_admin');
    }
    
    
    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->CUserModel->get_all_company();
        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                $r->c_user_id,
                $r->email,
                $r->password,
                $r->firstname,
                $r->lastname,
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Edit" onclick="edit_document('."'".$r->c_user_id."'".')"><i class="icon wb-edit"></i></a>
		 <a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Remove" onclick="delete_document('."'".$r->c_user_id."'".')"><i class="icon wb-trash"></i></a>'
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
