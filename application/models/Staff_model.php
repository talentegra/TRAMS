<?php


/* Location: ./application/models/Staff_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-23 21:45:50 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_model extends CI_Model
{

    public $table = 'staff';
    public $id = 'staff_id';
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
    function get_all_staff()
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
    function get_staff($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
	$this->db->select('staff.*,CONCAT(staff_details1.firstname, " ", staff_details1.lastname) as staff_name,organization.name as org_name,branch.branch_name as branch_name,arbac_groups.name as group_name,
						CONCAT(staff_details.firstname, " ", staff_details.lastname) as manager_name,designation.name as designation_name,status.status as status_name');
	$this->db->join('organization', 'organization.id=staff.org_id', 'LEFT');
	$this->db->join('branch', 'branch.branch_id=staff.branch_id', 'LEFT');
	$this->db->join('arbac_groups', 'arbac_groups.id=staff.group_id', 'LEFT');
	$this->db->join('staff_details', 'staff_details.staff_id=staff.manager_id', 'LEFT');
	$this->db->join('designation', 'designation.id=staff.designation_id', 'LEFT');
	$this->db->join('status', 'status.status_id=staff.status', 'LEFT');
	$this->db->join('staff_details as staff_details1', 'staff_details1.staff_id=staff.staff_id', 'LEFT');
       $this->db->like('staff.staff_id', $q);
	$this->db->or_like('organization.name', $q);
	$this->db->or_like('branch.branch_name', $q);
	$this->db->or_like('arbac_groups.name', $q);
	$this->db->or_like('CONCAT(staff_details.firstname, " ", staff_details.lastname)', $q);
	$this->db->or_like('designation.name', $q);
	$this->db->or_like('status.status', $q);
	$this->db->or_like('staff.signature', $q);
	$this->db->or_like('staff.lang', $q);
	$this->db->or_like('staff.timezone', $q);
	$this->db->or_like('staff.locale', $q);
	$this->db->or_like('staff.created', $q);
	$this->db->or_like('staff.updated', $q);
	$this->db->or_like('CONCAT(staff_details1.firstname, " ", staff_details1.lastname)', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL) {
	$this->db->select('staff.*,CONCAT(staff_details1.firstname, " ", staff_details1.lastname) as staff_name,organization.name as org_name,branch.branch_name as branch_name,arbac_groups.name as group_name,
						CONCAT(staff_details.firstname, " ", staff_details.lastname) as manager_name,designation.name as designation_name,status.status as status_name');
	$this->db->join('organization', 'organization.id=staff.org_id', 'LEFT');
	$this->db->join('branch', 'branch.branch_id=staff.branch_id', 'LEFT');
	$this->db->join('arbac_groups', 'arbac_groups.id=staff.group_id', 'LEFT');
	$this->db->join('staff_details', 'staff_details.staff_id=staff.manager_id', 'LEFT');
	$this->db->join('designation', 'designation.id=staff.designation_id', 'LEFT');
	$this->db->join('status', 'status.status_id=staff.status', 'LEFT');
	$this->db->join('staff_details as staff_details1', 'staff_details1.staff_id=staff.staff_id', 'LEFT');
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
        $this->db->like('staff.staff_id', $q);
	$this->db->or_like('organization.name', $q);
	$this->db->or_like('branch.branch_name', $q);
	$this->db->or_like('arbac_groups.name', $q);
	$this->db->or_like('CONCAT(staff_details.firstname, " ", staff_details.lastname)', $q);
	$this->db->or_like('designation.name', $q);
	$this->db->or_like('status.status', $q);
	$this->db->or_like('staff.signature', $q);
	$this->db->or_like('staff.lang', $q);
	$this->db->or_like('staff.timezone', $q);
	$this->db->or_like('staff.locale', $q);
	$this->db->or_like('staff.created', $q);
	$this->db->or_like('staff.updated', $q);
	$this->db->or_like('CONCAT(staff_details1.firstname, " ", staff_details1.lastname)', $q);
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

/* End of file Staff_model.php */