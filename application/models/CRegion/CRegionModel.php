<?php

class CRegionModel extends CI_Model
{
    private $c_region_id;
    private $isactive;
    private $created ;
    private $createdby ;
    private $updated ;
    private $updatedby ;
    private $name;
    private $description;
    private $c_country_id;
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        $query = $this->db->get_where("c_region", array('c_region_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }        
        $result = $queryresult[0];
        $this->c_region_id = $result->c_region_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->name = $result->name; 
        $this->description = $result->description; 
        $this->c_country_id = $result->c_country_id; 
        return $this;
    }
    
    public function getAll(){
       $query = $this->db->get_where("c_region", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $obj = new CRegionModel();
           $data[] = $obj->get($value->c_region_id);
       }
       return $data;
    }
    
    public function getRegionsByCountry($countryId){
       $query = $this->db->get_where("c_region", array('isactive' => 'Y', 'c_country_id' => $countryId));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $obj = new CRegionModel();
           $data[] = $obj->get($value->c_region_id);
       }
       return $data;
    }    
    
    function getId() {
        return $this->c_region_id;
    }
    
    function getIsactive() {
        return $this->isactive;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getCCountry() {
        $obj = new CCountryModel();
        return $obj->get($this->c_country_id);
    }

    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setC_country_id($c_country_id) {
        $this->c_country_id = $c_country_id;
    }

    function save(){
        $data = array(
            'c_region_id' => $this->c_region_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'name' => $this->name,
            'description' => $this->description,
            'c_country_id' => $this->c_country_id
        );
        $this->db->where('c_region_id', $this->c_region_id);
        return $this->db->update('c_region', $data);
    }  

}
