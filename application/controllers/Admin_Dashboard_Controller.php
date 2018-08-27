<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Admin_Dashboard_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CUserModel");
        
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {   
        
        $countpending = $this->CProjectModel->getCountPendingProject();
        $countactive = $this->CProjectModel->getCountActiveProject();
        $countfinish = $this->CProjectModel->getCountFinishProject();
        
        $pie = "['Pending', $countpending],['Active', $countactive],['Fnish', $countfinish]," ;
        $data = array('pie' => $pie) ;
        
        
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
       
        
        
       $data = $data + array('line2' => $line2) ;
        
       
        $this->load->view('header/header_admin');
        $this->load->view('admin_dashboard',$data);
        $this->load->view('footer/footer_admin');  
    }
   
}
