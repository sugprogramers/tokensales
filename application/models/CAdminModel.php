<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CAdmin.php";

class CAdminModel extends CI_Model { 
    
    public static $cAdminId = "100";
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_admin", array('c_admin_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];      
        return CAdmin::build($result);
    }
    
    public function loadByUserId($userId) {
        $query = $this->db->get_where("c_admin", array('c_user_id' => $userId));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];      
        return CAdmin::build($result);
    }
    
    public function save($cAdmin, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cAdmin->c_admin_id){
            $cAdmin->c_admin_id = UUID::getRawUUID();
            $data = array(
                'c_admin_id' => $cAdmin->c_admin_id,
                'isactive' => $cAdmin->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cAdmin->c_user_id,
                'paypalusername' => $cAdmin->paypalusername            
            );
            return $this->db->insert('c_admin', $data);
        }
        else{
            $data = array(
                'isactive' => $cAdmin->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cAdmin->c_user_id,
                'paypalusername' => $cAdmin->paypalusername            
            );

            $this->db->where('c_admin_id', $cAdmin->c_admin_id);
            return $this->db->update('c_admin', $data);  
        }
    }

    public function getAll() {               
        $query = $this->db->get_where("c_admin", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $cAdmin) {
            $list[] = CAdmin::build($cAdmin);
        }
        return $list;
    }    
    
}

?>