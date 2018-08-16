<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Company_List_Project_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CProjectdocumenttypeModel");
        
        if ($this->session->usertype !== "COMPMAN") {
            redirect(base_url() . 'login');
        }
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('company_list_project');
        $this->load->view('footer/footer_admin');
    }

    public function get_project_list() {
        $query = $this->CProjectModel->getAllByCompany($this->session->id);
        $html = '';
        foreach ($query->result() as $r) {
            $html .= $this->get_htm_item($r->c_project_id, $r->name, $r->description, $r->companyname, $r->targetamt, $r->cursymbol, $r->namefile , $r->latitude ,$r->longitude);
            //print_r($r); break;
        }
        $html .= $this->get_htm_item_new();
        $response = array('html' => $html);
        echo json_encode($response);
    }

    public function delete_project($id) {
        try {
            $this->CProjectModel->delete($id);
            $response = array('redirect' => '', 'status' => 'success');
            echo json_encode($response);
        } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }
    }

    public function get_project($id) {
        try {
            
            $all = $this->CProjectModel->getById($id);
            if($all){
             
             $response = array('redirect' => '', 'status' => 'success');
             
             $all[0]['datelimit'] = DateTime::createFromFormat('Y-m-d H:i:s', $all[0]['datelimit'])->format('Y-m-d');
             $all[0]['startdate'] = DateTime::createFromFormat('Y-m-d H:i:s', $all[0]['startdate'])->format('Y-m-d');
             $response = $response + $all[0];
             $documents = $this->CProjectdocumenttypeModel->getAllByAdminByProjectId($id);
             $response = $response + array('docs' => $this->get_htm_docs($documents));
             
              echo json_encode($response);
            }
            else{
             $response = array('redirect' => '', 'status' => 'error', 'msg' => 'invalid project');
              
             echo json_encode($response);
            }
            
        } catch (Exception $e) {
            $response = array('redirect' => '', 'status' => 'error', 'msg' => $e->getMessage());
            echo json_encode($response);
        }
    }
    
    private function get_htm_docs($documents){
         $html = '';
         foreach ($documents as $entry) {   
            if(isset($entry['namefile'])){
               $html .=   '<h4>'.ucfirst($entry['name']).'</h4><label class="control-label" ><a target="_blank" href="'. base_url().'upload/docs/'.$entry['namefile'].'">Preview Doc <i class="icon wb-link" aria-hidden="true"></i></a></label>';
            }
         }
         if(trim($html)=='') $html='<h4>There are no documents</h4>';
         return $html;
    }
    
    
    private function get_htm_item($c_project_id, $name, $description, $companyname, $targetamt, $cursymbol, $namefile ,$latitude , $longitude) {

        $items = array('overlay-slide-left', 'overlay-slide-top', 'overlay-slide-right', 'overlay-slide-bottom');
        $class_animation = $items[array_rand($items)];

        if (isset($namefile) && trim($namefile) != '' && file_exists("upload/imgs/$namefile")) {
            $homeimage = base_url() . 'upload/imgs/' . $namefile;
        } else {
            $homeimage =  base_url() . 'themes/default/remark/topbar/assets/images/nophoto2.jpg';
        }
       

return
'  
<li>
    <div class="media-item" >

        <div class="image-wrap"  data-toggle="slidePanel" data-url="' . base_url() . 'themes/default/tpl/panel.tpl"  onclick="Mostrar(\''.$c_project_id.'\');">
            <figure class="overlay overlay-hover">
                <img class="overlay-figure" src="' . $homeimage . '" alt="...">
                <figcaption class="overlay-panel overlay-background '.$class_animation.' ">

                    <div class="img-text-hover">
                        <h4>' . $this->truncate($name, 30) . '</h4>
                        <p>' . $this->truncate( htmlspecialchars(str_replace("&nbsp;", ' ',trim(strip_tags($description)))), 380) . '</p>

                    </div>

                </figcaption>
            </figure>
        </div>
        <div class="info-wrap">
            <div class="dropdown">
                <span class="icon wb-settings" data-toggle="dropdown" aria-expanded="false" role="button"
                      data-animations="fadeInDown fadeInLeft fadeInUp fadeInRight"  ></span>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="Editar(\''.$c_project_id.'\')"><i class="icon wb-pencil" aria-hidden="true"></i>Edit</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="Eliminar(\''.$c_project_id.'\')"><i class="icon wb-trash" aria-hidden="true" ></i>Delete</a>
                    <a class="dropdown-item" href="javascript:void(0)" onclick="Ubicacion(\''.$latitude.'\' , \''.$longitude.'\')"><i class="icon wb-map" aria-hidden="true" ></i>Location</a>
                    
           </div>
            </div> 
            <div class="title">'.$companyname.'</div>
            <div class="time">'.$cursymbol.$targetamt.'</div>
            <div class="sub-detalle-property">
            <div class="example ">
            
                  <div class="asRange" data-plugin="asRange" data-namespace="rangeUi" style="width: 100%;margin: 0;" data-min="1" data-max="100" data-value="'.rand(10, 100).'"></div>
            
            </div>
            </div>    
            <div class="media-item-actions btn-group" >
                <button class="btn btn-icon btn-pure btn-default" data-original-title="Edit" data-toggle="tooltip"
                        data-container="body" data-placement="top" data-trigger="hover"
                        type="button"  onclick="Editar(\''.$c_project_id.'\')">
                    <i class="icon wb-pencil" aria-hidden="true"></i>
                </button>
                <button class="btn btn-icon btn-pure btn-default" data-original-title="Delete"
                        data-toggle="tooltip" data-container="body" data-placement="top"
                        data-trigger="hover" type="button" onclick="Eliminar(\''.$c_project_id.'\')">
                    <i class="icon wb-trash" aria-hidden="true"></i>
                 <button class="btn btn-icon btn-pure btn-default" data-original-title="Delete"
                        data-toggle="tooltip" data-container="body" data-placement="top"
                        data-trigger="hover" type="button" onclick="Ubicacion(\''.$latitude.'\' , \''.$longitude.'\')">
                    <i class="icon wb-map" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</li>
'
;
}

private function get_htm_item_new() {
return
' 
<li onclick="window.location.href = \''.base_url().'company_edit_project\';">
    <div class="media-item" >
        <div class="image-wrap" style="background: #e4eaec;" >
            <img class="overlay-figure" src="' . base_url() . 'themes/default/remark/topbar/assets/images/new-project.png" alt="...">
        </div>
        <div class="info-wrap">
            <div class="title">Add New Project</div>
            <div class="time">You must create a new project , click here</div>
        </div>
    </div>
</li>   
';
}

private function truncate($string, $length, $dots = "...") {
return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
}

}
