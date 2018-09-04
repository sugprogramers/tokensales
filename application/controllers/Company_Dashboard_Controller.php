<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_Dashboard_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CUserModel");
        $this->load->model("FINInvestmentModel");
        
        if (!$this->session->has_userdata("session_company")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {  
        $pie = $this->get_status_projects();        
        $data = array('pie' => $pie) ;   
        
               
        $line1 = $this->get_investments();
        $data = $data + array('line1' => $line1); 
        
        $line2 = $this->get_projects_investments_to_linechart();
        $data = $data + array('line2' => $line2); 
        
        //BarGraph
        $bar = $this->get_barGraphData();
        $data = $data + array('bargraph' => $bar); 
        
        $this->load->view('header/header_admin');
        $this->load->view('company_dashboard',$data);
        $this->load->view('footer/footer_admin');        
    }
    
    public function get_barGraphData(){
        $userId = $this->session->session_company['id'];
        $query = $this->CProjectModel->getAllByCompany($userId);
        $barData = "";
        
        $header = "['Project', 'Funding Goal', 'Parked']";
        $count=0;
        foreach ($query->result() as $r) {
            
            if(!in_array($r->projectstatus, array('FU', 'COFU','ACT')))
                    continue;
            
            $sumamount = $this->FINInvestmentModel->getSumAmountByProject($r->c_project_id);
            
                $aux = ",";
                if(strlen($barData)==0)
                    $aux = "";
                $barData = $barData .$aux . "['" . $r->name ."',". $r->targetamt .",". $sumamount."]";
               
            $count++;
        }
        
        //Esto solo es para que siempre haya 5 barras en el grafico, si hay menos de 5 proyectos se completaran con barras en blanco
        for($i = $count ; $i<5 ; $i++){
                $aux = ",";
                if(strlen($barData)==0)
                    $aux = "";
                $barData = $barData .$aux . "[' ',". 0 .",". 0 ."]"; //Mando cosas Vacias a la grafica para que se vea mas ordenado
            
        }
        
         return $barData;  
        
        
        
    }
    
      public function get_status_projects() {
        $countpending = $this->CProjectModel->getCountPendingProject($this->session->session_company['id']);
        $countactive = $this->CProjectModel->getCountActiveProject($this->session->session_company['id']);
        $countfinish = $this->CProjectModel->getCountFinishProject($this->session->session_company['id']);
        
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
        
        
        $query = $this->FINInvestmentModel->getSumAmountPerDay($this->session->session_company['id']);    
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
     
     
     public function get_projects_investments_to_linechart() {
        $arrayAllDias[] = array(); 
        $fechaInicio =  strtotime('today -30 days');
        $fechaFin = strtotime('today');
        
        for ($i = $fechaInicio; $i < $fechaFin +86400; $i+=86400) {
                    $newstring = intval(date("Y", $i)).'-'.date("m", $i).'-'.date("d",$i);
                    if(!isset($arrayAllDias[$newstring. ''])){
                        $arrayAllDias[$newstring.''] = array('date' =>$newstring,
                                                             'projectinfo' => array()
                                                             );
                     }
        }
        
        //Get Total of Project in Funding State
          $userId = $this->session->session_company['id'];
          $query = $this->CProjectModel->getAllByCompany($userId);
          $header = "['Day',"; //Se esta formando la Cabecera para el Gráfico
              
          foreach ($query->result() as $r) {
              
             //  if(!in_array($r->projectstatus, array('FU', 'COFU'))) //Solo proyectos funding
             //          continue;
               
               $header.="'".$r->name."',";
               
                //Setting Array Alldias 
                foreach ($arrayAllDias as $key => $value)
                   $arrayAllDias[$key]['projectinfo'][$r->name] = 0;
                
           
                $queryData = $this->FINInvestmentModel->getSumAmountPerDay(null,null,$r->c_project_id); 
                $suma = 0;
                foreach ($queryData->result() as $s) {
                    if(isset($arrayAllDias[$s->fecha.''])){
                        $suma = $suma + $s->suma;
                        $arrayAllDias[$s->fecha.'']['projectinfo'][$r->name] = $suma;
                    }
                }
         }
         $header.="],";
         
        
        $line1 ='';
        foreach ($arrayAllDias as $key => $value) {
             if($key == null) continue;
             $line1.= "['{$key}',";            
             
             foreach($value['projectinfo'] as $projectName => $projectSum){
                 $line1.= "{$projectSum},";
             }
             $line1.= "],";
        }
       
       
        return $header.$line1;
     }
   
}
