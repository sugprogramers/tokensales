<?php
include "application/libraries/UUID.php";
include "application/entities/CCompany.php";

class CCompanyModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_company", array('c_company_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];
        return CCompany::build($result);
    }
            
    public function save($cCompany, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cCompany->c_company_id){
            $cCompany->c_company_id = UUID::getRawUUID();
            $data = array(
                'c_company_id' => $cCompany->c_company_id,
                'isactive' => $cCompany->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cCompany->c_user_id,
                'name' => $cCompany->name,
                'description' => $cCompany->description,
                'url' => $cCompany->url,
                'taxid' => $cCompany->taxid,
                'address1' => $cCompany->address1,
                'address2' => $cCompany->address2,
                'c_country_id' => $cCompany->c_country_id,
                'c_region_id' => $cCompany->c_region_id,
                'city' => $cCompany->city,
                'postal' => $cCompany->postal
            );
            return $this->db->insert('c_company', $data);
        }
        else{
            $data = array(
                'isactive' => $cCompany->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cCompany->c_user_id,
                'name' => $cCompany->name,
                'description' => $cCompany->description,
                'url' => $cCompany->url,
                'taxid' => $cCompany->taxid,
                'address1' => $cCompany->address1,
                'address2' => $cCompany->address2,
                'c_country_id' => $cCompany->c_country_id,
                'c_region_id' => $cCompany->c_region_id,
                'city' => $cCompany->city,
                'postal' => $cCompany->postal
            );
        
            $this->db->where('c_company_id', $cCompany->c_company_id);
            return $this->db->update('c_company', $data);   
        }
    }

    public function getAll() {               
        $query = $this->db->get_where("c_company", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $company) {
            $list[] = CCompany::build($company);
        }
        return $list;
    }    
    
}

?>