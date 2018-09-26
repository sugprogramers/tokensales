<?php

include_once "application/libraries/UUID.php";
include_once "application/entities/CSalesPhase.php";

class CSalesFaseModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
        $query = $this->db->get_where("c_sales_phase", array('c_sales_phase_id' => $id));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }

        $result = $queryresult[0];
        return CSalesPhase::build($result);
    }

    public function save($cSalesPhase, $updatedBy) {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (!$cSalesPhase->c_sales_phase_id) {
            $cSalesPhase->c_sales_phase_id = UUID::getRawUUID();
            $data = array(
                'c_sales_phase_id' => $cSalesPhase->c_sales_phase_id,
                'isactive' => $cSalesPhase->isactive,
                'created' => $now,
                'createdby' => $updatedBy,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'coins_amt' => $cSalesPhase->coins_amt,
                'c_user_id' => $cSalesPhase->c_user_id,
                'c_token_phase_id' => $cSalesPhase->c_token_phase_id,
                'date' => $cSalesPhase->date,
                'validation_string' => $cSalesPhase->validation_string,
                'payment_address' => $cSalesPhase->payment_address,
                'phase_number' => $cSalesPhase->phase_number,
                'status' => $cSalesPhase->status,
            );
            return $this->db->insert('c_sales_phase', $data);
        } else {
            $data = array(
                'isactive' => $cSalesPhase->isactive,
                'updated' => $now,
                'updatedby' => $updatedBy,
                'coins_amt' => $cSalesPhase->coins_amt,
                'c_user_id' => $cSalesPhase->c_user_id,
                'c_token_phase_id' => $cSalesPhase->c_token_phase_id,
                'date' => $cSalesPhase->date,
                'validation_string' => $cSalesPhase->validation_string,
                'payment_address' => $cSalesPhase->payment_address,
                'phase_number' => $cSalesPhase->phase_number,
                'status' => $cSalesPhase->status,
            );

            $this->db->where('c_sales_phase_id', $cSalesPhase->c_sales_phase_id);
            return $this->db->update('c_sales_phase', $data);
        }
    }

    public function getAll() {
        $query = $this->db->get_where("c_sales_phase", array('isactive' => "Y"));
        $result = $query->result();
        $data = array();
        foreach ($result as $value) {
            $data[] = CSalesPhase::build($value);
        }
        return $data;
    }

    public function loadByUser($userId) {

        //$this->db->table('c_sales_phase');
        $this->db->where('c_user_id', $userId);

        return $this->db->get('c_sales_phase');
    }

//    public function get_paymentHistoryDetailById($cSalesPhaseId) {
//
//        $this->db->select('ph.c_sales_phase_id, ph.description, ph.paymentdate, ph.fromaccount, ph.toaccount, ph.from_user_id, ph.to_user_id, (curr.cursymbol || ph.amount) as amountformatted,
//            po.ordertype, p.name, p.companyname, pm.paypalusername, iu.firstname, iu.lastname ');
//        $this->db->from('c_sales_phase as ph');
//        $this->db->join('c_currency as curr', 'ph.c_currency_id = curr.c_currency_id');
//        $this->db->join('fin_payment_order as po', 'ph.fin_payment_order_id = po.fin_payment_order_id');
//        $this->db->join('c_project as p', 'po.c_project_id = p.c_project_id ', 'left');
//        $this->db->join('c_projectmanager as pm', 'p.c_projectmanager_id = pm.c_projectmanager_id', 'left');
//        $this->db->join('c_investor as i', 'po.c_investor_id = i.c_investor_id ', 'left');
//        $this->db->join('c_user as iu', 'i.c_user_id = iu.c_user_id ', 'left');
//        $this->db->where('ph.c_sales_phase_id', $cSalesPhaseId);
//        return $this->db->get();
//    }

    public function get_statusName($status) {
        if ($status === 'PEND') {
            return 'Pending';
        }
        if ($status === 'CO') {
            return 'Completed';
        }
        if ($status === 'ERR') {
            return 'Error';
        }
        return 'NONE';
    }

//    public function get_typeName($type) {
//        if ($type === 'INT') {
//            return 'Internal';
//        } else if ($type === 'EXTIN') {
//            return 'External-In';
//        } else if ($type === 'EXTOUT') {
//            return 'External-Out';
//        }
//        return 'NONE';
//    }

    public function loadByTokenPhase($cTokenPhaseId) {
        $query = $this->db->get_where("c_sales_phase", array('c_token_phase_id' => $cTokenPhaseId));
        $queryresult = $query->result();
        if (!$queryresult) {
            return null;
        }

        $result = $queryresult[0];
        return CSalesPhase::build($result);
    }

//    public function get_payOutPaymentHistoryByUserId($cuserId) {
//        $this->db->select('ph.c_sales_phase_id, ph.description, ph.paymentdate, ph.amount, ph.fromaccount, ph.toaccount, ph.c_currency_id,
//            ph.status, ph.fin_payment_order_id ');
//        $this->db->from('c_sales_phase as ph');
//        $this->db->join('fin_payment_order as po', 'ph.fin_payment_order_id = po.fin_payment_order_id');
//        $this->db->where('po.ordertype', 'INVPAYOUT');
//        $this->db->where('ph.type', 'EXTOUT');
//        $this->db->where('ph.fin_payment_order_id IS NOT NULL', null, false);
//        $this->db->where('ph.to_user_id', $cuserId);
//        return $this->db->get();
//    }
//
//    public function get_payInPaymentHistoryByUserId($cUserId) {
//        $this->db->select('ph.c_sales_phase_id, ph.description, ph.paymentdate, ph.amount, ph.fromaccount, ph.toaccount, ph.c_currency_id,
//            ph.status ');
//        $this->db->from('c_sales_phase as ph');
//        $this->db->where('ph.type', 'EXTIN');
//        $this->db->where('ph.fin_payment_order_id IS NULL', null, false);
//        $this->db->where('ph.from_user_id', $cUserId);
//        return $this->db->get();
//    }

}

?>