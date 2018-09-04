<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CPropertytype.php";

class CPropertytypeModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        $query = $this->db->get_where("c_propertytype", array('c_propertytype_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }

        $result = $queryresult[0];
        return CPropertytype::build($result);
    }

    public function save($cPropertytype, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (!$cPropertytype->c_propertytype_id) {
            $cPropertytype->c_propertytype_id = UUID::getRawUUID();
            //NOW
            $data = array(
                'c_propertytype_id' => $cPropertytype->c_propertytype_id,
                'isactive' => $cPropertytype->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cPropertytype->name,
                'description' => $cPropertytype->description
            );
            return $this->db->insert('c_propertytype', $data);            
        } 
        else { //Update
            $data = array(
                'isactive' => $cPropertytype->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cPropertytype->name,
                'description' => $cPropertytype->description
            );
            $this->db->where('c_propertytype_id', $cPropertytype->c_propertytype_id);
            return $this->db->update('c_propertytype', $data);
        }
    }

    public function getAll() {
        $query = $this->db->get_where("c_propertytype", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach ($result as $cPropertytype) {
            $list[] = CPropertytype::build($cPropertytype);
        }
        return $list;
    }

    function delete($id) {
        $this->db->where('c_propertytype_id', $id);
        return $this->db->delete('c_propertytype');
    }

    public function count_projecttype_uses($cPropertytypeId) {
        $this->db->select("coalesce(count(*),0) as count");
        $this->db->from('c_project as pr');
        $this->db->where('pr.c_propertytype_id is not null', null, false);
        $this->db->where('pr.c_propertytype_id', $cPropertytypeId);

        $query = $this->db->get();
        $queryresult = $query->result();  
        if (!$queryresult) {
            return "0";
        }          
        return $queryresult[0]->count;   
    }  
    
}
