<?php


/* Location: ./application/models/Sla_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-21 21:21:30 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ticket_sla_model extends CI_Model
{

    public $table = 'ticket_sla';
    public $id = 'ticket_sla_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get all
    function get_all_sla()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('flags', $q);
	$this->db->or_like('grace_period', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('notes', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('flags', $q);
	$this->db->or_like('grace_period', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('notes', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    // update data
    function update_by_ticket_id($ticket_id, $data)
    {
        $this->db->where('ticket_id', $ticket_id);
        $this->db->update($this->table, $data);
    }

}

/* End of file Sla_model.php */