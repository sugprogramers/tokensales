<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

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
        $this->load->model("admin/administrator_model");
    }

    public function index() {
        //$this->load->view('admin/list_administrador');
        //$this->load->view('welcome_message');
        //echo "index default";
        $this->load->view('header/header_admin');
        $this->load->view('admin/dashboard_administrador');
        $this->load->view('footer/footer_admin');
    }
    
    public function dashboard() {
        
        
       
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
                $r->IdAdministrator,
                $r->Email,
               '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$r->IdAdministrator."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$r->IdAdministrator."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
		
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

}
