<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CProjectdocumenttype.php";

class CProjectdocumenttypeModel extends CI_Model
{
    
     public function __construct(){
	parent::__construct();
	$this->load->database();
    }

    public function get($id) {
       $query = $this->db->get_where("c_projectdocumenttype", array('c_projectdocumenttype_id' => $id));
       $queryresult = $query->result();
       if (!$queryresult) {
           return null;
       }
        
       $result = $queryresult[0];
       return CProjectdocumenttype::build($result);
    }
    
    public function save($cProjectdocumenttype, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cProjectdocumenttype->c_projectdocumenttype_id){
            $cProjectdocumenttype->c_projectdocumenttype_id = UUID::getRawUUID();
            //NOW
            $data = array(
                'c_projectdocumenttype_id' => $cProjectdocumenttype->c_projectdocumenttype_id,
                'isactive' => $cProjectdocumenttype->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cProjectdocumenttype->name,
                'description' => $cProjectdocumenttype->description,
                'ismandatory' => $cProjectdocumenttype->ismandatory
              );
            return $this->db->insert('c_projectdocumenttype', $data);
        }else{ //Update
            $data = array(
                'isactive' => $cProjectdocumenttype->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cProjectdocumenttype->name,
                'description' => $cProjectdocumenttype->description,
                'ismandatory' => $cProjectdocumenttype->ismandatory
              );
            $this->db->where('c_projectdocumenttype_id', $cProjectdocumenttype->c_projectdocumenttype_id);
            return $this->db->update('c_projectdocumenttype', $data);
        }
    } 
    
    public function getAll(){
       $query = $this->db->get_where("c_projectdocumenttype", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $data[] = CProjectdocumenttype::build($value);
       }
       return $data;
    } 
    
    function delete($id){
        $this->db->where('c_projectdocumenttype_id', $id);
        return $this->db->delete('c_projectdocumenttype');
    }
    
    
    
}