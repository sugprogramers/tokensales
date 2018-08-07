<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CRegion.php";

class CRegionModel extends CI_Model
{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        $query = $this->db->order_by("description", "asc")->get_where("c_region", array('c_region_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];
        return CRegion::build($result);
    }
    
    public function save($cRegion, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cRegion->c_region_id){
            $cRegion->c_region_id = UUID::getRawUUID();
            $data = array(
                'c_region_id' => $cRegion->c_region_id,
                'isactive' => $cRegion->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cRegion->name,
                'description' => $cRegion->description,
                'c_country_id' => $cRegion->c_country_id
            );
            return $this->db->insert('c_region', $data);
        }
        else{
            $data = array(
                'isactive' => $cRegion->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cRegion->name,
                'description' => $cRegion->description,
                'c_country_id' => $cRegion->c_country_id
            );
            $this->db->where('c_region_id', $cRegion->c_region_id);
            return $this->db->update('c_region', $data);
        }
    } 
    
    public function getAll(){
       $query = $this->db->get_where("c_region", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $data[] = CRegion::build($value);
       }
       return $data;
    } 
    
    public function getRegionsByCountry($countryId){
       $query = $this->db->get_where("c_region", array('isactive' => 'Y', 'c_country_id' => $countryId));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $data[] = $this->get($value->c_region_id);
       }
       return $data;
    }

}
