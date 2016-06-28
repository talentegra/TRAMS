<?php


/* Location: ./application/models/Company_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:47:05 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_model extends CI_Model
{

    public $table = 'company';
    public $id = 'company_id';
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
    function get_all_company()
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
    function get_company($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('company_id', $q);
	$this->db->or_like('company_name', $q);
	$this->db->or_like('company_address', $q);
	$this->db->or_like('city_id', $q);
	$this->db->or_like('company_pincode', $q);
	$this->db->or_like('company_email', $q);
	$this->db->or_like('company_domain', $q);
	$this->db->or_like('company_phone', $q);
	$this->db->or_like('company_contact_name', $q);
	$this->db->or_like('company_contact_email', $q);
	$this->db->or_like('company_contact_mobile', $q);
	$this->db->or_like('company_discount', $q);
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
        $this->db->like('company_id', $q);
	$this->db->or_like('company_name', $q);
	$this->db->or_like('company_address', $q);
	$this->db->or_like('city_id', $q);
	$this->db->or_like('company_pincode', $q);
	$this->db->or_like('company_email', $q);
	$this->db->or_like('company_domain', $q);
	$this->db->or_like('company_phone', $q);
	$this->db->or_like('company_contact_name', $q);
	$this->db->or_like('company_contact_email', $q);
	$this->db->or_like('company_contact_mobile', $q);
	$this->db->or_like('company_discount', $q);
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

/* End of file Company_model.php */