<?php

/* Location: ./application/models/Dq_user_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:09:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ticket_transport_model extends CI_Model {

    public $table = 'ticket_transport';
    public $id = 'ticket_transport_id';
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
    function get_all_transport() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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
    
    // get all data array
    function get_all_transport_details_by_ticket_id($ticket_id) {
        // set this to false so that _protect_identifiers skips escaping:
        $this->db->protect_identifiers(FALSE);
        
        $this->db->select('*,DATE_FORMAT(ticket_transport.travel_date, "%Y-%m-%d") as travel_date');
        $this->db->join('ticket_approval', 'ticket_approval.ticket_transport_id = ticket_transport.ticket_transport_id AND ticket_approval.ticket_id = ticket_transport.ticket_id', 'LEFT');
        $this->db->join('transport as trans', 'ticket_transport.transport_id=trans.transport_id', 'LEFT');
        $this->db->where($this->table.'.ticket_id', $ticket_id);
        $this->db->order_by("FIELD ( approval_state, 'approved', 'rejected', 'pending' )");
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();
        
        // important to set this back to TRUE or ALL of your queries from now on will be non-escaped:
        $this->db->protect_identifiers(TRUE);

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }
    
    // delete data
    function delete_transport_by_ticket_id($ticket_id,$staff_name) {
        //$this->db->join('ticket_approval', 'ticket_approval.ticket_transport_id = ticket_transport.ticket_transport_id  AND ticket_approval.ticket_id = ticket_transport.ticket_id', 'INNER');
        $this->db->where('ticket_transport.ticket_id', $ticket_id);
        $this->db->where("ticket_transport_id in (select ticket_transport_id from ticket_approval where approval_state = 'pending' )");
        $this->db->where('ticket_transport.staff_name', $staff_name);
        $this->db->delete($this->table);
        
        $this->db->where('ticket_approval.ticket_id', $ticket_id);
        $this->db->where("approval_state", 'pending');
        $this->db->delete('ticket_approval');
    }

}

/* End of file Dq_user_model.php */