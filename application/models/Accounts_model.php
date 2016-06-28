<?php


/* Location: ./application/models/Accounts_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:45:32 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounts_model extends CI_Model
{

    public $table = 'accounts';
    public $id = 'account_id';
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
    function get_all_accounts()
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
    function get_accounts($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('account_id', $q);
	$this->db->or_like('payee_name', $q);
	$this->db->or_like('amount_type', $q);
	$this->db->or_like('branch_id', $q);
	$this->db->or_like('payable_for', $q);
	$this->db->or_like('student_id', $q);
	$this->db->or_like('total_amount', $q);
	$this->db->or_like('primary_date', $q);
	$this->db->or_like('due_date', $q);
	$this->db->or_like('payment_type', $q);
	$this->db->or_like('account_type', $q);
	$this->db->or_like('paid_amount', $q);
	$this->db->or_like('due_amount', $q);
	$this->db->or_like('payment_date', $q);
	$this->db->or_like('payment_mode_id', $q);
	$this->db->or_like('comments', $q);
	$this->db->or_like('account_status', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL) {
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
        $this->db->like('account_id', $q);
	$this->db->or_like('payee_name', $q);
	$this->db->or_like('amount_type', $q);
	$this->db->or_like('branch_id', $q);
	$this->db->or_like('payable_for', $q);
	$this->db->or_like('student_id', $q);
	$this->db->or_like('total_amount', $q);
	$this->db->or_like('primary_date', $q);
	$this->db->or_like('due_date', $q);
	$this->db->or_like('payment_type', $q);
	$this->db->or_like('account_type', $q);
	$this->db->or_like('paid_amount', $q);
	$this->db->or_like('due_amount', $q);
	$this->db->or_like('payment_date', $q);
	$this->db->or_like('payment_mode_id', $q);
	$this->db->or_like('comments', $q);
	$this->db->or_like('account_status', $q);
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

/* End of file Accounts_model.php */