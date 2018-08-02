<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CEmailqueueModel extends CI_Model {
    
    private $c_emailqueue_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $rcptto;
    private $subject;
    private $body;
    private $status;
    private $emaillog;    
    private $c_user_id;    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_emailqueue", array('c_emailqueue_id' => $id));
        $result = $query->result()[0];
        
        $this->c_emailqueue_id = $result->c_emailqueue_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->rcptto = $result->rcptto;
        $this->subject = $result->subject;
        $this->body = $result->body;
        $this->status = $result->status; 
        $this->emaillog = $result->emaillog; 
        $this->c_user_id = $result->c_user_id;                
        
        return $this;
    }
    
    public function getAll() {               
        $query = $this->db->get_where("c_emailqueue", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $emailqueue) {
            $obj = new CEmailqueueModel();
            $list[] = $obj->get($emailqueue->c_emailqueue_id);
        }
        return $list;
    }    

    function getId() {
        return $this->c_emailqueue_id;
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

    function getRcptto() {
        return $this->rcptto;
    }

    function getSubject() {
        return $this->subject;
    }

    function getBody() {
        return $this->body;
    }

    function getStatus() {
        return $this->status;
    }

    function getEmaillog() {
        return $this->emaillog;
    }

    function getC_user_id() {
        return $this->c_user_id;
    }
    
    function getUser() {
        $obj = new CUserModel();
        $obj->get($this->c_user_id);
        return $obj;
    }    

    function setId($c_emailqueue_id) {
        $this->c_emailqueue_id = $c_emailqueue_id;
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

    function setRcptto($rcptto) {
        $this->rcptto = $rcptto;
    }

    function setSubject($subject) {
        $this->subject = $subject;
    }

    function setBody($body) {
        $this->body = $body;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setEmaillog($emaillog) {
        $this->emaillog = $emaillog;
    }

    function setC_user_id($c_user_id) {
        $this->c_user_id = $c_user_id;
    }   
    
    function save() {       
        $data = array(
            'c_emailqueue_id' => $this->c_emailqueue_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'rcptto' => $this->rcptto,
            'subject' => $this->subject,
            'body' => $this->body,
            'status' => $this->status,
            'emaillog' => $this->emaillog,
            'c_user_id' => $this->c_user_id
        );
        
        $this->db->where('c_emailqueue_id', $this->c_emailqueue_id);
        return $this->db->update('c_emailqueue', $data);
    }    
    
}

?>