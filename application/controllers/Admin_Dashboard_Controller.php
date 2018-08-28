<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Admin_Dashboard_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CUserModel");
        $this->load->model("FINInvestmentModel");
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {         
        $pie = $this->get_status_projects();        
        $data = array('pie' => $pie) ;        
        $line2 = $this->get_register_user();
        $data = $data + array('line2' => $line2);    
        $line1 = $this->get_investments();
        $data = $data + array('line1' => $line1); 
       
        $this->load->view('header/header_admin');
        $this->load->view('admin_dashboard',$data);
        $this->load->view('footer/footer_admin'); 
    }
    
     public function get_status_projects() {
        $countpending = $this->CProjectModel->getCountPendingProject();
        $countactive = $this->CProjectModel->getCountActiveProject();
        $countfinish = $this->CProjectModel->getCountFinishProject();
        
        $pie = "['Pending', $countpending],['Active', $countactive],['Fnish', $countfinish]," ;
        
        return $pie;
     }   
     
     public function get_register_user() {
        $arrayAllDias[] = array(); 
        $fechaInicio =  strtotime('today -30 days');
        $fechaFin = strtotime('today');
        for ($i = $fechaInicio; $i < $fechaFin +86400; $i+=86400) {
                    $newstring = intval(date("Y", $i)).'-'.date("m", $i).'-'.date("d",$i);
                    if(!isset($arrayAllDias[$newstring. ''])){
                        $arrayAllDias[$newstring.''] = array('date' =>$newstring, 'sumai' => 0 , 'sumap' => 0);
                     }
        }
        $query = $this->CUserModel->get_count_investor_per_day();        
        foreach ($query->result() as $r) {
            if(isset($arrayAllDias[$r->fecha.''])){
            $arrayAllDias[$r->fecha.'']['sumai'] = $r->suma;
            }
        }
        $query = $this->CUserModel->get_count_company_per_day();        
        foreach ($query->result() as $r) {
            if(isset($arrayAllDias[$r->fecha.''])){
            $arrayAllDias[$r->fecha.'']['sumap'] = $r->suma;
            }
        }
        $line2 ='';
        foreach ($arrayAllDias as $value) {
             if(count($value)==3)
             $line2.= "['{$value['date']}',  {$value['sumai']},  {$value['sumap']}],";            
        }
       
        return $line2;
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
        
        
        $query = $this->FINInvestmentModel->getSumAmountPerDay();    
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
