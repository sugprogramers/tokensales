<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CCountryModel extends CI_Model {
    
    private $c_country_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $name;
    private $description;
    private $countrycode;    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_country", array('c_country_id' => $id));
        $result = $query->result()[0];
        
        $this->c_country_id = $result->c_country_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->name = $result->name;
        $this->description = $result->description;
        $this->countrycode = $result->countrycode; 
        
        return $this;
    }
    
    public function getAll() {               
        $query = $this->db->get_where("c_country", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $country) {
            $obj = new CCountryModel();
            $list[] = $obj->get($country->c_country_id);
        }
        return $list;
    }    

    function getId() {
        return $this->c_country_id;
    }

    function getIsactive() {
        return $this->isactive;
    }

    function getCreated() {
        return $this->created;
    }

    function getCreatedby() {
        return $this->createdby;
    }

    function getUpdated() {
        return $this->updated;
    }

    function getUpdatedby() {
        return $this->updatedby;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getCountrycode() {
        return $this->countrycode;
    }

    function setId($c_country_id) {
        $this->c_country_id = $c_country_id;
    }

    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }

    function setCreated($created) {
        $this->created = $created;
    }

    function setCreatedby($createdby) {
        $this->createdby = $createdby;
    }

    function setUpdated($updated) {
        $this->updated = $updated;
    }

    function setUpdatedby($updatedby) {
        $this->updatedby = $updatedby;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setCountrycode($countrycode) {
        $this->countrycode = $countrycode;
    }    
    
    function save() {
        $data = array(
            'c_country_id' => $this->c_country_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'name' => $this->name,
            'description' => $this->description,
            'countrycode' => $this->countrycode
        );
        
        $this->db->where('c_country_id', $this->c_country_id);
        return $this->db->update('c_country', $data);
    }    
    
}

?>