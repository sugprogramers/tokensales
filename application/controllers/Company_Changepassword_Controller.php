<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Company_Changepassword_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CUserModel");
        
        if($this->session->usertype !== "COMPMAN"){
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('company_changepassword');
        $this->load->view('footer/footer_admin');
    }
    
    public function changePassword(){
        
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
                        
            /* @var $user CUser */
            $user = $this->CUserModel->get($this->session->id);
            if(!$user){
                throw new SDException('User does not exists');
            }
            
            $user->password = $password;
            $this->CUserModel->save($user, $this->session->id);
           


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
