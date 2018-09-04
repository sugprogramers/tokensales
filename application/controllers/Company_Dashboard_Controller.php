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
        
        $infoProject = $this->info_projects();
        $data = $data + $infoProject;
        
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
     
     
     public function get_carousel_data() {
         
        $userId = $this->session->session_company['id'];
        $query = $this->CProjectModel->getAllByCompany($userId);
        
        $html = '';
        $count=0;
        foreach ($query->result() as $r) {
            
            $active = ($count>0)?'':"active";
            $targetamt = $r->targetamt;
            $sumamount = $this->FINInvestmentModel->getSumAmountByProject($r->c_project_id);
            $percent = $this->get_percentage($targetamt, $sumamount);
            $statusproject = $this->CProjectModel->getProjectStatusName($r->projectstatus);
            //$duedate = $r->datelimit;
            $duedate = DateTime::createFromFormat('Y-m-d H:i:s', $r->datelimit)->format('Y-m-d');
            $sumamount = $this->formato_numero($sumamount);
            $targetamt = $this->formato_numero($targetamt);
            
            $projectName= $r->name;
            $numInvestor =   $this->FINInvestmentModel->getCountInvestorsByProject($r->c_project_id);
          
            $html .= $this->get_htm_item($projectName, $statusproject, $percent, $targetamt, $sumamount,$duedate, $numInvestor, $active);
            $count++;
            
        }
        
        $response = array('html' => $html);
        echo json_encode($response);
    }
    
    private function get_htm_item($name,$statusproject,  $percent, $goal, $invested , $duedate, $numInvestor,$active) {

        return
        '  
          <div class="carousel-item '.$active.'">
            <div class="card card-block p-2 flex-row justify-content-between">
             
                <div class="col-lg-8">
                    <div class="counter counter-lg">
                        <div class="counter-label text-uppercase">'.$name.'</div>
                        <div class="counter-number-group">
                            <span class="counter-icon mr-10 green-600">
                             <i class="wb-stats-bars"></i>
                            </span>
                            <span class="counter-number">'.$percent.'</span>
                            <span class="counter-number-related">%</span>
                        </div>
                        <div class="row" >
                            <div class="col-lg-12">
                             <div class="counter-label"> Due Date: '.$duedate.'</div>
                            </div>
                        </div>
                       

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="counter-label"> &nbsp</div>
                    <div class="counter-label">'.$goal.' Goal  </div>
                    <div class="counter-label">'.$invested.' Supported</div>
                    <div class="counter-label">'.$numInvestor.' Investor</div>
                    <div class="counter-label"> '.$statusproject.'</div>
                    
                </div>
                
             
            </div>
          </div>
        ';
    }
    
    private function get_percentage($total, $number){
      if ( $total > 0 ) {
       return round($number / ($total / 100),1);
      } else {
        return 0;
      }
    }
    
    private function formato_numero($numero , $decimales=0){
    $numero = number_format($numero, $decimales, '.', ',');    
    return $numero;
    }
    
    public function info_projects() {
        
        $userId = $this->session->session_company['id'];
        $query = $this->CProjectModel->getAllByCompany($userId);
        
        $count=0;
        $numActive =0;
        $numFunding =0;
        $numDraft =0;
        
        foreach ($query->result() as $r) {
            $count++;
            
            if(in_array($r->projectstatus, array('FU', 'COFU'))) //Solo proyectos funding
             $numFunding++;
            
            if(in_array($r->projectstatus, array('ACT'))) //Solo proyectos Active
             $numActive++;
            
            if(in_array($r->projectstatus, array('DRAFT'))) //Solo proyectos Draft
             $numDraft++;
            
        }

        $data = array(
            'totalprojects' => $count, 
            'curr_symbol' => "$", 
            'numactive' => $numActive,
            'numfunding' => $numFunding,
            'numdraft' => $numDraft);

        return $data;
    }
    
    
   
}
