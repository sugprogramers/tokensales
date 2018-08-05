<?php
include "application/libraries/UUID.php";
include "application/entities/CFile.php";

class CFileModel extends CI_Model {  
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_file", array('c_file_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];        
        return CFile::build($result);
    }
    
    public function save($cFile, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cFile->c_file_id){
            $cFile->c_file_id = UUID::getRawUUID();
            $data = array(
                'c_file_id' => $cFile->c_file_id,
                'isactive' => $cFile->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cFile->name,
                'datatype' => $cFile->datatype,
                'path' => $cFile->path
            );
            return $this->db->insert('c_file', $data);
        }
        else{
            $data = array(
                'isactive' => $cFile->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cFile->name,
                'datatype' => $cFile->datatype,
                'path' => $cFile->path
            );

            $this->db->where('c_file_id', $cFile->c_file_id);
            return $this->db->update('c_file', $data);   
        }
    }    
    
    public function getAll() {               
        $query = $this->db->get_where("c_file", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $file) {
            $list[] = CFile::build($file);
        }
        return $list;
    }
    
}

?>