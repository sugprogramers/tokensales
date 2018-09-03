<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_Dashboard_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CUserModel");
        $this->load->model("FINInvestmentModel");

        if (!$this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {        
        $line1 = $this->get_investments();
        $data = array('line1' => $line1);

        $total_balances = $this->get_investor_balances();
        $data = $data + $total_balances;

        $total_projects = $this->count_investor_projects();
        $data = $data + $total_projects;
      
        $this->load->view('header/header_admin');
        $this->load->view('investor_dashboard', $data);
        $this->load->view('footer/footer_admin');
    }

    public function get_investments() {
        $arrayAllDias[] = array();
        $fechaInicio = strtotime('today -30 days');
        $fechaFin = strtotime('today');
        for ($i = $fechaInicio; $i < $fechaFin + 86400; $i += 86400) {
            $newstring = intval(date("Y", $i)) . '-' . date("m", $i) . '-' . date("d", $i);
            if (!isset($arrayAllDias[$newstring . ''])) {
                $arrayAllDias[$newstring . ''] = array('date' => $newstring, 'suma' => 0);
            }
        }


        $query = $this->FINInvestmentModel->getSumAmountPerDay(null, $this->session->session_investor['id']);
        foreach ($query->result() as $r) {
            if (isset($arrayAllDias[$r->fecha . ''])) {
                $arrayAllDias[$r->fecha . '']['suma'] = $r->suma;
            }
        }



        $line1 = '';
        foreach ($arrayAllDias as $value) {
            if (count($value) == 2)
                $line1 .= "['{$value['date']}',  {$value['suma']}],";
        }

        return $line1;
    }

    public function get_investor_balances() {
        $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);

        $investorId = '';        
        $driving_balance = 0;
        $parked_balance = 0;
        $fillingTheTank_balance = 0;
        $earnings_balance = 0;       
        if ($investor) {
            $investorId = $investor->c_investor_id;
            
            $fillingTheTank_balance = $investor->payinbalance;
            $driving_balance = $this->FINInvestmentModel->get_driving_balance_by_investor($investorId);
            $parked_balance = $this->FINInvestmentModel->get_parked_balance_by_investor($investorId);
            $earnings_balance = $investor->payoutbalance;
        }

        $data = array(
            'investorId' => $investorId, 
            'driving_balance' => $driving_balance, 
            'parked_balance' => $parked_balance,
            'fillingTheTank_balance' => $fillingTheTank_balance,
            'earnings_balance' => $earnings_balance,
            'curr_symbol' => '$');
        
        return $data;
    } 
    
    public function count_investor_projects() {
        $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);

        $driving_projects = 0;
        $parked_projects = 0;        
        if ($investor) {       
            $investorId = $investor->c_investor_id;       
            
            $driving_projects = $this->FINInvestmentModel->count_driving_projects_by_investor($investorId);
            $parked_projects = $this->FINInvestmentModel->count_parked_projects_by_investor($investorId);
        }

        $data = array(
            'driving_projects' => $driving_projects, 
            'parked_projects' => $parked_projects);

        return $data;
    }     

}
