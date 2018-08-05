<?php

class CInvestor{
    
    public $c_investor_id;
    public $isactive;
    public $created;
    public $createdby;
    public $updated;
    public $updatedby;
    public $c_user_id;
    
    // TAX INFORMATION
    public $c_tax_country_id;
    public $tax_address1;   
    public $tax_city;   
    public $tax_postal;   
    public $tax_fiscalnumber;   
    public $tax_isuscitizen;   
    public $tax_ustin;   
    
    // IDENTIFICATION
    public $documenttype;
    public $documentnumber;
    public $c_docimgfront_id;
    public $c_docimgback_id;
    
    public $status;
    public $validateddate;
    public $validationnotes;
    
    // PAYPAL PAYIN INFORMATION
    public $payin_paypalusername;  
    
    public static function build($result){
        $cInvestor = new CInvestor();   

        $cInvestor->c_investor_id = $result->c_investor_id;
        $cInvestor->isactive = $result->isactive;
        $cInvestor->created = $result->created;
        $cInvestor->createdby = $result->createdby;
        $cInvestor->updated = $result->updated;
        $cInvestor->updatedby = $result->updatedby;
        $cInvestor->c_user_id = $result->c_user_id;
        $cInvestor->c_tax_country_id = $result->c_tax_country_id;
        $cInvestor->tax_address1 = $result->tax_address1; 
        $cInvestor->tax_city = $result->tax_city;
        $cInvestor->tax_postal = $result->tax_postal;
        $cInvestor->tax_fiscalnumber = $result->tax_fiscalnumber;
        $cInvestor->tax_isuscitizen = $result->tax_isuscitizen;
        $cInvestor->tax_ustin = $result->tax_ustin;
        $cInvestor->documenttype = $result->documenttype;
        $cInvestor->documentnumber = $result->documentnumber;
        $cInvestor->c_docimgfront_id = $result->c_docimgfront_id;
        $cInvestor->c_docimgback_id = $result->c_docimgback_id;
        $cInvestor->status = $result->status;
        $cInvestor->validateddate = $result->validateddate;
        $cInvestor->validationnotes = $result->validationnotes;
        $cInvestor->payin_paypalusername = $result->payin_paypalusername;
        
        return $cInvestor;
    } 
}

