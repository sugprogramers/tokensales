<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CProjectdocumentModel extends CI_Model {
    
    private $c_projectdocument_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $c_project_id;
    private $c_projectdocumenttype_id;
    private $c_file_id;    
    private $status;    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_projectdocument", array('c_projectdocument_id' => $id));
        $result = $query->result()[0];

        $this->c_projectdocument_id = $result->c_projectdocument_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->c_project_id = $result->c_project_id;
        $this->c_projectdocumenttype_id = $result->c_projectdocumenttype_id;
        $this->c_file_id = $result->c_file_id; 
        $this->status = $result->status; 
        
        return $this;
    }
    
    public function getAll() {               
        $query = $this->db->get_where("c_projectdocument", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $projectdocument) {
            $obj = new CProjectdocumentModel();
            $list[] = $obj->get($projectdocument->c_projectdocument_id);
        }
        return $list;
    }    

    function getId() {
        return $this->c_projectdocument_id;
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

    function getC_project_id() {
        return $this->c_project_id;
    }

    function getC_projectdocumenttype_id() {
        return $this->c_projectdocumenttype_id;
    }

    function getC_file_id() {
        return $this->c_file_id;
    }

    function getStatus() {
        return $this->status;
    }
    
    function getProject() {
        $obj = new CProjectModel();
        $obj->get($this->c_project_id);
        return $obj;
    } 
    
    function getProjectDocumentType() {
        $obj = new CProjectdocumenttypeModel();
        $obj->get($this->c_projectdocumenttype_id);
        return $obj;
    }     
    
    function getFile() {
        $obj = new CFileModel();
        $obj->get($this->c_file_id);
        return $obj;
    }       

    function setId($c_projectdocument_id) {
        $this->c_projectdocument_id = $c_projectdocument_id;
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

    function setC_project_id($c_project_id) {
        $this->c_project_id = $c_project_id;
    }

    function setC_projectdocumenttype_id($c_projectdocumenttype_id) {
        $this->c_projectdocumenttype_id = $c_projectdocumenttype_id;
    }

    function setC_file_id($c_file_id) {
        $this->c_file_id = $c_file_id;
    }

    function setStatus($status) {
        $this->status = $status;
    }    
    
    function save() {     
        $data = array(
            'c_projectdocument_id' => $this->c_projectdocument_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'c_project_id' => $this->c_project_id,
            'c_projectdocumenttype_id' => $this->c_projectdocumenttype_id,
            'c_file_id' => $this->c_file_id,
            'status' => $this->status
        );
        
        $this->db->where('c_projectdocument_id', $this->c_projectdocument_id);
        return $this->db->update('c_projectdocument', $data);
    }    
    
}

?>