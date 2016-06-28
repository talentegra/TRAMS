<?php


/* Location: ./application/models/Serial_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-30 01:48:01 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Serial_model extends CI_Model
{

    public $table = 'serial';
    public $id = 'serial_id';
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
    function get_all_serial()
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
    function get_serial($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('serial_id', $q);
	$this->db->or_like('model_no', $q);
	$this->db->or_like('serial_no', $q);
	$this->db->or_like('manufacturer', $q);
	$this->db->or_like('invoice_date', $q);
	$this->db->or_like('invoice_no', $q);
	$this->db->or_like('billing_name', $q);
	$this->db->or_like('billing_address', $q);
	$this->db->or_like('billing_location', $q);
	$this->db->or_like('billing_customer_type', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('serial_id', $q);
	$this->db->or_like('model_no', $q);
	$this->db->or_like('serial_no', $q);
	$this->db->or_like('manufacturer', $q);
	$this->db->or_like('invoice_date', $q);
	$this->db->or_like('invoice_no', $q);
	$this->db->or_like('billing_name', $q);
	$this->db->or_like('billing_address', $q);
	$this->db->or_like('billing_location', $q);
	$this->db->or_like('billing_customer_type', $q);
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
    
    // get search related data
    function get_search_serial($search) {
        
        //$this->db->select('customer.name as company_name,dq_user.name as name,address,mobile_no');
        $this->db->select('*');
        $this->db->like('serial_no', $search, 'after');
        $this->db->limit(5);
        $this->db->order_by('serial_no','ASC');
        
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }
    
    // load serail data
    function load_serial_info($serial_id) {
        
        $this->db->select('*');
        
        $this->db->where('serial_id', $serial_id);
        
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }
	
	 //Get unique serial_no
    function get_unique_serial_no() {
        $this->db->select("serial_no");
        $query = $this->db->get('serial');
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
    function update_by_serial_no($serial_no, $data) {
        $this->db->where('serial_no', $serial_no);
        $this->db->update($this->table, $data);
    }
	
	//get all data array
	function get_all_serial_ajax($params = array()) {
        $this->db->select('*');
        $this->db->from('serial');
		
		if (array_key_exists("frm_search_keyword", $params)) {
            if ($params['frm_search_keyword'] != 'undefined' && $params['frm_search_keyword'] != '') {
                $this->db->like("Concat(IFNULL(model_no, ''), '', IFNULL(serial_no, ''), '', IFNULL(manufacturer, ''), '', IFNULL(invoice_date, ''), '', 
				IFNULL(invoice_no, ''), '', IFNULL(billing_name, ''), '', IFNULL(billing_address, ''), '', IFNULL(billing_location, ''), '', 
				IFNULL(billing_cust_type, ''), '', IFNULL(current_cust_name, ''), '', IFNULL(warranty_status, ''), '', IFNULL(created, ''), '', 
				IFNULL(updated, ''))", $params['frm_search_keyword'], 'both');
            }
        }
		
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        if(array_key_exists("sort_column",$params)){
            $this->db->order_by($params['sort_column'], $params['sort_by']);
        }
        else {
            $this->db->order_by($this->id, $this->order);
        }
        
        $query = $this->db->get();
        //echo "<br> str ".$this->db->last_query();
        return ($query->num_rows() > 0) ? $query->result() : FALSE;
        
        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

}

/* End of file Serial_model.php */