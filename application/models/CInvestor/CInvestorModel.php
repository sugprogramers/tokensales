<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CInvestorModel extends CI_Model {
    
    private $c_investor_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $c_user_id;
    
    // TAX INFORMATION
    private $c_tax_country_id;
    private $tax_address1;   
    private $tax_city;   
    private $tax_postal;   
    private $tax_fiscalnumber;   
    private $tax_isuscitizen;   
    private $tax_ustin;   
    
    // IDENTIFICATION
    private $documenttype;
    private $documentnumber;
    private $c_docimgfront_id;
    private $c_docimgback_id;
    
    private $status;
    private $validateddate;
    private $validationnotes;
    
    // PAYPAL PAYIN INFORMATION
    private $payin_paypalusername;    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_investor", array('c_investor_id' => $id));
        $result = $query->result()[0];

        $this->c_investor_id = $result->c_investor_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->c_user_id = $result->c_user_id;
        $this->c_tax_country_id = $result->c_tax_country_id;
        $this->tax_address1 = $result->tax_address1; 
        $this->tax_city = $result->tax_city;
        $this->tax_postal = $result->tax_postal;
        $this->tax_fiscalnumber = $result->tax_fiscalnumber;
        $this->tax_isuscitizen = $result->tax_isuscitizen;
        $this->tax_ustin = $result->tax_ustin;
        $this->documenttype = $result->documenttype;
        $this->documentnumber = $result->documentnumber;
        $this->c_docimgfront_id = $result->c_docimgfront_id;
        $this->c_docimgback_id = $result->c_docimgback_id;
        $this->status = $result->status;
        $this->validateddate = $result->validateddate;
        $this->validationnotes = $result->validationnotes;
        $this->payin_paypalusername = $result->payin_paypalusername;
        
        return $this;
    }

    function getId() {
        return $this->c_investor_id;
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

    function getC_user_id() {
        return $this->c_user_id;
    }

    function getC_tax_country_id() {
        return $this->c_tax_country_id;
    }

    function getTax_address1() {
        return $this->tax_address1;
    }

    function getTax_city() {
        return $this->tax_city;
    }

    function getTax_postal() {
        return $this->tax_postal;
    }

    function getTax_fiscalnumber() {
        return $this->tax_fiscalnumber;
    }

    function getTax_isuscitizen() {
        return $this->tax_isuscitizen;
    }

    function getTax_ustin() {
        return $this->tax_ustin;
    }

    function getDocumenttype() {
        return $this->documenttype;
    }

    function getDocumentnumber() {
        return $this->documentnumber;
    }

    function getC_docimgfront_id() {
        return $this->c_docimgfront_id;
    }

    function getC_docimgback_id() {
        return $this->c_docimgback_id;
    }

    function getStatus() {
        return $this->status;
    }

    function getValidateddate() {
        return $this->validateddate;
    }

    function getValidationnotes() {
        return $this->validationnotes;
    }

    function getPayin_paypalusername() {
        return $this->payin_paypalusername;
    }

    function setId($c_investor_id) {
        $this->c_investor_id = $c_investor_id;
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

    function setC_user_id($c_user_id) {
        $this->c_user_id = $c_user_id;
    }

    function setC_tax_country_id($c_tax_country_id) {
        $this->c_tax_country_id = $c_tax_country_id;
    }

    function setTax_address1($tax_address1) {
        $this->tax_address1 = $tax_address1;
    }

    function setTax_city($tax_city) {
        $this->tax_city = $tax_city;
    }

    function setTax_postal($tax_postal) {
        $this->tax_postal = $tax_postal;
    }

    function setTax_fiscalnumber($tax_fiscalnumber) {
        $this->tax_fiscalnumber = $tax_fiscalnumber;
    }

    function setTax_isuscitizen($tax_isuscitizen) {
        $this->tax_isuscitizen = $tax_isuscitizen;
    }

    function setTax_ustin($tax_ustin) {
        $this->tax_ustin = $tax_ustin;
    }

    function setDocumenttype($documenttype) {
        $this->documenttype = $documenttype;
    }

    function setDocumentnumber($documentnumber) {
        $this->documentnumber = $documentnumber;
    }

    function setC_docimgfront_id($c_docimgfront_id) {
        $this->c_docimgfront_id = $c_docimgfront_id;
    }

    function setC_docimgback_id($c_docimgback_id) {
        $this->c_docimgback_id = $c_docimgback_id;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setValidateddate($validateddate) {
        $this->validateddate = $validateddate;
    }

    function setValidationnotes($validationnotes) {
        $this->validationnotes = $validationnotes;
    }

    function setPayin_paypalusername($payin_paypalusername) {
        $this->payin_paypalusername = $payin_paypalusername;
    }
        
    function save() {        
        $data = array(
            'c_investor_id' => $this->c_investor_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'c_user_id' => $this->c_user_id,
            'c_tax_country_id' => $this->c_tax_country_id,
            'tax_address1' => $this->tax_address1,
            'tax_city' => $this->tax_city,
            'tax_postal' => $this->tax_postal,
            'tax_fiscalnumber' => $this->tax_fiscalnumber,
            'tax_isuscitizen' => $this->tax_isuscitizen,
            'tax_ustin' => $this->tax_ustin,
            'documenttype' => $this->documenttype,
            'documentnumber' => $this->documentnumber,
            'c_docimgfront_id' => $this->c_docimgfront_id,
            'c_docimgback_id' => $this->c_docimgback_id,
            'status' => $this->status,
            'validateddate' => $this->validateddate,
            'validationnotes' => $this->validationnotes,
            'payin_paypalusername' => $this->payin_paypalusername            
        );
        
        $this->db->where('c_investor_id', $this->c_investor_id);
        return $this->db->update('c_investor', $data);
    }    
    
}

?>