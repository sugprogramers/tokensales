<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProjectDocumentTypeController extends CI_Controller {
        
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectdocumenttypeModel");
        
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        //$this->load->view('admin/list_administrador');
        //
        //$this->load->view('welcome_message');
        //echo "index default";
    }
    
    public function listDataGrid(){

       
       $this->load->view('header/header_admin');
       $this->load->view('projectdocumenttype/list_projectdocumenttype');
       $this->load->view('footer/footer_admin');
       
    }

    public function get_items(){
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->CProjectdocumenttypeModel->getAll();
      $data = [];
      
      foreach ($query as $obj) {
           $data[] = array(
                $obj->name,
                $obj->description,               
                $obj->ismandatory,
          
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Edit" onclick="edit_document('."'".$obj->c_projectdocumenttype_id."'".')"><i class="icon wb-edit"></i></a>
		 <a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Remove" onclick="delete_document('."'".$obj->c_projectdocumenttype_id."'".')"><i class="icon wb-trash"></i></a>'
           );
      }
      
      $result = array(
                 "draw" => $draw,
                 "recordsTotal" => count($query),
                 "recordsFiltered" => count($query),
                 "data" => $data
            );

      echo json_encode($result);
     
      
      exit();
   }
   
   
   public function get_itemById() {
       
       $cProjectDocId = $this->input->post("id");
       try{ 
       $cProjectDoc = $this->CProjectdocumenttypeModel->get($cProjectDocId);  
       
       $data = [];
       if($cProjectDoc){
         $data[] = array("name" => $cProjectDoc->name,
                         "description" => $cProjectDoc->description, 
                         "isMandatory" => $cProjectDoc->ismandatory,
                         "cprojectdocumenttypeid" => $cProjectDoc->c_projectdocumenttype_id);
         
              
         $response = array('redirect' => '', 'status' => 'success', 'data' => $data);
         echo json_encode($response);
       }
            
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
             
    }
   
   
   
   
   public function register_document() {
 
       $cProjectDocId = $this->input->post("objid");
       $name = $this->input->post("name");
       $description = $this->input->post("description");
       $isMandatory = $this->input->post("isMandatory");
       
       try {
            if(strcmp($cProjectDocId,"")==0)
               $objDoc = new CProjectdocumenttype();
            else
               $objDoc =  $this->CProjectdocumenttypeModel->get($cProjectDocId);  
               
            if(!$objDoc)
                throw new Exception ("Document not Found");

            $objDoc->name = $name;
            $objDoc->description = $description;
            $objDoc->ismandatory = "Y";
            $objDoc->isactive = "Y";
            $this->CProjectdocumenttypeModel->save($objDoc, $this->session->id);
            $response = array('redirect' => '', 'status' => 'success');
            echo json_encode($response);
            
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
             
    }
    
    
    public function delete_document() {
       $cProjectDocId = $this->input->post("id");
       try {
            $this->CProjectdocumenttypeModel->delete($cProjectDocId);  
            $response = array('redirect' => '', 'status' => 'success');
            echo json_encode($response);
       } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
       }
    }
   
   
   
   

}
