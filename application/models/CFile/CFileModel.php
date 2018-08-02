<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CFileModel extends CI_Model {
    
    private $c_file_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $name;
    private $datatype;
    private $path;    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_file", array('c_file_id' => $id));
        $result = $query->result()[0];

        $this->c_file_id = $result->c_file_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->name = $result->name;
        $this->datatype = $result->datatype;
        $this->path = $result->path; 
        
        return $this;
    }
    
    public function getAll() {               
        $query = $this->db->get("c_file");
        $result = $query->result();
        
        $list = array();
        foreach($result as $file) {
            $obj = new CFileModel();
            $list[] = $obj->get($file->c_file_id);
        }
        return $list;
    }    

    function getId() {
        return $this->c_file_id;
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

    function getDatatype() {
        return $this->datatype;
    }

    function getPath() {
        return $this->path;
    }

    function setId($c_file_id) {
        $this->c_file_id = $c_file_id;
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

    function setDatatype($datatype) {
        $this->datatype = $datatype;
    }

    function setPath($path) {
        $this->path = $path;
    }

        
    function save() {      
        $data = array(
            'c_file_id' => $this->c_file_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'name' => $this->name,
            'datatype' => $this->datatype,
            'path' => $this->path
        );
        
        $this->db->where('c_file_id', $this->c_file_id);
        return $this->db->update('c_file', $data);
    }    
    
}

?>