<?php


/* Location: ./application/models/Batches_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-27 20:21:04 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batches_model extends CI_Model
{

    public $table = 'batches';
    public $id = 'batch_id';
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
    function get_all_batches()
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
    function get_batches($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
		
	$this->db->join('branch', 'branch.branch_id=batches.branch_id', 'LEFT');
	$this->db->join('staff_details', 'staff_details.staff_id=batches.faculty_id', 'LEFT');
	$this->db->join('courses_catalog', 'courses_catalog.course_id=batches.course_id', 'LEFT');
	$this->db->join('batch_pattern', 'batch_pattern.batch_pattern_id=batches.batch_pattern', 'LEFT');
	$this->db->join('batch_type', 'batch_type.batch_type_id=batches.batch_type', 'LEFT');
	$this->db->join('currency', 'currency.currency_id=batches.currency_id', 'LEFT');
	$this->db->join('course_fee_type', 'course_fee_type.course_fee_type_id=batches.course_fee_type', 'LEFT');
	$this->db->join('course_fee_type as batch_fee_type', 'batch_fee_type.course_fee_type_id=batches.batch_fee_type', 'LEFT');
	
        $this->db->like('batches.batch_id', $q);
	$this->db->or_like('courses_catalog.course_name', $q);
	$this->db->or_like('batches.batch_title', $q);
	$this->db->or_like('batches.description', $q);
	$this->db->or_like('CONCAT(staff_details.firstname, " ", staff_details.lastname)', $q);
	$this->db->or_like('branch.branch_name', $q);
	$this->db->or_like('batch_type.batch_type_name', $q);
	$this->db->or_like('batch_pattern.batch_pattern', $q);
	$this->db->or_like('batches.student_enrolled', $q);
	$this->db->or_like('batches.batch_capacity', $q);
	$this->db->or_like('batches.iscorporate', $q);
	$this->db->or_like('currency.currency_name', $q);
	$this->db->or_like('batch_fee_type.course_fee_type', $q);
	$this->db->or_like('batches.fees', $q);
	$this->db->or_like('course_fee_type.course_fee_type', $q);
	$this->db->or_like('batches.course_fee', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL) {
	$this->db->select('batches.*,branch.branch_name as branch_name,
						CONCAT(staff_details.firstname, " ", staff_details.lastname) as faculty_name,
						courses_catalog.course_name as course_name,batch_pattern.batch_pattern as batch_pattern,
						batch_type.batch_type_name as batch_type_name,currency.currency_name as currency_name,
						course_fee_type.course_fee_type as course_fee_type,
						batch_fee_type.course_fee_type as batch_fee_type');
	$this->db->join('branch', 'branch.branch_id=batches.branch_id', 'LEFT');
	$this->db->join('staff_details', 'staff_details.staff_id=batches.faculty_id', 'LEFT');
	$this->db->join('courses_catalog', 'courses_catalog.course_id=batches.course_id', 'LEFT');
	$this->db->join('batch_pattern', 'batch_pattern.batch_pattern_id=batches.batch_pattern', 'LEFT');
	$this->db->join('batch_type', 'batch_type.batch_type_id=batches.batch_type', 'LEFT');
	$this->db->join('currency', 'currency.currency_id=batches.currency_id', 'LEFT');
	$this->db->join('course_fee_type', 'course_fee_type.course_fee_type_id=batches.course_fee_type', 'LEFT');
	$this->db->join('course_fee_type as batch_fee_type', 'batch_fee_type.course_fee_type_id=batches.batch_fee_type', 'LEFT');
	
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
        $this->db->like('batches.batch_id', $q);
	$this->db->or_like('courses_catalog.course_name', $q);
	$this->db->or_like('batches.batch_title', $q);
	$this->db->or_like('batches.description', $q);
	$this->db->or_like('CONCAT(staff_details.firstname, " ", staff_details.lastname)', $q);
	$this->db->or_like('branch.branch_name', $q);
	$this->db->or_like('batch_type.batch_type_name', $q);
	$this->db->or_like('batch_pattern.batch_pattern', $q);
	$this->db->or_like('batches.student_enrolled', $q);
	$this->db->or_like('batches.batch_capacity', $q);
	$this->db->or_like('batches.iscorporate', $q);
	$this->db->or_like('currency.currency_name', $q);
	$this->db->or_like('batch_fee_type.course_fee_type', $q);
	$this->db->or_like('batches.fees', $q);
	$this->db->or_like('course_fee_type.course_fee_type', $q);
	$this->db->or_like('batches.course_fee', $q);
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

/* End of file Batches_model.php */