<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'application/libraries/SDException.php';

class Admin_List_Project_Active_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("CProjectModel");
        $this->load->model("CProjectdocumenttypeModel");
        $this->load->model("FINInvestmentModel");
        
        if (!$this->session->has_userdata("session_admin")) {
            redirect(base_url() . 'login');
        } 
    }

    public function index() {
        $this->load->view('header/header_admin');
        $this->load->view('admin_list_project_active');
        $this->load->view('footer/footer_admin');
    }

    public function get_project_list() {
        $query = $this->CProjectModel->getAllByAdminActive();
        $html = '';
        foreach ($query->result() as $r) {
             
          
            $html .= $this->get_htm_item($r->c_project_id, $r->name, $r->description, $r->companyname, 
                    $r->targetamt, $r->cursymbol, $r->namefile , $r->latitude ,$r->longitude , 
                    $r->totalyieldperc , $r->loanterm , $r->datelimit , $r->startdate , $r->projectstatus , $r->address1);
            //print_r($r); break;
        }
        //$html .= $this->get_htm_item_new();
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
    
    public function status_project($status , $c_project_id) {
        try {
            $this->CProjectModel->change_status($status ,$c_project_id);
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
             
             $findate =  DateTime::createFromFormat('Y-m-d H:i:s', $all[0]['datelimit']); $nowdate = new DateTime('now');  
             $diasrestantes = $findate->diff($nowdate)->days; 
             $sumamount = $this->FINInvestmentModel->getSumAmountByProject($id);
             $countinvesment = $this->FINInvestmentModel->getCountInvestorsByProject($id);        
             $percent = $this->get_percentage($all[0]['targetamt'], $sumamount);
             
             $all[0]['datelimit'] = DateTime::createFromFormat('Y-m-d H:i:s', $all[0]['datelimit'])->format('Y-m-d');
             $all[0]['startdate'] = DateTime::createFromFormat('Y-m-d H:i:s', $all[0]['startdate'])->format('Y-m-d');
             
             $response = $response + $all[0] + array('daysremaining' =>$diasrestantes ,    'sumamount' => $sumamount ,'countinvesment' => $countinvesment,'percent' => $percent );
             
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
          if(is_array($html)){
         foreach ($documents as $entry) {   
            if(isset($entry['namefile'])){
               $html .=   '<h5><i class="icon fa-file-pdf-o" aria-hidden="true"></i> '.ucfirst($entry['name']).'</h5><label class="control-label" ><a target="_blank" href="'. base_url().'upload/docs/'.$entry['namefile'].'">Preview Doc </a></label>';
            }
         }
          }
         if(trim($html)=='') $html='<h5>There are no documents</h5>';
         return $html;
    }
    
    private function get_percentage($total, $number)
    {
      if ( $total > 0 ) {
       return round($number / ($total / 100),2);
      } else {
        return 0;
      }
    }
    
    private function get_htm_item($c_project_id, $name, $description, $companyname, $targetamt, $cursymbol, $namefile ,$latitude , $longitude , $totalyieldperc , $loanterm , $datelimit , $startdate , $projectstatus, $address1) {

        $items = array('overlay-slide-left', 'overlay-slide-top', 'overlay-slide-right', 'overlay-slide-bottom');
        $class_animation = $items[array_rand($items)];

        if (isset($namefile) && trim($namefile) != '' && file_exists("upload/imgs/$namefile")) {
            $homeimage = base_url() . 'upload/imgs/' . $namefile;
        } else {
            $homeimage =  base_url() . 'themes/default/remark/topbar/assets/images/nophoto2.jpg';
        }
        
        $findate =  DateTime::createFromFormat('Y-m-d H:i:s', $datelimit);
        $nowdate = new DateTime('now');  
        
        $diastotales = $findate->diff($nowdate)->days;         
        
        $sumamount = $this->FINInvestmentModel->getSumAmountByProject($c_project_id);
        $countinvesment = $this->FINInvestmentModel->getCountInvestorsByProject($c_project_id);        
        $percent = $this->get_percentage($targetamt, $sumamount);
       
       $statushtml = $this->getHtmlProjectStatusName($projectstatus) ;   

return
'  
<li>
    <div class="media-item" >

        <div class="image-wrap"  data-toggle="slidePanel" data-url="' . base_url() . 'themes/default/tpl/admin_active_panel.tpl"  onclick="Mostrar(\''.$c_project_id.'\');">
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
                     <a class="dropdown-item" href="javascript:void(0)" onclick="Ubicacion(\''.$latitude.'\' , \''.$longitude.'\')"><i class="icon wb-map" aria-hidden="true" ></i>Location</a>
                    
           </div>
        </div> 
            

            <div class="title" style="color:#566573;"> <b>'.ucfirst($name) .'</b><br>'.ucfirst($companyname).'</div>
                
            <div class="sub-description-list">'. $this->truncate( htmlspecialchars(str_replace("&nbsp;", ' ',trim(strip_tags($description)))), 150) .'</div>


<div class="sub-detalle-property">

    <div  style="margin-top: 5px;margin-bottom: 5px;">
     '.$address1.'
    </div>

    <div class="row">
              <div class="col-sm-6">
              <b style="color:#566573;">'.$cursymbol.$sumamount.' <br>%'.$percent.' Raised </b>
              </div>
              <div class="col-sm-6 text-right">
              <b style="color:#566573;">'.$cursymbol.$targetamt.' <br>Funding Goal </b>
              </div>
    </div>   

    <div class="example" style="margin-top: 1px;margin-bottom: 1px;">
       <div class="asRange" data-plugin="asRange" data-namespace="rangeUi" style="width: 100%;margin: 0;" data-min="1" data-max="100" data-value="'.$percent.'"></div>
    </div>
   
    <div class="row" style="color:#566573;">
            <div class="col-sm-6">
            <b>'.$countinvesment.' Investors </b>
            </div>
            <div class="col-sm-6 text-right">
            <b>'.$diastotales.'  days remaining</b>
             </div>  
     </div>  
     

     
<div class="h-minificha__tir" style="padding: 5px 0;">
<center>'.$statushtml.'</center>
</div>

<div class="row  h-minificha__data__row" style="margin-top: 10px;">

    <div class="col-xs-6">
        <div class="h-minificha__data__value">
            <span class="h-minificha__data__value--number h-minificha--color-primary">
                '.$totalyieldperc.'<span class="">%</span>
            </span>
            <p class="h-minificha__data__value--description h-minificha--color-secondary">Projected Return</p>
        </div>
    </div>
    <div class="h-minificha__data__values__separator--line"></div>
    <div class="col-xs-6">
        <div class="h-minificha__data__value">
            <span class="h-minificha__data__value--number h-minificha--color-primary"> '.$loanterm.'<span class=""> months</span>
            </span>
            <p class="h-minificha__data__value--description h-minificha--color-secondary">Term</p>
        </div>
    </div>

</div>

<div class="h-minificha__tir" style="padding: 5px 0;">

</div>

<div class="h-minificha__button-bar">
          <button  type="submit" class="btn btn-primary btn-block"  data-toggle="slidePanel" data-url="' . base_url() . 'themes/default/tpl/admin_Active_panel.tpl"  onclick="Mostrar(\''.$c_project_id.'\');">PROJECT PREVIEW</button>
</div>


            </div>    
            <div class="media-item-actions btn-group" >
                
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

  private function getHtmlProjectStatusName($status) {
        switch ($status) {
            case "PEND": return '<span class="badge badge-outline badge-warning">Pending Evaluation</span>';
            case "ERRDATA": return '<span class="badge badge-outline badge-danger">Incomplete Data</span>';                
            case "FU": return '<span class="badge badge-outline badge-success">Funding</span>';    
            case "COFU": return '<span class="badge badge-outline badge-default">Funding Complete</span>';
            case "NCOFU": return '<span class="badge badge-outline badge-dark">Funding did not Complete</span>';
            case "VO": return '<span class="badge badge-outline badge-danger">Voided</span>';
            case "ACT": return '<span class="badge badge-outline badge-success">Active</span>';
            case "FI": return '<span class="badge badge-outline badge-primary">Finished</span>';
            default: break;
        }
        return "uknowkn";
    }


}
