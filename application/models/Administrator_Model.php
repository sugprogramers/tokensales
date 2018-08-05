<?php

class Administrator_Model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

     public function get_administrator()
     {
          return $this->db->get("c_user");
     }

}

?>