<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CProjectModel extends CI_Model {
    
    private $c_project_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $name;    
    private $c_user_id;
    private $c_company_id;    
    private $c_currency_id;    
    private $datecontract;
    private $startdate;
    private $datefinish;
    private $c_projecttype_id;
    private $projectstatus;
    private $propertytype;
    private $qtyproperty;
    private $address1;
    private $c_country_id;
    private $c_region_id;
    private $city;

    // DEVELOPMENT LOAN AMTS
    private $totalyieldperc;
    private $loanterm;
    private $targetamt;
    
    // PAYPAL PAYIN INFORMATION
    private $payin_paypalusername;

    // PROJECT PRESENTATION
    private $homeimage_id;
    private $description;   
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_project", array('c_project_id' => $id));
        $result = $query->result()[0];
    
        $this->c_project_id = $result->c_project_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->name = $result->name;
        $this->c_user_id = $result->c_user_id;
        $this->c_company_id = $result->c_company_id; 
        $this->c_currency_id = $result->c_currency_id; 
        $this->datecontract = $result->datecontract; 
        $this->startdate = $result->startdate; 
        $this->datefinish = $result->datefinish; 
        $this->c_projecttype_id = $result->c_projecttype_id; 
        $this->projectstatus = $result->projectstatus; 
        $this->propertytype = $result->propertytype; 
        $this->qtyproperty = $result->qtyproperty; 
        $this->address1 = $result->address1; 
        $this->c_country_id = $result->c_country_id; 
        $this->c_region_id = $result->c_region_id; 
        $this->city = $result->city; 
        $this->totalyieldperc = $result->totalyieldperc; 
        $this->loanterm = $result->loanterm; 
        $this->targetamt = $result->targetamt; 
        $this->payin_paypalusername = $result->payin_paypalusername; 
        $this->homeimage_id = $result->homeimage_id; 
        $this->description = $result->description; 
        
        return $this;
    }

    public function getAll() {               
        $query = $this->db->get_where("c_project", array('isactive' => 'Y'));
        $result = $query->result();
        
        $list = array();
        foreach($result as $project) {
            $obj = new CProjectModel();
            $list[] = $obj->get($project->c_project_id);
        }
        return $list;
    }
    
    function getId() {
        return $this->c_project_id;
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

    function getName() {
        return $this->name;
    }

    function getC_user_id() {
        return $this->c_user_id;
    }

    function getC_company_id() {
        return $this->c_company_id;
    }

    function getC_currency_id() {
        return $this->c_currency_id;
    }

    function getDatecontract() {
        return $this->datecontract;
    }

    function getStartdate() {
        return $this->startdate;
    }

    function getDatefinish() {
        return $this->datefinish;
    }

    function getC_projecttype_id() {
        return $this->c_projecttype_id;
    }

    function getProjectstatus() {
        return $this->projectstatus;
    }

    function getPropertytype() {
        return $this->propertytype;
    }

    function getQtyproperty() {
        return $this->qtyproperty;
    }

    function getAddress1() {
        return $this->address1;
    }

    function getC_country_id() {
        return $this->c_country_id;
    }

    function getC_region_id() {
        return $this->c_region_id;
    }

    function getCity() {
        return $this->city;
    }

    function getTotalyieldperc() {
        return $this->totalyieldperc;
    }

    function getLoanterm() {
        return $this->loanterm;
    }

    function getTargetamt() {
        return $this->targetamt;
    }

    function getPayin_paypalusername() {
        return $this->payin_paypalusername;
    }

    function getHomeimage_id() {
        return $this->homeimage_id;
    }

    function getDescription() {
        return $this->description;
    }

    function getCUser() {
        $obj = new CUserModel();
        $obj->get($this->c_user_id);
        return $obj;
    }  
    
    function getCompany() {
        $obj = new CCompanyModel();
        $obj->get($this->c_company_id);
        return $obj;
    }      
    
    function getCurrency() {
        $obj = new CCurrencyModel();
        $obj->get($this->c_currency_id);
        return $obj;
    }          
    
    function getCountry() {
        $obj = new CCountryModel();
        $obj->get($this->c_country_id);
        return $obj;
    }  
    
    function getRegion() {
        $obj = new CRegionModel();
        $obj->get($this->c_region_id);
        return $obj;
    }      
    
    function getHomeImage() {
        $obj = new CFileModel();
        $obj->get($this->homeimage_id);
        return $obj;
    }    
    
    function setId($c_project_id) {
        $this->c_project_id = $c_project_id;
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

    function setName($name) {
        $this->name = $name;
    }

    function setC_user_id($c_user_id) {
        $this->c_user_id = $c_user_id;
    }

    function setC_company_id($c_company_id) {
        $this->c_company_id = $c_company_id;
    }

    function setC_currency_id($c_currency_id) {
        $this->c_currency_id = $c_currency_id;
    }

    function setDatecontract($datecontract) {
        $this->datecontract = $datecontract;
    }

    function setStartdate($startdate) {
        $this->startdate = $startdate;
    }

    function setDatefinish($datefinish) {
        $this->datefinish = $datefinish;
    }

    function setC_projecttype_id($c_projecttype_id) {
        $this->c_projecttype_id = $c_projecttype_id;
    }

    function setProjectstatus($projectstatus) {
        $this->projectstatus = $projectstatus;
    }

    function setPropertytype($propertytype) {
        $this->propertytype = $propertytype;
    }

    function setQtyproperty($qtyproperty) {
        $this->qtyproperty = $qtyproperty;
    }

    function setAddress1($address1) {
        $this->address1 = $address1;
    }

    function setC_country_id($c_country_id) {
        $this->c_country_id = $c_country_id;
    }

    function setC_region_id($c_region_id) {
        $this->c_region_id = $c_region_id;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setTotalyieldperc($totalyieldperc) {
        $this->totalyieldperc = $totalyieldperc;
    }

    function setLoanterm($loanterm) {
        $this->loanterm = $loanterm;
    }

    function setTargetamt($targetamt) {
        $this->targetamt = $targetamt;
    }

    function setPayin_paypalusername($payin_paypalusername) {
        $this->payin_paypalusername = $payin_paypalusername;
    }

    function setHomeimage_id($homeimage_id) {
        $this->homeimage_id = $homeimage_id;
    }

    function setDescription($description) {
        $this->description = $description;
    }    
    
    function save() {       
        $data = array(
            'c_project_id' => $this->c_project_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'name' => $this->name,
            'c_user_id' => $this->c_user_id,
            'c_company_id' => $this->c_company_id,
            'c_currency_id' => $this->c_currency_id,
            'datecontract' => $this->datecontract,
            'startdate' => $this->startdate,
            'datefinish' => $this->datefinish,
            'c_projecttype_id' => $this->c_projecttype_id,
            'projectstatus' => $this->projectstatus,
            'propertytype' => $this->propertytype,
            'qtyproperty' => $this->qtyproperty,
            'address1' => $this->address1,
            'c_country_id' => $this->c_country_id,
            'c_region_id' => $this->c_region_id,
            'city' => $this->city,
            'totalyieldperc' => $this->totalyieldperc,
            'loanterm' => $this->loanterm,
            'targetamt' => $this->targetamt,
            'payin_paypalusername' => $this->payin_paypalusername,
            'homeimage_id' => $this->homeimage_id,
            'description' => $this->description
        );
        
        $this->db->where('c_project_id', $this->c_project_id);
        return $this->db->update('c_project', $data);
    }    
    
}

?>