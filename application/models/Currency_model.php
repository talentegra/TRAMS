<?php


/* Location: ./application/models/Currency_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-22 21:32:26 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Currency_model extends CI_Model
{

    public $table = 'currency';
    public $id = 'currency_id';
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
    function get_all_currency()
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
    function get_currency($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('currency_id', $q);
	$this->db->or_like('currency_name', $q);
	$this->db->or_like('currency_symbol', $q);
	$this->db->or_like('currency_short', $q);
	$this->db->or_like('country_id', $q);
	$this->db->or_like('conversion', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('created', $q);
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
        $this->db->like('currency_id', $q);
	$this->db->or_like('currency_name', $q);
	$this->db->or_like('currency_symbol', $q);
	$this->db->or_like('currency_short', $q);
	$this->db->or_like('country_id', $q);
	$this->db->or_like('conversion', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('created', $q);
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

/* End of file Currency_model.php */