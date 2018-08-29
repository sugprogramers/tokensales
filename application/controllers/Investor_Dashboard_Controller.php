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
        
        $balance = $this->get_balance();
        $data = $data + $balance; 
        
        $countactive = $this->CProjectModel->getCountActiveProject();
        $data = $data + array('countactive' => $countactive); 
        
        $this->load->view('header/header_admin');
        $this->load->view('investor_dashboard',$data);
        $this->load->view('footer/footer_admin');        
    }
    
      public function get_investments() {
        $arrayAllDias[] = array(); 
        $fechaInicio =  strtotime('today -30 days');
        $fechaFin = strtotime('today');
        for ($i = $fechaInicio; $i < $fechaFin +86400; $i+=86400) {
                    $newstring = intval(date("Y", $i)).'-'.date("m", $i).'-'.date("d",$i);
                    if(!isset($arrayAllDias[$newstring. ''])){
                        $arrayAllDias[$newstring.''] = array('date' =>$newstring, 'suma' => 0 );
                     }
        }
        
        
        $query = $this->FINInvestmentModel->getSumAmountPerDay(null,$this->session->session_investor['id']);    
        foreach ($query->result() as $r) {
            if(isset($arrayAllDias[$r->fecha.''])){
            $arrayAllDias[$r->fecha.'']['suma'] = $r->suma;
            }
        }
        
       
       
        $line1 ='';
        foreach ($arrayAllDias as $value) {
             if(count($value)==2)
             $line1.= "['{$value['date']}',  {$value['suma']}],";            
        }
       
        return $line1;
     }
     
     
     public function get_balance() {
     
      $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
        
        $investorId = '';
        $payinbalance = 0;        
        if ($investor) {
            $investorId = $investor->c_investor_id;
            $payinbalance = $investor->payinbalance;
        }
       
        $data = array('investorId' => $investorId, 'payinbalance' => $payinbalance, 'curr_symbol' => '$');
        
        return $data;
    }
   
}
