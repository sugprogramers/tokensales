<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProjectDocumentTypeController extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectdocumenttype/CProjectdocumenttypeModel");
    }

    public function index() {
        //$this->load->view('admin/list_administrador');
        //
        //$this->load->view('welcome_message');
        //echo "index default";
    }
    
    public function listDataGrid(){
       if (!$this->session->userdata("login_admin")){
         redirect(base_url() . 'login');
       }
       
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
                $obj->getName(),
                $obj->getDescription(),               
                $obj->isMandatory(),
          
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Edit" onclick="edit_document('."'".$obj->getId()."'".')"><i class="icon wb-edit"></i></a>
		 <a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Remove" onclick="delete_document('."'".$obj->getId()."'".')"><i class="icon wb-trash"></i></a>'
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
       $obj = $this->CProjectdocumenttypeModel->get($cProjectDocId);  
       
       $data = [];
       if($obj)
         $data[] = array("name" => $obj->getName(),
                         "description" => $obj->getDescription(), 
                         "isMandatory" => $obj->isMandatory(),
                         "cprojectdocumenttypeid" => $obj->getId());
         
              
         $response = array('redirect' => '', 'status' => 'success', 'data' => $data);
         echo json_encode($response);
            
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
               $objDoc = new CProjectdocumenttypeModel();
            else
               $objDoc =  $this->CProjectdocumenttypeModel->get($cProjectDocId);  
               
            if(!$objDoc)
                throw new Exception ("Document not Found");

            $objDoc->setName($name);
            $objDoc->setDescription($description);
            $objDoc->setIsmandatory("Y");
            $objDoc->save();
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
