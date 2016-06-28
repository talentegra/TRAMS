<?php


/* Location: ./application/models/Branch_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:46:32 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branch_model extends CI_Model
{

    public $table = 'branch';
    public $id = 'branch_id';
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
    function get_all_branch()
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
    function get_branch($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
	$this->db->select('branch.*,CONCAT(staff_details.firstname, " ", staff_details.lastname) as manager_name,
					branch_type.branch_type_name as branch_type_name,status.status as status_name,
					city.city_name as city_name,country.country_name as country_name');
	$this->db->join('staff_details', 'staff_details.staff_id=branch.manager_id', 'LEFT');
	$this->db->join('branch_type', 'branch_type.branch_type_id=branch.branch_type', 'LEFT');
	$this->db->join('status', 'status.status_id=branch.branch_status', 'LEFT');
	$this->db->join('city', 'city.city_id=branch.city_id', 'LEFT');
	$this->db->join('country', 'country.country_id=branch.country_id', 'LEFT');
       $this->db->like('branch.branch_id', $q);
	$this->db->or_like('branch.branch_code', $q);
	$this->db->or_like('branch_type.branch_type_name', $q);
	$this->db->or_like('branch.branch_name', $q);
	$this->db->or_like('branch.branch_reg_date', $q);
	$this->db->or_like('branch.branch_address', $q);
	$this->db->or_like('branch.branch_area', $q);
	$this->db->or_like('branch.land_mark', $q);
	$this->db->or_like('city.city_name', $q);
	$this->db->or_like('branch.zipcode', $q);
	$this->db->or_like('country.country_name', $q);
	$this->db->or_like('branch.phone', $q);
	$this->db->or_like('branch.mobile', $q);
	$this->db->or_like('branch.email_id', $q);
	$this->db->or_like('CONCAT(staff_details.firstname, " ", staff_details.lastname)', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL) {
	$this->db->select('branch.*,CONCAT(staff_details.firstname, " ", staff_details.lastname) as manager_name,
						branch_type.branch_type_name as branch_type_name,status.status as status_name,
						city.city_name as city_name,country.country_name as country_name');
	$this->db->join('staff_details', 'staff_details.staff_id=branch.manager_id', 'LEFT');
	$this->db->join('branch_type', 'branch_type.branch_type_id=branch.branch_type', 'LEFT');
	$this->db->join('status', 'status.status_id=branch.branch_status', 'LEFT');
	$this->db->join('city', 'city.city_id=branch.city_id', 'LEFT');
	$this->db->join('country', 'country.country_id=branch.country_id', 'LEFT');
	
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
        $this->db->like('branch.branch_id', $q);
	$this->db->or_like('branch.branch_code', $q);
	$this->db->or_like('branch_type.branch_type_name', $q);
	$this->db->or_like('branch.branch_name', $q);
	$this->db->or_like('branch.branch_reg_date', $q);
	$this->db->or_like('branch.branch_address', $q);
	$this->db->or_like('branch.branch_area', $q);
	$this->db->or_like('branch.land_mark', $q);
	$this->db->or_like('city.city_name', $q);
	$this->db->or_like('branch.zipcode', $q);
	$this->db->or_like('country.country_name', $q);
	$this->db->or_like('branch.phone', $q);
	$this->db->or_like('branch.mobile', $q);
	$this->db->or_like('branch.email_id', $q);
	$this->db->or_like('CONCAT(staff_details.firstname, " ", staff_details.lastname)', $q);
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

/* End of file Branch_model.php */