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

        $this->load->model("CFileModel");
        $this->load->model("CProjectdocumenttypeModel");
        $this->load->model("CProjectdocumentModel");

        if (!$this->session->has_userdata("session_company")) {
            redirect(base_url() . 'login');
        }
    }

    public function index($c_project_id = null) {

        $all = $this->CProjectModel->getById($c_project_id);
        if ($c_project_id != null && $all) {

            $all[0]['datelimit'] = DateTime::createFromFormat('Y-m-d H:i:s', $all[0]['datelimit'])->format('Y-m-d');
            $all[0]['startdate'] = DateTime::createFromFormat('Y-m-d H:i:s', $all[0]['startdate'])->format('Y-m-d');
            $all[0]['description'] = preg_replace( "/\r|\n/", " ",str_replace("'", "\'", $all[0]['description']) );
            
            $data = array('action' => 'edit') + $all[0];
            $documents = $this->CProjectdocumenttypeModel->getAllByAdminByProjectId($c_project_id);
            $data = $data + array('docs' => $documents);
        } else {
            $data = array('action' => 'new');
            $documents = $this->CProjectdocumenttypeModel->getAllByAdmin();
            $data = $data + array('docs' => $documents);
        }

        //print_r($data);

        $this->load->view('header/header_admin');
        $this->load->view('company_edit_project', $data);
        $this->load->view('footer/footer_admin');
    }

    public function save($c_project_id = null) {
        try {
           
            $idfilephoto = $this->upload_Image();
            $obj = $this->saveValidate($c_project_id, $idfilephoto);
            $this->CProjectModel->save($obj, $this->session->session_company['id']);

            $this->upload_Docs($obj->c_project_id);

            $response = array('redirect' => base_url() . 'company_edit_project/' . $obj->c_project_id, 'status' => 'success', 'msg' => '', 'c_project_id' => $obj->c_project_id);
            echo json_encode($response);
            exit();
        } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }
    }

    private function saveValidate($c_project_id = null, $idphoto = null) {
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
        
        $tiposubmit = $this->input->post("tiposubmit");


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
            $all = $this->CProjectModel->getById($c_project_id);
            $new->c_project_id = $c_project_id;
            $new->isactive = $all[0]['isactive'];
            $new->projectstatus = $tiposubmit;
            $new->homeimage_id = $idphoto;
        } else {
            $new->c_project_id = null;
            $new->isactive = "Y";
            $new->projectstatus = $tiposubmit;
            $new->homeimage_id = $idphoto;
        }
        
       
        return $new;
    }

    public function upload_Image() {

        $path = "./upload/imgs/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $id = $this->input->post("idcfilephoto");

        $photo = $this->CFileModel->get($id);

        if ((!isset($_FILES['photo']['name']) || $_FILES['photo']['name'] == "" ) && $photo != null) {
            return $id;
        }

        if ($photo == null) {
            $photo = new CFile();
        }

        try {
            if ($this->upload->do_upload('photo')) {

                $dataF = array('upload_data' => $this->upload->data());
                $imgFromName = $dataF['upload_data']['file_name'];
                $photo->isactive = "Y";
                $photo->name = $imgFromName;
                $photo->path = $path;
                $photo->datatype = "IMG";
                $this->CFileModel->save($photo, $this->session->session_company['id']);

                $configr['image_library'] = 'gd2';
                $configr['source_image'] = $path . $imgFromName;
                $configr['create_thumb'] = false;
                $configr['maintain_ratio'] = false;
                $configr['width'] = 960;
                $configr['height'] = 640;

                $this->load->library('image_lib', $configr);
                $this->image_lib->resize();

                return $photo->c_file_id;
            } else {
                throw new SDException("Error Upload File " . $this->upload->display_errors());
            }
        } catch (Exception $e) {
            throw new SDException(" $id - " . $_FILES['photo']['name'] . " -" . $e->getMessage());
        }
    }

    public function upload_Docs($c_project_id) {

        $path = "./upload/docs/";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $documents = $this->CProjectdocumenttypeModel->getAllByAdmin();

        if(is_array($documents)) {
        foreach ($documents as $filesadmin) {
            try {
                $doc = $this->CProjectdocumentModel->getByProjectAndDocuemnt($c_project_id, $filesadmin['c_projectdocumenttype_id']);
                if ($doc == null) {
                    $doc = new CProjectdocument();
                    $doc->status = "PEND";
                    $doc->c_file_id = "0";
                }

                $filedoc = $this->CFileModel->get($doc->c_file_id);
                if ($filedoc == null) {
                    $filedoc = new CFile();
                }

                if (isset($_FILES[$filesadmin['c_projectdocumenttype_id']]['name']) && $this->upload->do_upload($filesadmin['c_projectdocumenttype_id'])) {

                    $dataF = array('upload_data' => $this->upload->data());
                    $imgFromName = $dataF['upload_data']['file_name'];
                    $filedoc->isactive = "Y";
                    $filedoc->name = $imgFromName;
                    $filedoc->path = $path;
                    $filedoc->datatype = "PDF";
                    $this->CFileModel->save($filedoc, $this->session->session_company['id']);

                    $doc->c_file_id = $filedoc->c_file_id;
                    $doc->c_project_id = $c_project_id;
                    $doc->c_projectdocumenttype_id = $filesadmin['c_projectdocumenttype_id'];
                    $doc->isactive = "Y";
                    $this->CProjectdocumentModel->save($doc, $this->session->session_company['id']);
                }
            } catch (Exception $e) {
                
            }
        }
   
         }
        
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

        $country_list = $this->CProjectmanagerModel->getAll($this->session->session_company['id']);

        $html = '<option value="">Choose a Project Manager</option>';
        foreach ($country_list as $country) {
           
            $html .= '<option value="' . $country->c_projectmanager_id . '">' . $country->paypalusername . '</option>';
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }

    public function get_currency_list() {

        $country_list = $this->CCurrencyModel->getAll();

        $html = '<option value="">Choose a Currency</option>';
        foreach ($country_list as $country) {
            if($country->cursymbol=='$')
            $html .= '<option  value="' . $country->c_currency_id . '">' . $country->cursymbol . '</option>';
        }
        $response = array('html' => $html);
        echo json_encode($response);
    }

}
