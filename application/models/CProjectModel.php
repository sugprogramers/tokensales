<?php
include "application/libraries/UUID.php";
include "application/entities/CProject.php";

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
                'c_user_id' => $cProject->c_user_id,
                'c_company_id' => $cProject->c_company_id,
                'c_currency_id' => $cProject->c_currency_id,
                'datecontract' => $cProject->datecontract,
                'startdate' => $cProject->startdate,
                'datefinish' => $cProject->datefinish,
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
                'targetamt' => $cProject->targetamt,
                'payin_paypalusername' => $cProject->payin_paypalusername,
                'homeimage_id' => $cProject->homeimage_id,
                'description' => $cProject->description
            );
            return $this->db->insert('c_project', $data);
        }
        else{
            $data = array(
                'isactive' => $cProject->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cProject->name,
                'c_user_id' => $cProject->c_user_id,
                'c_company_id' => $cProject->c_company_id,
                'c_currency_id' => $cProject->c_currency_id,
                'datecontract' => $cProject->datecontract,
                'startdate' => $cProject->startdate,
                'datefinish' => $cProject->datefinish,
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
                'targetamt' => $cProject->targetamt,
                'payin_paypalusername' => $cProject->payin_paypalusername,
                'homeimage_id' => $cProject->homeimage_id,
                'description' => $cProject->description
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
    
}

?>