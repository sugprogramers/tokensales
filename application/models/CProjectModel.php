<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CProject.php";

class CProjectModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_project", array('c_project_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];     
        return CProject::build($result);
    }

    public function save($cProject, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cProject->c_project_id){
            $cProject->c_project_id = UUID::getRawUUID();
            $data = array(
                'c_project_id' => $cProject->c_project_id,
                'isactive' => $cProject->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cProject->name,
                'c_projectmanager_id' => $cProject->c_projectmanager_id,
                'companyname' => $cProject->companyname,
                'c_currency_id' => $cProject->c_currency_id,
                'c_projecttype_id' => $cProject->c_projecttype_id,
                'projectstatus' => $cProject->projectstatus,
                'propertytype' => $cProject->propertytype,
                'qtyproperty' => $cProject->qtyproperty,
                'address1' => $cProject->address1,
                'c_country_id' => $cProject->c_country_id,
                'c_region_id' => $cProject->c_region_id,
                'city' => $cProject->city,
                'totalyieldperc' => $cProject->totalyieldperc,
                'loanterm' => $cProject->loanterm,
                'datelimit' => $cProject->datelimit,
                'targetamt' => $cProject->targetamt,
                'startdate' => $cProject->startdate,
                'homeimage_id' => $cProject->homeimage_id,
                'description' => $cProject->description,
                'latitude' => $cProject->latitude,
                'longitude' => $cProject->longitude
            );
            return $this->db->insert('c_project', $data);
        }
        else{
            $data = array(
                'isactive' => $cProject->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cProject->name,
                'c_projectmanager_id' => $cProject->c_projectmanager_id,
                'companyname' => $cProject->companyname,
                'c_currency_id' => $cProject->c_currency_id,
                'c_projecttype_id' => $cProject->c_projecttype_id,
                'projectstatus' => $cProject->projectstatus,
                'propertytype' => $cProject->propertytype,
                'qtyproperty' => $cProject->qtyproperty,
                'address1' => $cProject->address1,
                'c_country_id' => $cProject->c_country_id,
                'c_region_id' => $cProject->c_region_id,
                'city' => $cProject->city,
                'totalyieldperc' => $cProject->totalyieldperc,
                'loanterm' => $cProject->loanterm,
                'datelimit' => $cProject->datelimit,
                'targetamt' => $cProject->targetamt,
                'startdate' => $cProject->startdate,
                'homeimage_id' => $cProject->homeimage_id,
                'description' => $cProject->description,
                'latitude' => $cProject->latitude,
                'longitude' => $cProject->longitude
            );

            $this->db->where('c_project_id', $cProject->c_project_id);
            return $this->db->update('c_project', $data);
        }
    }    

    public function getAll() {               
        $query = $this->db->get_where("c_project", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $project) {
            $list[] = CProject::build($project);
        }
        return $list;
    }
    
    
    function getById($id) {
        
        $this->db->select('c_project.* , c_file.name as namefile'); 
        $this->db->from('c_project');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id' ,'left');
        $this->db->where("c_project.c_project_id", $id);   
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
            return $resultados->result_array();
        } else {
            return false;
        }
    }
    function getAllByCompany($id) {
        $this->db->select('c_project.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');         
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id' ,'left');
        $this->db->where('c_projectmanager.c_user_id',$id);
        return  $this->db->get();        
    }
    
    function delete($id){
        $this->db->where('c_project_id', $id);
        return $this->db->delete('c_project');
    }

    public function getProjectStatusName($status){
        log_message("ERROR","ESTADO :". $status);
        switch ($status) {
            case "PEND": return "Pending Evaluation";
            case "COFU": return "Funding Complete";
            case "NCOFU": return "Funding did not Complete";
            case "VO": return "Voided";
            case "ACT": return "Active";
            case "FI": return "Finished";
            default: break;
        }
        return "uknowkn";
    }
    
}

?>