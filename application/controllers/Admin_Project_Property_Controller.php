<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Project_Property_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectdocumenttypeModel");
        $this->load->model("CPropertytypeModel");

        if (!$this->session->has_userdata("session_admin")) {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_project_propertytype');
        $this->load->view('footer/footer_admin');
    }

    public function get_items() {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->CPropertytypeModel->getAll();
        $data = [];
        foreach ($query as $propertytype) {
            $data[] = array(
                $propertytype->name,
                $propertytype->description,
                '<a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Edit" onclick="edit_property(' . "'" . $propertytype->c_propertytype_id . "'" . ')"><i class="icon wb-edit"></i></a>
		 <a class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" href="javascript:void(0)" title="Remove" onclick="delete_property(' . "'" . $propertytype->c_propertytype_id . "'" . ')"><i class="icon wb-trash"></i></a>'
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => count($query),
            "recordsFiltered" => count($query),
            "data" => $data
        );

        echo json_encode($result);
    }

    public function load_item() {
        $cPropertytypeId = $this->input->post("id");
        try {
            $propertytype = $this->CPropertytypeModel->get($cPropertytypeId);  
            if (!$propertytype) {
                throw new Exception("Property type not found.");
            }
 
            $data[] = array(
                "name" => $propertytype->name,
                "description" => $propertytype->description,
                "cpropertytypeid" => $propertytype->c_propertytype_id);

            $response = array('redirect' => '', 'status' => 'success', 'data' => $data);
            echo json_encode($response);
 
        } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }
    }

    public function add_propertytype() {
        $cPropertytypeId = $this->input->post("objid");
        $name = $this->input->post("name");
        $description = $this->input->post("description");
        try {
            if (strcmp($cPropertytypeId, "") == 0) {
                $propertytype = new CPropertytype();
            } else {
                $propertytype = $this->CPropertytypeModel->get($cPropertytypeId);
            }
            if (!$propertytype) {
                throw new Exception("Property type not found.");
            }    
            $propertytype->name = $name;
            $propertytype->description = $description;
            $propertytype->isactive = "Y";
            $this->CPropertytypeModel->save($propertytype, $this->session->session_admin['id']);
            
            $response = array('redirect' => '', 'status' => 'success');
            echo json_encode($response);
            
        } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }
    }

    public function delete_propertytype() {        
        $cPropertytypeId = $this->input->post("id");
        try {            
            $count_uses = $this->CPropertytypeModel->count_projecttype_uses($cPropertytypeId);
            if($count_uses > 0) {
                throw new Exception("Property type is in use.");
            }
            
            $this->CPropertytypeModel->delete($cPropertytypeId);
            $response = array('redirect' => '', 'status' => 'success');
            echo json_encode($response);
            
        } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }
    }

}
