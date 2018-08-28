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
        if (!$cProject->c_project_id) {
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
        } else {
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
        foreach ($result as $project) {
            $list[] = CProject::build($project);
        }
        return $list;
    }

    //projecto unico by id  COMPANY
    function getById($id) {

        $this->db->select('c_project.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_project');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id', 'left');
        $this->db->where("c_project.c_project_id", $id);
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
            return $resultados->result_array();
        } else {
            return false;
        }
    }

    //todos projectos del usuario  COMPANY
    function getAllByCompany($id) {
        $this->db->select('c_project.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id', 'left');
        $this->db->where('c_projectmanager.c_user_id', $id);
        return $this->db->get();
    }

    //para el administrador cambiar
    function getAllByAdmin() {
        $this->db->select('c_project.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id', 'left');
        $this->db->where("c_project.projectstatus", "PEND");
        $this->db->or_where("c_project.projectstatus", "ERRDATA");
        return $this->db->get();
    }

    //para el administrador activos cambiar
    function getAllByAdminActive() {
        $this->db->select('c_project.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id', 'left');
        $this->db->where('c_project.projectstatus !=', 'PEND');
        $this->db->where('c_project.projectstatus !=', 'ERRDATA');
        return $this->db->get();
    }

    //para el Investor cambiar
    function getAllByInvestor() {
        $this->db->select('c_project.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id', 'left');
        $this->db->where('c_project.projectstatus !=', 'PEND');
        $this->db->where('c_project.projectstatus !=', 'ERRDATA');
        return $this->db->get();
    }

    //para el Investor cambiar
    function getAllByPublic() {
        $this->db->select('c_project.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id', 'left');
        $this->db->where('c_project.projectstatus !=', 'PEND');
        $this->db->where('c_project.projectstatus !=', 'ERRDATA');
        return $this->db->get();
    }
    
    //DASHBOARD ADMIN COMPANY
     public function getCountPendingProject($id=null) {

        $this->db->select("count(*) as countpending ");
        $this->db->from('c_project');
         $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');   
        if($id!=null)
            {$this->db->where('c_projectmanager.c_user_id', $id);}
        $this->db->where("projectstatus", "PEND");
        $this->db->or_where("projectstatus", "ERRDATA");
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->countpending;
    }
    //DASHBOARD ADMIN COMPANY
    public function getCountActiveProject($id=null) {

        $this->db->select("count(c_project_id) as countactive ");
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');   
        if($id!=null)
            {$this->db->where('c_projectmanager.c_user_id', $id);}
        
        $this->db->where("projectstatus", "FU");
        $this->db->or_where("projectstatus", "ACT");
        $this->db->or_where("projectstatus", "COFU");
        $this->db->or_where("projectstatus", "NCOFU");
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->countactive;
    }
    //DASHBOARD ADMIN COMPANY
     public function getCountFinishProject($id=null) {

        $this->db->select("count(c_project_id) as countfinish ");
        $this->db->from('c_project');
         $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');   
        if($id!=null)
            {$this->db->where('c_projectmanager.c_user_id', $id);}
         $this->db->where("projectstatus", "VO");
        $this->db->or_where("projectstatus", "FIN");
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->countfinish;
    
     }
     
      //DASHBOARD ADMIN  
     /*  function getThreeProrjectTop() {
        $this->db->select('c_project.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_project');
        $this->db->join('c_projectmanager', 'c_project.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_project.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_project.homeimage_id', 'left');
        $this->db->where("c_project.projectstatus!=", "PEND");
        $this->db->or_where("c_project.projectstatus!=", "ERRDATA");
        return $this->db->get();
    }*/
            

    

    function delete($id) {
        $this->db->where('c_project_id', $id);
        return $this->db->delete('c_project');
    }

    function change_status($status, $c_project_id) {
        $this->db->where('c_project_id', $c_project_id);
        $this->db->update('c_project', array('projectstatus' => $status));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getProjectStatusName($status) {
        log_message("ERROR", "ESTADO :" . $status);
        switch ($status) {
            case "PEND": return "Pending Evaluation";
            case "ERRDATA": return "Incomplete data";
            case "COFU": return "Funding Complete";
            case "NCOFU": return "Funding did not Complete";
            case "VO": return "Voided";
            case "ACT": return "Active";
            case "FI": return "Finished";
            case "FU": return "funding";
            default: break;
        }
        return "uknowkn";
    }

}

?>