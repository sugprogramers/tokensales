<?php

class CProjectdocumenttypeModel extends CI_Model
{
    private $c_projectdocumenttype_id;
    private $isactive;
    private $created ;
    private $createdby ;
    private $updated ;
    private $updatedby ;
    private $name;
    private $description;
    private $ismandatory;
    
     public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    
     
    public function get($id) {
       $query = $this->db->get_where("c_projectdocumenttype", array('c_projectdocumenttype_id' => $id));
       $result = $query->result()[0];
       $this->c_projectdocumenttype_id = $result->c_projectdocumenttype_id;
       $this->isactive = $result->isactive;
       $this->created = $result->created;
       $this->createdby = $result->createdby;
       $this->updated = $result->updated;
       $this->updatedby = $result->updatedby;
       $this->name = $result->name; 
       $this->description = $result->description; 
       $this->ismandatory = $result->ismandatory; 
       return $this;
    }
    
    public function getAll(){
       $query = $this->db->get_where("c_projectdocumenttype", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $obj = new CProjectdocumenttypeModel();
           $data[] = $obj->get($value->c_projectdocumenttype_id);
       }
       return $data;
    }
    
    
    public function getTest(){
       return $this->db->get("c_projectdocumenttype");
    }
    
    function getId() {
        return $this->c_projectdocumenttype_id;
    }
    
    function isActive() {
        return $this->isactive;
    }

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function isMandatory() {
        return $this->ismandatory;
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

    function setIsmandatory($ismandatory) {
        $this->ismandatory = $ismandatory;
    }
    

    function save(){
        $data = array(
            'c_projectdocumenttype_id' => $this->c_projectdocumenttype_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'name' => $this->name,
            'description' => $this->description,
            'ismandatory' => $this->ismandatory
        );
        $this->db->where('c_projectdocumenttype_id', $this->c_projectdocumenttype_id);
        return $this->db->update('c_projectdocumenttype', $data);
    }  

}