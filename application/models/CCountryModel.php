<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CCountry.php";

class CCountryModel extends CI_Model {
    
   
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }   
    
    public function get($id) {
        $query = $this->db->order_by("name", "asc")->get_where("c_country", array('c_country_id' => $id)); 
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }    
        
        $result = $queryresult[0];
        return CCountry::build($result);
    }
    
    public function save($cCountry, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cCountry->c_country_id){
            $cCountry->c_country_id = UUID::getRawUUID();
            $data = array(
                'c_country_id' => $cCountry->c_country_id,
                'isactive' => $cCountry->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cCountry->name,
                'description' => $cCountry->description,
                'countrycode' => $cCountry->countrycode
            );
            return $this->db->insert('c_country', $data);
        }
        else{
            $data = array(
                'isactive' => $cCountry->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cCountry->name,
                'description' => $cCountry->description,
                'countrycode' => $cCountry->countrycode
            );

            $this->db->where('c_country_id', $cCountry->c_country_id);
            return $this->db->update('c_country', $data);            
        }

    }
    
    public function getAll() {               
        $query = $this->db->get_where("c_country", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $country) {
            $list[] = CCountry::build($country);
        }
        return $list;
    }    
    
}

?>