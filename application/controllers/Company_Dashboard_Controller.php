<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_Dashboard_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CUserModel");
        $this->load->model("FINInvestmentModel");
        
        if($this->session->usertype !== "COMPMAN"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {  
        $pie = $this->get_status_projects();        
        $data = array('pie' => $pie) ;   
        $line1 = $this->get_investments();
        $data = $data + array('line1' => $line1); 
        
        $this->load->view('header/header_admin');
        $this->load->view('company_dashboard',$data);
        $this->load->view('footer/footer_admin');        
    }
    
      public function get_status_projects() {
        $countpending = $this->CProjectModel->getCountPendingProject($this->session->id);
        $countactive = $this->CProjectModel->getCountActiveProject($this->session->id);
        $countfinish = $this->CProjectModel->getCountFinishProject($this->session->id);
        
        $pie = "['Pending', $countpending],['Active', $countactive],['Fnish', $countfinish]," ;
        
        return $pie;
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
        
        
        $query = $this->FINInvestmentModel->getSumAmountPerDay($this->session->id);    
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
   
}
