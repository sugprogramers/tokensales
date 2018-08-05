<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CCompany.php";
class CCurrencyModel extends CI_Model {
        
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_currency", array('c_currency_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];
        return CCurrency::build($result);
    }
    
    public function save($cCurrency, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cCurrency->c_currency_id){
            $cCurrency->c_currency_id = UUID::getRawUUID();
            $data = array(
                'c_currency_id' => $cCurrency->c_currency_id,
                'isactive' => $cCurrency->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'iso_code' => $cCurrency->iso_code,
                'cursymbol' => $cCurrency->cursymbol,
                'description' => $cCurrency->description,
                'stdprecision' => $cCurrency->stdprecision
            ); 
            return $this->db->insert('c_currency', $data);
        }
        else{
            $data = array(
                'isactive' => $cCurrency->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'iso_code' => $cCurrency->iso_code,
                'cursymbol' => $cCurrency->cursymbol,
                'description' => $cCurrency->description,
                'stdprecision' => $cCurrency->stdprecision
            );

            $this->db->where('c_currency_id', $cCurrency->c_currency_id);
            return $this->db->update('c_currency', $data);        
        }
    }   

    public function getAll() {               
        $query = $this->db->get_where("c_currency", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $currency) {
            $list[] = CCurrency::build($currency);
        }
        return $list;
    } 
    
}

?>