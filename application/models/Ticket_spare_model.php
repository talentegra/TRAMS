<?php

/* Location: ./application/models/Dq_user_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:09:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ticket_spare_model extends CI_Model {

    public $table = 'ticket_spare';
    public $id = 'spare_id';
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
    function get_all_spare_details_by_ticket_id($ticket_id) {
        $this->db->select($this->table.'.*,DATE_FORMAT(ticket_spare.spare_replace_date, "%Y-%m-%d") as spare_replace_date');
        $this->db->where($this->table.'.ticket_id', $ticket_id);
        //$this->db->order_by($this->id, $this->order);
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }
    
    // delete data
    function delete_spare_by_ticket_id($ticket_id) {
        $this->db->where('ticket_id', $ticket_id);
        $this->db->delete($this->table);
    }

}

/* End of file Dq_user_model.php */