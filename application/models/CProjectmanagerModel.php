<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CProjectmanager.php";

class CProjectmanagerModel extends CI_Model { 
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_projectmanager", array('c_projectmanager_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];      
        return CProjectmanager::build($result);
    }    
    
    public function loadByUserId($userId) {
        $query = $this->db->get_where("c_projectmanager", array('c_user_id' => $userId));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];      
        return CProjectmanager::build($result);
    }
    
    public function save($cProjectmanager, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cProjectmanager->c_projectmanager_id){
            $cProjectmanager->c_projectmanager_id = UUID::getRawUUID();
            $data = array(
                'c_projectmanager_id' => $cProjectmanager->c_projectmanager_id,
                'isactive' => $cProjectmanager->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cProjectmanager->c_user_id,
                'paypalusername' => $cProjectmanager->paypalusername            
            );
            return $this->db->insert('c_projectmanager', $data);
        }
        else{
            $data = array(
                'isactive' => $cProjectmanager->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cProjectmanager->c_user_id,
                'paypalusername' => $cProjectmanager->paypalusername            
            );

            $this->db->where('c_projectmanager_id', $cProjectmanager->c_projectmanager_id);
            return $this->db->update('c_projectmanager', $data);  
        }
    }

    public function getAll($id) {               
        $query = $this->db->get_where("c_projectmanager", array('isactive' => 'Y','c_user_id' => $id));
        $result = $query->result();
        
        $list = array();
        foreach($result as $cProjectmanager) {
            $list[] = CProjectmanager::build($cProjectmanager);
        }
        return $list;
    } 
    
    
    public function get_manager_infoByUserId($userId) {
       $this->db->select("pm.c_projectmanager_id, COALESCE(usr.firstname,'-') as companyname,  COALESCE(pm.paypalusername,'-') as companypaypal,"
                . "COALESCE(usr.address1,'-') as address, COALESCE(usr.phone,'-') as phone , COALESCE(usr.postal,'-') as postal, COALESCE(con.name,'-') as countryname, COALESCE(reg.description,'-') as regionname ");
        
        $this->db->from('c_user as usr ');
        $this->db->join('c_projectmanager as pm', ' usr.c_user_id = pm.c_user_id ',"left");
        $this->db->join('c_country con', 'usr.c_country_id =con.c_country_id ',"left");
        $this->db->join('c_region as reg', 'usr.c_region_id = reg.c_region_id ',"left");
        $this->db->where('usr.c_user_id', $userId);

        $query = $this->db->get();
        return $query->result()[0];
    }
    
    
    
    
    
}

?>