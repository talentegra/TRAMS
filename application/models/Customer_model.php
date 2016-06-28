<?php


/* Location: ./application/models/Customer_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:09:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_model extends CI_Model
{

    public $table = 'customer';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('cust.*, cust_type.name as cust_type');
		$this->db->from('customer AS cust');
		$this->db->join('customer_type AS cust_type', 'cust_type.id=cust.cust_type', 'LEFT');
		//$result = $this->db->get();
		$this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
		
		
		//$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result();
    }
	
	// get all data array
    function get_all_customer()
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
    function get_customer($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('cust_type', $q);
	$this->db->or_like('manager', $q);
	$this->db->or_like('manager_mobile', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('domain', $q);
	$this->db->or_like('extra', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('cust_type', $q);
	$this->db->or_like('manager', $q);
	$this->db->or_like('manager_mobile', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('domain', $q);
	$this->db->or_like('extra', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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
    
    // get search related data
    function get_company_name($search) {

        $this->db->select('id,name');
        $this->db->like('name', $search, 'both');
        $query = $this->db->get($this->table);
        $result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }
	
	
	 //Get unique customer
    function get_unique_customer() {
        $this->db->select("name");
        $query = $this->db->get('customer');
        //echo "<br> str ".$this->db->last_query();exit;

        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }
	
	
	 // update data
    function update_by_customer($customer, $data) {
        $this->db->where('name', $customer);
        $this->db->update($this->table, $data);
    }



}

/* End of file Customer_model.php */