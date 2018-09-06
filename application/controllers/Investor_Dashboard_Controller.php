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
        
        $pie = $this->get_data_investmentPie();
        $data = $data + array('pie' => $pie) ;           

        $total_balances = $this->get_investor_balances();
        $data = $data + $total_balances;

        $total_projects = $this->count_investor_projects();
        $data = $data + $total_projects;
      
        $this->load->view('header/header_admin');
        $this->load->view('investor_dashboard', $data);
        $this->load->view('footer/footer_admin');
    }
    
    public function get_data_investmentPie() {
        $userId = $this->session->session_investor['id'];
        $query = $this->FINInvestmentModel->get_investment_total_by_project_list($userId);
         
        $pie = "";      
        foreach ($query as $obj) {
                $aux = ",";
                if(strlen($pie)==0) {
                        $aux = "";
                }                        
                $pie = $pie .$aux . "['" . $obj->name ."',". $obj->amount ."]";
        }        
        return $pie;
     } 
           

    public function get_investments() {
        $line1 = '';
        $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);
        if (!$investor) {
            return $line1;
        }
        
        $arrayAllDias[] = array();
        $fechaInicio = strtotime('today -30 days');
        $fechaFin = strtotime('today');
        for ($i = $fechaInicio; $i < $fechaFin + 86400; $i += 86400) {
            $newstring = intval(date("Y", $i)) . '-' . date("m", $i) . '-' . date("d", $i);
            if (!isset($arrayAllDias[$newstring . ''])) {
                $arrayAllDias[$newstring . ''] = array('date' => $newstring, 'drivingamt' => 0, 'parkedamt' => 0);
            }
        }

        /* $query = $this->FINInvestmentModel->getSumAmountPerDay(null, $this->session->session_investor['id']);
          foreach ($query->result() as $r) {
          if (isset($arrayAllDias[$r->fecha . ''])) {
          $arrayAllDias[$r->fecha . '']['suma'] = $r->suma;
          }
          } */                
        $query = $this->FINInvestmentModel->get_driving_investments_per_day($investor->c_investor_id);
        log_message('error','DRIVINGGG');
        log_message('error', print_r($query->result(),true));
        foreach ($query->result() as $r) {
            if (isset($arrayAllDias[$r->fecha . ''])) {
                $arrayAllDias[$r->fecha . '']['drivingamt'] = $r->amount;
            }
        }
        $query = $this->FINInvestmentModel->get_parked_investments_per_day($investor->c_investor_id);
        log_message('error','PARKEDD');
        log_message('error', print_r($query->result(),true));
        foreach ($query->result() as $r) {
            if (isset($arrayAllDias[$r->fecha . ''])) {
                $arrayAllDias[$r->fecha . '']['parkedamt'] = $r->amount;
            }
        }

        foreach ($arrayAllDias as $value) {
            if (count($value) == 3)
                $line1 .= "['{$value['date']}',  {$value['drivingamt']},  {$value['parkedamt']}],";
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
    
    public function get_carousel_data() {
        
        $investor = $this->CInvestorModel->getByUserId($this->session->session_investor['id']);

        $driving_projects = 0;
        $parked_projects = 0;        
        if ($investor) {       
            $investorId = $investor->c_investor_id;       
            
            $driving_projects = $this->FINInvestmentModel->count_driving_projects_by_investor($investorId);
            $parked_projects = $this->FINInvestmentModel->count_parked_projects_by_investor($investorId);
        }
        
        
         
        $userId = $this->session->session_company['id'];
        $query = $this->CProjectModel->getAllByCompany($userId);
        
        $html = '';
        $count=0;
        
        $html .= $this->get_htm_item('Project', $driving_projects, 'Driving',"active");
        $html .= $this->get_htm_item('Project', $parked_projects,  'Parked','');
        
      /*  foreach ($query->result() as $r) {
            
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
            
        }*/
        
        $response = array('html' => $html);
        echo json_encode($response);
    }
    
    
     private function get_htm_item($name, $valor, $description,$active) {

        return
        '  
          <div class="carousel-item '.$active.'">
            <div class="card card-block p-2 flex-row justify-content-between ">
             
                <div class="col-lg-8">
                    <div class="counter counter-lg">
                        <div class="counter-label text-uppercase">'.$name.'</div>
                        <div class="counter-number-group">
                            <span class="counter-icon mr-10 green-600">
                             <i class="wb-stats-bars"></i>
                            </span>
                            <span class="counter-number">'.$valor. ' '. $description.'</span>
                        </div>
                        <div class="row" >
                            <div class="col-lg-12">
                             <div class="counter-label"> </div>
                            </div>
                        </div>
                       

                    </div>
                </div>
   
            </div>
          </div>
        ';
    }

}
