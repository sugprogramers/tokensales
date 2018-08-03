<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_List_Investor_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUser/CUserModel");
    }

    public function index() {
        if (!$this->session->userdata("login_admin")) {
            redirect(base_url() . 'login');
        }
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
            $data[] = array(
                $r->c_user_id,
                $r->email,
                $r->password,
                $r->firstname,
                $r->lastname,
                '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $r->c_user_id . "'" . ')"><i class="icon fa-edit"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $r->c_user_id . "'" . ')"><i class="icon fa-trash"></i> Delete</a>'
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
