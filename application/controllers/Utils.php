<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');    
    }
    
    static public function format_number($number , $decimals=0){
        $number = number_format($number, $decimals, '.', ',');    
        return $number;
    }    
}
