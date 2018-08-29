<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_List_Company_Controller extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        $this->load->model("CProjectmanagerModel");
        
        if (!$this->session->has_userdata("session_admin")) {
            redirect(base_url() . 'login');
        } 
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_list_company');
        $this->load->view('footer/footer_admin');
    }
    
    
    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->CUserModel->get_all_company();
        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Log In" onclick="loginCompany('."'".$r->c_user_id."'".')"><i class="icon fa-sign-in" ></i></a>',
                $r->email,
                $r->password,
                $r->firstname,
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="more info" onclick="view_document('."'".$r->c_user_id."'".')"><i class="icon wb-search"></i></a>'
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
    
    
    public function get_company_detail(){
       
      $userId = $this->input->post("id");
      
      try{ 
          
        $query = $this->CProjectmanagerModel->get_manager_infoByUserId($userId);
        
       $data = [];
       if($query){
         $data[] = array("cmpcountry" => $query->countryname,
                         "cmpregion" => $query->regionname, 
                         "cmpaddress" => $query->address,
                         "cmppostalcode" => $query->postal,
                         "cmpphone" => $query->phone,
                         "cmpname" => $query->companyname,
                         "cmppaypal" => $query->companypaypal,
                         );
              
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


}
