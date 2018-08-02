<?php

class CProjecttypeModel extends CI_Model
{
    private $c_projecttype_id;
    private $isactive;
    private $created ;
    private $createdby ;
    private $updated ;
    private $updatedby ;
    private $name;
    private $description;
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
    }
     
    public function get($id) {
       $query = $this->db->get_where("c_projecttype", array('c_projecttype_id' => $id));
       $result = $query->result()[0];
       $this->c_projecttype_id = $result->c_projecttype_id;
       $this->isactive = $result->isactive;
       $this->created = $result->created;
       $this->createdby = $result->createdby;
       $this->updated = $result->updated;
       $this->updatedby = $result->updatedby;
       $this->name = $result->name; 
       $this->description = $result->description; 
       return $this;
    }
    
    public function getAll(){
       $query = $this->db->get_where("c_projecttype", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $obj = new CProjecttypeModel;
           $data[] = $obj->get($value->c_projecttype_id);
       }
       return $data;
    }
    
    function getId() {
        return $this->c_projecttype_id;
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

    function setIsactive($isactive) {
        $this->isactive = $isactive;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function save(){
        $data = array(
            'c_projecttype_id' => $this->c_projecttype_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'name' => $this->name,
            'description' => $this->description
        );
        $this->db->where('c_projecttype_id', $this->c_projecttype_id);
        return $this->db->update('c_projecttype', $data);
    }  

}