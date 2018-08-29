<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investor_Investment_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("FINInvestmentModel");
        $this->load->model("CProjectModel");
        
        if (!$this->session->has_userdata("session_investor")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {      
        
        $data['userid'] = $this->session->session_investor['id'];
        $this->load->view('header/header_admin');
        $this->load->view('investor_investment',$data);
        $this->load->view('footer/footer_admin');        
    }
    
    
    public function get_investment_list(){
      
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $userId =$this->input->get("id");
  
      $query = $this->FINInvestmentModel->get_investment_project_list($userId);
      $data = [];
        
      $count = 0;
       foreach ($query as $obj) {
           
           $data[] = array(
                $obj->name,
                $obj->amount . " " . $obj->cursymbol,               
                $obj->companyname . " " . '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="more info" onclick="moreinfo_investment('."'".$obj->fin_investment_id."'".')"><i class="icon wb-info-circle"></i></a>',
                $this->CProjectModel->getProjectStatusName($obj->projectstatus),
                $obj->investmentdate,
                $this->FINInvestmentModel->getInvestmentStatusName($obj->investmentstatus), 
                $obj->percent,
                $obj->earning,
                $obj->longitude,
                $obj->latitude,
               $count
           );
           
           $count++;
          
       }
      
      $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($data),
                 "recordsFiltered" => count($data),
                 "data" => $data
            );

      echo json_encode($result);
     
      
      exit();
   }
   
   
   public function get_investmentdetail_list(){
       
      $investmentId = $this->input->post("id");
      
      try{ 
        $query = $this->FINInvestmentModel->get_investment_detail($investmentId);
       
       $data = [];
       if($query){
         $data[] = array("invpercent" => $query->invpercent,
                         "invamount" => $query->invamount, 
                         "invdate" => $query->invdate,
                         "invearns" => $query->invearns,
                         "prjtarget" => $query->targetamt,
                         "prjstartdate" => $query->startdate,
                         "prjyield" => $query->totalyieldperc,
                         "invpercentround"  =>  $query->invpercentround);
         
           //log_message('error', $cProjectDocId . " -- "  . $cProjectDoc->name  . " -- ". $cProjectDoc->ismandatory);
              
         $response = array('redirect' => '', 'status' => 'success', 'data' => $data);
         echo json_encode($response);
       }else{
           $response = array('redirect' => '', 'status' => 'error', 'msg' => 'Data not Found !!');
            echo json_encode($response);
       }
            
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
   }
   
   
   //deprecated
   public function get_locator() {
       
       $cUserId = $this->input->post("id"); // 
       echo $cUserId;
       try{ 
           // $query = $this->FINInvestmentModel->get_investment_project_list($userId);
            $data = [];
            
            /*foreach ($query as $obj) {
           
              $data[] = array("longitud" =>  $obj->longitud,
                              "latitud" => $obj->latitud
               );
          
            }*/
            
             $data[] = array("longitud" =>  '47.426341',
                              "latitud" => '-115.421390',
                              "title" => 'project 1');
             
              $data[] = array("longitud" =>  '45.431016',
                              "latitud" => '-99.273460',
                              "title" => 'project 2');
              
               $data[] = array("longitud" =>  '40.568565',
                              "latitud" => '-106.398504',
                              "title" => 'project 3');
            
       
            
          //  $dataTotal[] = array($data)

              $response = array('redirect' => '', 'status' => 'success', 'data' => $data);
              echo json_encode($response);
          
            
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
    }
    
   
}
