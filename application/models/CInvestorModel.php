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
    
    public function getByUserId($id) {
        $query = $this->db->get_where("c_investor", array('c_user_id' => $id));
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
                'payin_paypalusername' => $cInvestor->payin_paypalusername,      
                'payinbalance' => $cInvestor->payinbalance,      
                'payoutbalance' => $cInvestor->payoutbalance,
                'pendingbalance' => $cInvestor->pendingbalance      
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
                'payin_paypalusername' => $cInvestor->payin_paypalusername,
                'payinbalance' => $cInvestor->payinbalance,      
                'payoutbalance' => $cInvestor->payoutbalance,
                'pendingbalance' => $cInvestor->pendingbalance 
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
    
    public function getInvestorCustomDataById($investorId){
       
       $this->db->select("usr.firstname, usr.lastname, usr.email, usr.phone, (date(usr.birthday))::CHARACTER(11) as birthday, co.name as usercountry, re.description as userregion," 
                         ."txc.name as taxcountry, inv.tax_fiscalnumber  , inv.tax_address1, inv.tax_postal, inv.tax_city, inv.tax_ustin, "
                         ."inv.documenttype, inv.documentnumber, ff.path as filefrontpath ,ff.name as filefrontname , bf.path as filebackpath ,bf.name as filebackname ");
       $this->db->from('c_investor inv');
       $this->db->join('c_user usr ', 'inv.c_user_id = usr.c_user_id ', 'left');
       $this->db->join('c_country co', 'usr.c_country_id = co.c_country_id ', 'left');
       $this->db->join('c_region re', 'usr.c_region_id = re.c_region_id ', 'left');
       $this->db->join('c_country txc', 'inv.c_tax_country_id = txc.c_country_id ', 'left');
       $this->db->join('c_file ff', 'inv.c_docimgfront_id = ff.c_file_id ', 'left');
       $this->db->join('c_file bf', 'inv.c_docimgback_id = bf.c_file_id  ', 'left');
       $this->db->where('inv.c_investor_id', $investorId);
       
       return $query =  $this->db->get();
    }
    
    
    public function getInvestorStatusName($status){
        switch ($status) {
            case "PEND": return "Pending Evaluation";
            case "VAL": return "Validated";
            default: break;
        }
        return "uknowkn";
    }
    
    
    public function getInvestorDocumentTypeName($doctype){
        switch ($doctype) {
            case "PASS": return "Passport";
            case "IN": return "Identification Number";
            default: break;
        }
        return "uknowkn";
    }
    
    
    
}

?>