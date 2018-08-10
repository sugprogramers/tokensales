<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';


class Company_Edit_Project_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CCountryModel");
        $this->load->model("CRegionModel");
        $this->load->model("CProjecttypeModel");
        $this->load->model("CProjectmanagerModel");        
        $this->load->model("CCurrencyModel");

        if ($this->session->usertype !== "COMPMAN") {
            redirect(base_url() . 'login');
        }
    }

    public function index($c_project_id = null) {
        $data = array('action' => 'new');
        $all = $this->CProjectModel->getById($c_project_id);
        if ($c_project_id != null && $all) {
            $data = array('action' => 'edit') + $all;
        }
        $this->load->view('header/header_admin');
        $this->load->view('company_edit_project', $data);
        $this->load->view('footer/footer_admin');
    }

    public function save($c_project_id = null) {
        try {
            $obj = $this->saveValidate($c_project_id);
            $this->CProjectModel->save($obj, $this->session->id);
            
            $response = array('redirect' =>  base_url() . 'company_edit_project/'.$obj->c_project_id, 'status' => 'success','msg' =>'');
            echo json_encode($response);
            exit();
        } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }
    }

    private function saveValidate($c_project_id = null) {
        $nameproject = $this->input->post("nameproject");
        $companyname = $this->input->post("companyname");
        $propertytype = $this->input->post("propertytype");
        $latitude = $this->input->post("latitude");
        $longitude = $this->input->post("longitude");
        $address = $this->input->post("address");
        $country = $this->input->post("country");
        $region = $this->input->post("region");
        $city = $this->input->post("city");        
        $cprojecttype = $this->input->post("cprojecttype");
        $cprojectmanager = $this->input->post("cprojectmanager");        
        $description = $this->input->post("description");
        $months = $this->input->post("months");
        $yield = $this->input->post("yield");
        $financial = $this->input->post("financial");
        $limit = $this->input->post("limit");
        $start = $this->input->post("start");
        $currency = $this->input->post("currency");
        $qtyproperty = $this->input->post("qtyproperty");

         //throw new SDException($cprojectmanager);
        if (!isset($nameproject) || trim($nameproject) == '') {
            throw new SDException("Invalid Project Name");
        }

        $new = new CProject();
        $new->name = $nameproject;
        $new->companyname = $companyname;
        $new->propertytype = $propertytype;
        $new->latitude = $latitude;
        $new->longitude = $longitude;
        $new->address1 = $address;
        $new->c_country_id = $country;
        $new->c_region_id = $region;
        $new->city = $city;
        $new->c_projecttype_id = $cprojecttype;
        $new->c_projectmanager_id = $cprojectmanager;
        $new->description = $description;
        $new->totalyieldperc = $yield;
        $new->loanterm = $months;
        $new->datelimit = (new DateTime($limit))->format('Y-m-d H:i:s');
        $new->targetamt = $financial;
        $new->startdate = (new DateTime($start))->format('Y-m-d H:i:s');
        $new->c_currency_id = $currency;
        $new->qtyproperty = $qtyproperty;
        if ($c_project_id != null) {
            $new->c_project_id = $c_project_id;
        } else {
            $new->isactive = "Y";
            $new->projectstatus = "PEND";
        }


        return $new;
    }

    public function get_country_list() {
        $countryId = "100"; // ee.uu.
        if ($this->input->post("countryId") !== NULL) {
            $countryId = $this->input->post("countryId");
        }


        $country_list = $this->CCountryModel->getAll();

        $html = '<option value="">Choose a Country</option>';
        foreach ($country_list as $country) {
            if ($country->c_country_id == $countryId) {
                $html .= '<option value="' . $country->c_country_id . '" selected>' . $country->name . '</option>';
            } else {
                $html .= '<option value="' . $country->c_country_id . '">' . $country->name . '</option>';
            }
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }

    public function get_region_list() {
        $countryId = $this->input->post("countryId");
        $regionId = "";
        if ($this->input->post("regionId") !== NULL) {
            $regionId = $this->input->post("regionId");
        }
        $region_list = $this->CRegionModel->getRegionsByCountry($countryId);

        $html = '<option value="">Choose a Region</option>';
        foreach ($region_list as $region) {
            if ($region->c_region_id == $regionId) {
                $html .= '<option value="' . $region->c_region_id . '" selected>' . $region->description . '</option>';
            } else {
                $html .= '<option value="' . $region->c_region_id . '">' . $region->description . '</option>';
            }
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }

    public function get_cprojecttype_list() {

        $country_list = $this->CProjecttypeModel->getAll();

        $html = '<option value="">Choose a Project Type</option>';
        foreach ($country_list as $country) {
            $html .= '<option value="' . $country->c_projecttype_id . '">' . $country->name . '</option>';
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }
    
    public function get_cprojectmanager_list() {

        $country_list = $this->CProjectmanagerModel->getAll();

        $html = '<option value="">Choose a Project Manager</option>';
        foreach ($country_list as $country) {
            $html .= '<option value="' . $country->c_projectmanager_id . '">' . $country->paypalusername. '</option>';
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }  
    
    

    public function get_currency_list() {

        $country_list = $this->CCurrencyModel->getAll();

        $html = '<option value="">Choose a Currency</option>';
        foreach ($country_list as $country) {
            $html .= '<option value="' . $country->c_currency_id . '">' . $country->cursymbol . '</option>';
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }

}
