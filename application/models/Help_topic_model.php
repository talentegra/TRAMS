<?php


/* Location: ./application/models/Help_topic_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:23:56 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Help_topic_model extends CI_Model
{

    public $table = 'help_topic';
    public $id = 'topic_id';
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
	
	// get all data array
    function get_all_help_topic()
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
	
	
	// get data array by id
    function get_help_topic($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('topic_id', $q);
	$this->db->or_like('topic_pid', $q);
	$this->db->or_like('isactive', $q);
	$this->db->or_like('ispublic', $q);
	$this->db->or_like('noautoresp', $q);
	$this->db->or_like('flags', $q);
	$this->db->or_like('status_id', $q);
	$this->db->or_like('priority_id', $q);
	$this->db->or_like('dept_id', $q);
	$this->db->or_like('staff_id', $q);
	$this->db->or_like('team_id', $q);
	$this->db->or_like('sla_id', $q);
	$this->db->or_like('page_id', $q);
	$this->db->or_like('sequence_id', $q);
	$this->db->or_like('sort', $q);
	$this->db->or_like('topic', $q);
	$this->db->or_like('number_format', $q);
	$this->db->or_like('notes', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('topic_id', $q);
	$this->db->or_like('topic_pid', $q);
	$this->db->or_like('isactive', $q);
	$this->db->or_like('ispublic', $q);
	$this->db->or_like('noautoresp', $q);
	$this->db->or_like('flags', $q);
	$this->db->or_like('status_id', $q);
	$this->db->or_like('priority_id', $q);
	$this->db->or_like('dept_id', $q);
	$this->db->or_like('staff_id', $q);
	$this->db->or_like('team_id', $q);
	$this->db->or_like('sla_id', $q);
	$this->db->or_like('page_id', $q);
	$this->db->or_like('sequence_id', $q);
	$this->db->or_like('sort', $q);
	$this->db->or_like('topic', $q);
	$this->db->or_like('number_format', $q);
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

}

/* End of file Help_topic_model.php */