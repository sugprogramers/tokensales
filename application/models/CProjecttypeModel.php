<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CProjecttype.php";

class CProjecttypeModel extends CI_Model
{
    
    public function __construct(){
	parent::__construct();
	$this->load->database();
    }
     
    public function get($id) {
       $query = $this->db->get_where("c_projecttype", array('c_projecttype_id' => $id));
       $queryresult = $query->result();
       if (!$queryresult) {
           return null;
       }
        
       $result = $queryresult[0];
       return CProjecttype::build($result);
    }
    
    public function save($cProjecttype, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cProjecttype->c_projecttype_id){
            $cProjecttype->c_projecttype_id = UUID::getRawUUID();
            $data = array(
                'c_projecttype_id' => $cProjecttype->c_projecttype_id,
                'isactive' => $cProjecttype->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cProjecttype->name,
                'description' => $cProjecttype->description
            );
            return $this->db->insert('c_projecttype', $data);
        }
        else{
            $data = array(
                'isactive' => $cProjecttype->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cProjecttype->name,
                'description' => $cProjecttype->description
            );
            $this->db->where('c_projecttype_id', $cProjecttype->c_projecttype_id);
            return $this->db->update('c_projecttype', $data);  
        }
    }
    
    public function getAll(){
       $query = $this->db->get_where("c_projecttype", array('isactive' => 'Y'));
       $result = $query->result();
       $data = array();
       foreach($result as $value) {
           $data[] = CProjecttype::build($value);
       }
       return $data;
    }  

}