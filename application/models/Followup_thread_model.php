<?php


/* Location: ./application/models/Followup_thread_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-24 13:47:22 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Followup_thread_model extends CI_Model
{

    public $table = 'followup_thread';
    public $id = '';
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
    function get_all_followup_thread()
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
    function get_followup_thread($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL,$type='') {
    $this->db->select('followup_thread.*,CONCAT(leads.first_name, " ", leads.middle_name, " ", leads.last_name) as leads_name');
	$this->db->join('leads', 'leads.lead_id=followup_thread.lead_id', 'LEFT');
	$this->db->group_start();
	$this->db->or_like('CONCAT(leads.first_name, " ", leads.middle_name, " ", leads.last_name)', $q);
	$this->db->or_like('followup_thread.followup_type', $q);
	$this->db->or_like('followup_thread.interest_level', $q);
	$this->db->or_like('followup_thread.followup_date', $q);
	$this->db->or_like('followup_thread.followup_action', $q);
	$this->db->or_like('followup_thread.followup_comments', $q);
	$this->db->or_like('followup_thread.next_followup_date', $q);
	$this->db->or_like('followup_thread.next_followup_action', $q);
	$this->db->or_like('followup_thread.staff_id', $q);
	$this->db->or_like('followup_thread.status', $q);
	$this->db->group_end();
	
	if($type=='overdue'){
		$this->db->where('DATE(followup_thread.followup_date) < DATE(NOW())', null);
	}
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL,$type='') {
	$this->db->select('followup_thread.*,CONCAT(leads.first_name, " ", leads.middle_name, " ", leads.last_name) as leads_name,
						interest_level.interest_level as interest_level_name,followup_action.followup_action as followup_action_name,
						next_followup_action.followup_action as next_followup_action_name,
						CONCAT(staff_details.firstname, " ", staff_details.lastname) as staff_name');
	$this->db->join('leads', 'leads.lead_id=followup_thread.lead_id', 'LEFT');
	$this->db->join('interest_level', 'interest_level.interest_level_id=followup_thread.interest_level', 'LEFT');
	$this->db->join('followup_action', 'followup_action.followup_action_id=followup_thread.followup_action', 'LEFT');
	$this->db->join('followup_action as next_followup_action', 'next_followup_action.followup_action_id=followup_thread.next_followup_action', 'LEFT');
	$this->db->join('staff_details', 'staff_details.staff_id=followup_thread.staff_id', 'LEFT');
	
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
	$this->db->group_start();
	$this->db->or_like('CONCAT(leads.first_name, " ", leads.middle_name, " ", leads.last_name)', $q);
	$this->db->or_like('followup_thread.followup_type', $q);
	$this->db->or_like('interest_level.interest_level', $q);
	$this->db->or_like('followup_thread.followup_date', $q);
	$this->db->or_like('followup_action.followup_action', $q);
	$this->db->or_like('followup_thread.followup_comments', $q);
	$this->db->or_like('followup_thread.next_followup_date', $q);
	$this->db->or_like('next_followup_action.followup_action', $q);
	$this->db->or_like('followup_thread.staff_id', $q);
	$this->db->or_like('followup_thread.status', $q);
	$this->db->group_end();
	
	if($type=='overdue'){
		$this->db->where('DATE(followup_thread.followup_date) < DATE(NOW())', null);
	}
	
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
	
	// check_exist
    function check_exist($val,$col,$id)
    {
        $this->db->where($col, $val);
		if($id){
		$this->db->where($this->id.' !=', $id);
		}
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

}

/* End of file Followup_thread_model.php */