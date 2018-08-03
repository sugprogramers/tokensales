<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class User_Changepassword_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUser/CUserModel");
    }

    public function index() {
        if (!$this->session->userdata("login_admin")) {
            redirect(base_url() . 'login');
        }
        $this->load->view('header/header_admin');
        $this->load->view('user_changepassword');
        $this->load->view('footer/footer_admin');
    }
    
    public function changePassword(){
        if (!$this->session->userdata("login_admin") || !$this->session->userdata("id")) {
            redirect(base_url() . 'login');
        }
        
        try{
            $password = $this->input->post('password');
            $passwordRepeat = $this->input->post('passwordRepeat');

            if(empty($password) || empty($passwordRepeat)){
                throw new SDException('missingFields');
            }
            else if(strcmp($password, $passwordRepeat) != 0){
                throw new SDException('passwordMismatch');
            }
            else if(preg_match_all('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\@\#\$\!\¡\¿\?\*\(\)\%\^\&\+\=])\S*$/', $password) != 1){
                throw new SDException('malformedPassword');
            }
            
            $c_user_id = $this->session->userdata("id");
            CUser $user = $this->CUserModel->get($c_user_id);
            log_message('error', $user->password);
 
           


            $response = array('status' => 'success', 'msg' => 'Success');
            echo json_encode($response);
        
        }
        catch(SDException $e){
            $response = array('status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }        
        catch(Exception $e){
            $response = array('status' => 'error', 'msg' => 'InternalError');
            echo json_encode($response);
        }
    }

}
