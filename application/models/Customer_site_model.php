<?php


/* Location: ./application/models/Customer_site_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:14:12 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_site_model extends CI_Model
{

    public $table = 'customer_site';
    public $id = 'site_id';
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
    function get_all_customer_site()
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
    function get_customer_site($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('cust_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('pincode', $q);
	$this->db->or_like('location', $q);
	$this->db->or_like('area', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('phone_ext', $q);
	$this->db->or_like('manager', $q);
	$this->db->or_like('manager_mobile', $q);
	$this->db->or_like('manager_email', $q);
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
	$this->db->or_like('cust_id', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('pincode', $q);
	$this->db->or_like('location', $q);
	$this->db->or_like('area', $q);
	$this->db->or_like('city', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('phone_ext', $q);
	$this->db->or_like('manager', $q);
	$this->db->or_like('manager_mobile', $q);
	$this->db->or_like('manager_email', $q);
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
    function get_cust_site_pincode($search,$user_id = 0) {

        $this->db->select('customer_site.site_id as id,postcode as pin');
        $this->db->like('postcode', $search, 'both');
        if($user_id > 0) {
            $this->db->where('user_customer_site.user_id', $user_id);
        }
        $this->db->join('user_customer_site','user_customer_site.site_id = customer_site.site_id','LEFT');
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
	
    // get data array by id
    function load_site_info($site_id) {
        $this->db->select('*,customer_site.address as store_address');
        $this->db->join('user_customer_site','user_customer_site.site_id = customer_site.site_id','LEFT');
        $this->db->join('dq_user','dq_user.id = user_customer_site.user_id','LEFT');
        $this->db->join('user_email','dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id','LEFT');
        $this->db->where('customer_site.'.$this->id, $site_id);
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
    
    // get search related data
    function get_site_details_by_fields($search,$field=NULL,$user_id = 0) {

        $this->db->select('*,customer_site.company as comp_name,customer_site.name as cust_name');
        if($field != NULL) {
            $this->db->like($field, $search, 'both');
        }
        if($user_id > 0) {
            $this->db->where('user_customer_site.user_id', $user_id);
        }
        $this->db->join('user_customer_site','user_customer_site.site_id = customer_site.site_id','LEFT');
        $this->db->join('dq_user','dq_user.id = user_customer_site.user_id','LEFT');
        $this->db->join('user_email','dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id','LEFT');
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

}

/* End of file Customer_site_model.php */