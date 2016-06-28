<?php

/* Location: ./application/models/Dq_user_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:09:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ticket_approval_model extends CI_Model {

    public $table = 'ticket_approval';
    public $id = 'ticket_approval_id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all data array
    function get_all_spare() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	// get data by id
    function get_my_approvals($id) {
		
		// select ta.*, trans.transport_mode, tkt.number, cust.name as cust_name from ticket_approval as ta 
		// LEFT JOIN ticket_transport as tt ON ta.ticket_transport_id=tt.ticket_transport_id 
		// LEFT JOIN transport as trans ON tt.transport_id=trans.transport_id 
		// LEFT JOIN ticket as tkt ON ta.ticket_id=tkt.ticket_id LEFT JOIN customer as cust ON tkt.cust_id=cust.id 
	
		$this->db->select('ta.*, tt.created as ticket_transport_created, tkt.nature_call, tt.actual_kms as total_kms, trans.transport_mode, dept.name as dept_name, cdata.subject, '
                        . 'tkt.created as ticket_created, tkt.ticket_id, tt.travel_date, tt.travel_start, tt.travel_destination, tt.total, cust.name as cust_name, '
                        . 'CONCAT_WS(" ", staff.firstname, staff.lastname) as staff_name, tkt.number,tt.comments');
		$this->db->from('ticket_approval AS ta');
		$this->db->join('ticket_transport AS tt', 'ta.ticket_transport_id=tt.ticket_transport_id', 'LEFT');
		$this->db->join('transport as trans', 'tt.transport_id=trans.transport_id', 'LEFT');
		$this->db->join('ticket AS tkt', 'ta.ticket_id=tkt.ticket_id', 'LEFT');
		$this->db->join('customer as cust', 'tkt.cust_id=cust.id', 'LEFT');
		$this->db->join('ticket__cdata AS cdata', 'tkt.ticket_id=cdata.ticket_id', 'LEFT');
		$this->db->join('staff AS staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
		$this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->where('ta.approver_id', $id);
        return $this->db->get()->result();
    }

	

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    // update batch data
    function update_approvals($arr_id, $data) {
        $this->db->where_in($this->id, $arr_id);
        $this->db->where('approver_id', $this->session->userdata('id'));
        $this->db->update($this->table, $data);
        //echo "<br> str ".$this->db->last_query();exit;
    }
    
    // get data by id
    function get_by_ticket_id($ticket_id, $approval_type) {
        $this->db->where('ticket_id', $ticket_id);
        $this->db->where('approval_type', $approval_type);
        $query = $this->db->get('ticket_approval');
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }

}

/* End of file Dq_user_model.php */