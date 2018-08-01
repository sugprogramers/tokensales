<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
       
    }

    public function index() {
        $this->load->view('header/header_login');
        $this->load->view('login');        
        $this->load->view('footer/footer_login');
		
		
        /*$this->load->database();
        $query = $this->db->get("c_country");
        
         foreach($query->result() as $r) {
             echo $r->countrycode;
             break;
         }*/
    }

}
