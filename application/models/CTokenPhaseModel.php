<?php

include_once "application/libraries/UUID.php";
include_once "application/entities/CTokenPhase.php";

class CTokenPhaseModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        $query = $this->db->get_where("c_token_phase", array('c_token_phase_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }

        $result = $queryresult[0];
        return CTokenPhase::build($result);
    }

    public function save($cTokenPhase, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (!$cTokenPhase->c_token_phase_id) {
            $cTokenPhase->c_token_phase_id = UUID::getRawUUID();
            $data = array(
                'c_token_phase_id' => $cTokenPhase->c_token_phase_id,
                'isactive' => $cTokenPhase->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                
                'total_coins_available' => $cTokenPhase->total_coins_available,
                'total_coins_sold' => $cTokenPhase->total_coins_sold,
                'c_token_id' => $cTokenPhase->c_token_id,
                'status' => $cTokenPhase->status
            );
            return $this->db->insert('c_token_phase', $data);
        } else {
            $data = array(
                'isactive' => $cTokenPhase->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'name' => $cTokenPhase->name,
                
                'total_coins_available' => $cTokenPhase->total_coins_available,
                'total_coins_sold' => $cTokenPhase->total_coins_sold,
                'c_token_id' => $cTokenPhase->c_token_id,
                'status' => $cTokenPhase->status
            );

            $this->db->where('c_token_phase_id', $cTokenPhase->c_token_phase_id);
            return $this->db->update('c_token_phase', $data);
        }
    }

    public function getAll() {
        $query = $this->db->get_where("c_token_phase", array('isactive' => 'Y'));
        $result = $query->result();

        $list = array();
        foreach ($result as $project) {
            $list[] = CTokenPhase::build($project);
        }
        return $list;
    }

    function getById($id) {

        $this->db->select('c_token_phase.*');
        $this->db->from('c_token_phase');
        
        $this->db->where("c_token_phase.c_token_phase_id", $id);
        $resultados = $this->db->get();
        if ($resultados->num_rows() > 0) {
            return $resultados->result_array();
        } else {
            return false;
        }
    }

    //todos projectos del usuario  COMPANY
    /*function getAllByCompany($id) {
        $this->db->select('c_token_phase.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_token_phase');
        $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_token_phase.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_token_phase.homeimage_id', 'left');
        $this->db->where('c_projectmanager.c_user_id', $id);
        return $this->db->get();
    }*/

    //para el administrador cambiar
    /*function getAllByAdmin() {
        $this->db->select('c_token_phase.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_token_phase');
        $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_token_phase.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_token_phase.homeimage_id', 'left');
        $this->db->where("c_token_phase.projectstatus", "PEND");
        $this->db->or_where("c_token_phase.projectstatus", "ERRDATA");
        return $this->db->get();
    }*/

    //para el administrador activos cambiar
    /*function getAllByAdminActive() {
        $this->db->select('c_token_phase.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_token_phase');
        $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_token_phase.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_token_phase.homeimage_id', 'left');
        $this->db->where('c_token_phase.projectstatus !=', 'PEND');
        $this->db->where('c_token_phase.projectstatus !=', 'ERRDATA');
        $this->db->where('c_token_phase.projectstatus !=', 'DRAFT');
        return $this->db->get();
    }*/

    //para el Investor cambiar
    /*function getAllByInvestor() {
        $this->db->select('c_token_phase.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_token_phase');
        $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_token_phase.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_token_phase.homeimage_id', 'left');
        $this->db->where('c_token_phase.projectstatus !=', 'PEND');
        $this->db->where('c_token_phase.projectstatus !=', 'ERRDATA');
        $this->db->where('c_token_phase.projectstatus !=', 'DRAFT');
        return $this->db->get();
    }*/

    //para el Investor cambiar
    /*function getAllByPublic() {
        $this->db->select('c_token_phase.*, c_projectmanager.* , c_currency.cursymbol , c_file.name as namefile');
        $this->db->from('c_token_phase');
        $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');
        $this->db->join('c_currency', 'c_token_phase.c_currency_id = c_currency.c_currency_id');
        $this->db->join('c_file', 'c_file.c_file_id = c_token_phase.homeimage_id', 'left');
        $this->db->where('c_token_phase.projectstatus !=', 'PEND');
        $this->db->where('c_token_phase.projectstatus !=', 'ERRDATA');
        $this->db->where('c_token_phase.projectstatus !=', 'DRAFT');
        return $this->db->get();
    }*/
    
    //DASHBOARD ADMIN COMPANY
     /*public function getCountPendingProject($id=null) {

        $this->db->select("count(*) as countpending ");
        $this->db->from('c_token_phase');
         $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');   
        if($id!=null)
            {$this->db->where('c_projectmanager.c_user_id', $id);}
        $this->db->where("projectstatus", "PEND");
        $this->db->or_where("projectstatus", "ERRDATA");
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->countpending;
    }*/
    //DASHBOARD ADMIN COMPANY
    /*public function getCountActiveProject($id=null) {

        $this->db->select("count(c_project_id) as countactive ");
        $this->db->from('c_token_phase');
        $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');   
        if($id!=null)
            {$this->db->where('c_projectmanager.c_user_id', $id);}
        
        $this->db->where("projectstatus", "FU");
        $this->db->or_where("projectstatus", "ACT");
        $this->db->or_where("projectstatus", "COFU");
        $this->db->or_where("projectstatus", "NCOFU");
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->countactive;
    }*/
    //DASHBOARD ADMIN COMPANY
     /*public function getCountFinishProject($id=null) {

        $this->db->select("count(c_project_id) as countfinish ");
        $this->db->from('c_token_phase');
         $this->db->join('c_projectmanager', 'c_token_phase.c_projectmanager_id = c_projectmanager.c_projectmanager_id');   
        if($id!=null)
            {$this->db->where('c_projectmanager.c_user_id', $id);}
         $this->db->where("projectstatus", "VO");
        $this->db->or_where("projectstatus", "FIN");
        $query = $this->db->get();
        $queryresult = $query->result();
        if (!$queryresult)
            return "0";

        return $queryresult[0]->countfinish;
    
     }*/
    

    /*function delete($id) {
        $this->db->where('c_project_id', $id);
        return $this->db->delete('c_token_phase');
    }*/

    /*function change_status($status, $c_project_id) {
        $this->db->where('c_project_id', $c_project_id);
        $this->db->update('c_token_phase', array('projectstatus' => $status));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }*/

    /*public function getProjectStatusName($status) {
        log_message("ERROR", "ESTADO :" . $status);
        switch ($status) {
            case "PEND": return "Pending Evaluation";
            case "ERRDATA": return "Incomplete data";
            case "COFU": return "Funding Complete";
            case "NCOFU": return "Funding did not Complete";
            case "VO": return "Voided";
            case "ACT": return "Active";
            case "FI": return "Finished";
            case "FU": return "Funding";
            default: break;
        }
        return "uknowkn";
    }*/
    
}

?>