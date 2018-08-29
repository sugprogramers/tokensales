<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_List_Investor_Controller extends CI_Controller {

    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CInvestorModel");
        $this->load->model("FINInvestmentModel");
       
        if (!$this->session->has_userdata("session_admin")) {
            redirect(base_url() . 'login');
        } 
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_list_investor');
        $this->load->view('footer/footer_admin');
    }

    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->CUserModel->get_all_investor();
        $data = [];
        foreach ($query->result() as $r) {
            
            $objInvestor = $this->CInvestorModel->getByUserId($r->c_user_id);
            if(!$objInvestor)
                continue;
            
            $status = $this->CInvestorModel->getInvestorStatusName($objInvestor->status);
            $notes = $objInvestor->validationnotes;
            $investamt = $this->FINInvestmentModel->getTotalInvestedByInvestor($objInvestor->c_investor_id);
            $data[] = array(
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Log In" onclick="loginInvestor('."'".$r->c_user_id."'".')"><i class="icon fa-sign-in" ></i></a>',
                $r->email,
                $r->firstname . " " .$r->lastname,
                $investamt,
                $notes,
                $status,
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="View Info" onclick="investor_viewinfo('."'".$objInvestor->c_investor_id."'".')"><i class="icon wb-search"></i></a>'                
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );


        echo json_encode($result);
        exit();
    }
    
    
    public function get_customItemById() {
       
       $cInvestorId = $this->input->post("id");
       
       try{ 
       $query = $this->CInvestorModel->getInvestorCustomDataById($cInvestorId);  
       $queryresult = $query->result();
        if(!$queryresult)
           throw new SDException("No Data About Investor.");
          
       $result = $queryresult[0];

       $data = [];
       $dataInvestor = [];
       
           
           $data = array( 'investorname' => $result->firstname . " " . $result->lastname,
                        'investoremail' => $result->email, 
                        'investorphone' => $result->phone,
                        'investorborn' => $result->birthday,
                        'investorcountry' => $result->usercountry,
                        'investorcity' => $result->userregion,
                        );
         
            //Investment info
            $dataInvestor = array(
                        'investortaxcountry' => $result->taxcountry,
                        'investortaxfiscalnumber' => $result->tax_fiscalnumber,
                        'investortaxaddress' => $result->tax_address1,
                        'investortaxpostal' => $result->tax_postal,
                        'investortaxcity' => $result->tax_city,
                        'investortin' => $result->tax_ustin,
                        'documenttype' => $this->CInvestorModel->getInvestorDocumentTypeName($result->documenttype),
                        'documentno' => $result->documentnumber,
                        'imgFront' => $result->filefrontpath.$result->filefrontname,
                        'imgBack' => $result->filebackpath.$result->filebackname,
                
                        'validationnotes' => $result->validationnotes,
                        'investorstatus' => (($result->investorstatus=="VAL")?"Y":"N"),
                
            );
      
        
         $data = $data+ $dataInvestor;
         
         $response = array('redirect' => '', 'status' => 'success', 'data' => $data);
         echo json_encode($response);
       
            
       } catch(SDException $e){
            $result = array('status' => 'error', 'msg' => $e->getMessage());
            return $result;
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
    }
    
    
    public function change_status(){
       $now = (new DateTime())->format('Y-m-d H:i:s');
       $cInvestorId = $this->input->post("objid");
       
       $description = $this->input->post("statusDescription");
       
       $status = "PEND" ;
       $now= null;
       if($this->input->post("investerStatus")){
         $status = "VAL" ;
         $now = (new DateTime())->format('Y-m-d H:i:s');
       }
       
       try {
            $investor =  $this->CInvestorModel->get($cInvestorId);  
             if(!$investor)
                throw new Exception ("Investor not Found");

            $investor->validationnotes = $description;
            $investor->status = $status;
            $investor->validateddate = $now;
            $this->CInvestorModel->save($investor, $this->session->session_admin['id']);
            $response = array('redirect' => '', 'status' => 'success');
            echo json_encode($response);
            
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
    }

}
