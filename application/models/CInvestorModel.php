<?php
include_once "application/libraries/UUID.php";
include_once "application/entities/CInvestor.php";

class CInvestorModel extends CI_Model { 
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_investor", array('c_investor_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }
        
        $result = $queryresult[0];      
        return CInvestor::build($result);
    }
    
    public function save($cInvestor, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if(!$cInvestor->c_investor_id){
            $cInvestor->c_investor_id = UUID::getRawUUID();
            $data = array(
                'c_investor_id' => $cInvestor->c_investor_id,
                'isactive' => $cInvestor->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cInvestor->c_user_id,
                'c_tax_country_id' => $cInvestor->c_tax_country_id,
                'tax_address1' => $cInvestor->tax_address1,
                'tax_city' => $cInvestor->tax_city,
                'tax_postal' => $cInvestor->tax_postal,
                'tax_fiscalnumber' => $cInvestor->tax_fiscalnumber,
                'tax_isuscitizen' => $cInvestor->tax_isuscitizen,
                'tax_ustin' => $cInvestor->tax_ustin,
                'documenttype' => $cInvestor->documenttype,
                'documentnumber' => $cInvestor->documentnumber,
                'c_docimgfront_id' => $cInvestor->c_docimgfront_id,
                'c_docimgback_id' => $cInvestor->c_docimgback_id,
                'status' => $cInvestor->status,
                'validateddate' => $cInvestor->validateddate,
                'validationnotes' => $cInvestor->validationnotes,
                'payin_paypalusername' => $cInvestor->payin_paypalusername            
            );
            return $this->db->insert('c_investor', $data);
        }
        else{
            $data = array(
                'isactive' => $cInvestor->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'c_user_id' => $cInvestor->c_user_id,
                'c_tax_country_id' => $cInvestor->c_tax_country_id,
                'tax_address1' => $cInvestor->tax_address1,
                'tax_city' => $cInvestor->tax_city,
                'tax_postal' => $cInvestor->tax_postal,
                'tax_fiscalnumber' => $cInvestor->tax_fiscalnumber,
                'tax_isuscitizen' => $cInvestor->tax_isuscitizen,
                'tax_ustin' => $cInvestor->tax_ustin,
                'documenttype' => $cInvestor->documenttype,
                'documentnumber' => $cInvestor->documentnumber,
                'c_docimgfront_id' => $cInvestor->c_docimgfront_id,
                'c_docimgback_id' => $cInvestor->c_docimgback_id,
                'status' => $cInvestor->status,
                'validateddate' => $cInvestor->validateddate,
                'validationnotes' => $cInvestor->validationnotes,
                'payin_paypalusername' => $cInvestor->payin_paypalusername            
            );

            $this->db->where('c_investor_id', $cInvestor->c_investor_id);
            return $this->db->update('c_investor', $data);  
        }
    }

    public function getAll() {               
        $query = $this->db->get_where("c_investor", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $investor) {
            $list[] = CInvestor::build($investor);
        }
        return $list;
    }    
    
}

?>