<?php
/**
 * Entity class for entity CCurrency (stored in table C_Currency).
 */
class CCompanyModel extends CI_Model {
    
    private $c_company_id;
    private $isactive;
    private $created;
    private $createdby;
    private $updated;
    private $updatedby;
    private $c_user_id;
    private $name;
    private $description;
    private $url;
    private $taxid;
    private $address1;
    private $address2;
    private $c_country_id;    
    private $c_region_id;    
    private $city;  
    private $postal;  
    
    public function __construct() {
        parent::__construct();
        $this->load->database();        
    }    
    
    public function get($id) {
        $query = $this->db->get_where("c_company", array('c_company_id' => $id));
        $result = $query->result()[0];

        $this->c_company_id = $result->c_company_id;
        $this->isactive = $result->isactive;
        $this->created = $result->created;
        $this->createdby = $result->createdby;
        $this->updated = $result->updated;
        $this->updatedby = $result->updatedby;
        $this->c_user_id = $result->c_user_id;
        $this->name = $result->name;
        $this->description = $result->description;
        $this->url = $result->url;
        $this->taxid = $result->taxid;
        $this->address1 = $result->address1;
        $this->address2 = $result->address2;
        $this->c_country_id = $result->c_country_id;
        $this->c_region_id = $result->c_region_id;
        $this->city = $result->city;
        $this->postal = $result->postal;
        
        return $this;
    }
    
    public function getAll() {               
        $query = $this->db->get("c_company");
        $result = $query->result();
        
        $list = array();
        foreach($result as $company) {
            $obj = new CCurrencyModel();
            $list[] = $obj->get($company->c_company_id);
        }
        return $list;
    }

    function getId() {
        return $this->c_company_id;
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

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function getUrl() {
        return $this->url;
    }

    function getTaxid() {
        return $this->taxid;
    }

    function getAddress1() {
        return $this->address1;
    }

    function getAddress2() {
        return $this->address2;
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

    function getPostal() {
        return $this->postal;
    }

    function setId($c_company_id) {
        $this->c_company_id = $c_company_id;
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

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setTaxid($taxid) {
        $this->taxid = $taxid;
    }

    function setAddress1($address1) {
        $this->address1 = $address1;
    }

    function setAddress2($address2) {
        $this->address2 = $address2;
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

    function setPostal($postal) {
        $this->postal = $postal;
    }

        
    function save() {        
        $data = array(
            'c_company_id' => $this->c_company_id,
            'isactive' => $this->isactive,
            'created' => $this->created,
            'createdby' => $this->createdby,
            'updated' => $this->updated,
            'updatedby' => $this->updatedby,
            'c_user_id' => $this->c_user_id,
            'name' => $this->name,
            'description' => $this->description,
            'url' => $this->url,
            'taxid' => $this->taxid,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'c_country_id' => $this->c_country_id,
            'c_region_id' => $this->c_region_id,
            'city' => $this->city,
            'postal' => $this->postal
        );
        
        $this->db->where('c_company_id', $this->c_company_id);
        return $this->db->update('c_company', $data);
    }    
    
}

?>