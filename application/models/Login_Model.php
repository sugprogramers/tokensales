<?php

class Login_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function login($email, $password) {
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $resultados = $this->db->get("c_user");
        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        } else {
            return false;
        }
    }

}

?>