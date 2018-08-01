<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CCurrencyModel extends CI_Model {
    
    private $c_currency_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $iso_code;
    private $cursymbol;
    private $description;
    private $stdprecision;    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_currency", array('c_currency_id' => $id));
        $result = $query->result()[0];
        
        $this->c_currency_id = $result->c_currency_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->iso_code = $result->iso_code;
        $this->cursymbol = $result->cursymbol;
        $this->description = $result->description;
        $this->stdprecision = $result->stdprecision; 
        
        return $this;
    }

    public function getId() {
        return $this->c_currency_id;
    }

    public function isActive() {
        return $this->isactive;
    }   

    public function getCreated() {
        return $this->created;
    }

    public function getCreatedBy() {
        return $this->createdby;
    }

    public function getUpdated() {
        return $this->updated;
    }    
    public function getUpdatedBy() {
        return $this->updatedby;
    }

    public function getIsoCode() {
        return $this->iso_code;
    }
    
    public function getCursymbol() {
        return $this->cursymbol;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function getStdprecision() {
        return $this->stdprecision;
    }    

    function setCCurrencyId($c_currency_id) {
        $this->c_currency_id = $c_currency_id;
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

    function setIsoCode($iso_code) {
        $this->iso_code = $iso_code;
    }
    
    function setCursymbol($cursymbol) {
        $this->cursymbol = $cursymbol;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setStdprecision($stdprecision) {
        $this->stdprecision = $stdprecision;
    }
    
    function save() {
        $data = array(
            'c_currency_id' => $this->c_currency_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'iso_code' => $this->iso_code,
            'cursymbol' => $this->cursymbol,
            'description' => $this->description,
            'stdprecision' => $this->stdprecision
        );
        
        $this->db->where('c_currency_id', $this->c_currency_id);
        return $this->db->update('c_currency', $data);
    }    
    
}

?>