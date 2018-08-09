<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_Edit_Project_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");

        if ($this->session->usertype !== "COMPMAN") {
            redirect(base_url() . 'login');
        }
    }

    public function index($idproject = null) {
        $data = array('idproject' => null);
        if ($idproject != null && $this->CProjectModel->getById($idproject)) {
            $data = array('idproject' => $idproject);
        }
        $this->load->view('header/header_admin');
        $this->load->view('company_edit_project', $data);
        $this->load->view('footer/footer_admin');
    }

}
