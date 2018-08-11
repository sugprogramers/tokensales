<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Investor_DepositFunds_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CInvestorModel");


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

}
