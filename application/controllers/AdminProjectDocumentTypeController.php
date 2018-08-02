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
                $obj->isMandatory(),"HOla"
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

}
