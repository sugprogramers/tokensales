<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Dashboard_Controller extends CI_Controller {
            
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model("admin/Administrator_Model");
        
        if (!isset($this->session->id)){
            redirect(base_url() . 'login');
        }
        
        if($this->session->usertype !== "ADM"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {       
        $this->load->view('header/header_admin');
        $this->load->view('admin_dashboard');
        $this->load->view('footer/footer_admin');        
    }
    
    /*
    public function otrapagina_no_index() {
        $this->load->view('admin/list_administrador');
           //echo "index default";       
    }

    public function noparametro() {
        echo "sumaaaa";
    }

    public function parametro($s = 100) {
        echo "sumaaaa" . $s;
    }
    
    public function get_items()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->administrator_model->get_administrator();
      $data = [];
      foreach($query->result() as $r) {
           $data[] = array(
                $r->c_user_id,
                $r->email,
               '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$r->c_user_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$r->c_user_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
		
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
   }*/

}
