<?php


/* Location: ./application/models/Categories_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-27 17:18:47 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories_model extends CI_Model
{

    public $table = 'categories';
    public $id = 'category_id';
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
    function get_all_categories()
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
    function get_categories($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
	$this->db->select('categories.*,categories1.category_name as parent_name');
	$this->db->join('categories as categories1', 'categories1.category_id=categories.parent_id', 'LEFT');
        $this->db->like('categories.category_id', $q);
	$this->db->or_like('categories1.category_name', $q);
	$this->db->or_like('categories.category_name', $q);
	$this->db->or_like('categories.active', $q);
	$this->db->or_like('categories.created', $q);
	$this->db->or_like('categories.updated', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL) {
	$this->db->select('categories.*,categories1.category_name as parent_name');
	$this->db->join('categories as categories1', 'categories1.category_id=categories.parent_id', 'LEFT');
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
        $this->db->like('categories.category_id', $q);
	$this->db->or_like('categories1.category_name', $q);
	$this->db->or_like('categories.category_name', $q);
	$this->db->or_like('categories.active', $q);
	$this->db->or_like('categories.created', $q);
	$this->db->or_like('categories.updated', $q);
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

/* End of file Categories_model.php */