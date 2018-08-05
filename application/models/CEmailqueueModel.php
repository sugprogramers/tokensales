<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CEmailqueue.php";
class CEmailqueueModel extends CI_Model {   
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_emailqueue", array('c_emailqueue_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];                    
        return CEmailqueue::build($result);
    }
    
    public function save($cEmailqueue, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cEmailqueue->c_emailqueue_id){
            $cEmailqueue->c_emailqueue_id = UUID::getRawUUID();
            $data = array(
                'c_emailqueue_id' => $cEmailqueue->c_emailqueue_id,
                'isactive' => $cEmailqueue->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'rcptto' => $cEmailqueue->rcptto,
                'subject' => $cEmailqueue->subject,
                'body' => $cEmailqueue->body,
                'status' => $cEmailqueue->status,
                'emaillog' => $cEmailqueue->emaillog,
                'c_user_id' => $cEmailqueue->c_user_id
            );
            return $this->db->insert('c_emailqueue', $data);
        }
        else{
            $data = array(
                'isactive' => $cEmailqueue->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'rcptto' => $cEmailqueue->rcptto,
                'subject' => $cEmailqueue->subject,
                'body' => $cEmailqueue->body,
                'status' => $cEmailqueue->status,
                'emaillog' => $cEmailqueue->emaillog,
                'c_user_id' => $cEmailqueue->c_user_id
            );

            $this->db->where('c_emailqueue_id', $cEmailqueue->c_emailqueue_id);
            return $this->db->update('c_emailqueue', $data);   
        }
    } 
    
    public function getAll() {               
        $query = $this->db->get_where("c_emailqueue", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $emailqueue) {
            $list[] = CEmailqueue::build($emailqueue);
        }
        return $list;
    }   
    
}

?>