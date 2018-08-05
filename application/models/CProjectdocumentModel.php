<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CProjectdocument.php";

class CProjectdocumentModel extends CI_Model {   
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_projectdocument", array('c_projectdocument_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];     
        return CProjectdocument::build($result);
    }
    
    public function save($cProjectdocument, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cProjectdocument->c_projectdocument_id){
            $cProjectdocument->c_projectdocument_id = UUID::getRawUUID();
            
            $data = array(
                'c_projectdocument_id' => $cProjectdocument->c_projectdocument_id,
                'isactive' => $cProjectdocument->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_project_id' => $cProjectdocument->c_project_id,
                'c_projectdocumenttype_id' => $cProjectdocument->c_projectdocumenttype_id,
                'c_file_id' => $cProjectdocument->c_file_id,
                'status' => $cProjectdocument->status
            );
            return $this->db->insert('c_projectdocument', $data);
        }
        else{
            $data = array(
                'isactive' => $cProjectdocument->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_project_id' => $cProjectdocument->c_project_id,
                'c_projectdocumenttype_id' => $cProjectdocument->c_projectdocumenttype_id,
                'c_file_id' => $cProjectdocument->c_file_id,
                'status' => $cProjectdocument->status
            );

            $this->db->where('c_projectdocument_id', $cProjectdocument->c_projectdocument_id);
            return $this->db->update('c_projectdocument', $data);   
        }
    }
    
    public function getAll() {               
        $query = $this->db->get_where("c_projectdocument", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $projectdocument) {
            $list[] = CProjectdocument::build($projectdocument);
        }
        return $list;
    }    
    
}

?>