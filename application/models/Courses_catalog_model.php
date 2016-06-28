<?php


/* Location: ./application/models/Courses_catalog_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-27 18:48:37 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses_catalog_model extends CI_Model
{

    public $table = 'courses_catalog';
    public $id = 'course_id';
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
    function get_all_courses()
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
    function get_courses($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
	$this->db->select('courses_catalog.*,categories.category_name as category_name,course_fee_type.course_fee_type as course_fee_type');
	$this->db->join('categories', 'categories.category_id=courses_catalog.category_id', 'LEFT');
	$this->db->join('course_fee_type', 'course_fee_type.course_fee_type_id=courses_catalog.course_fee_type', 'LEFT');
	
    $this->db->like('courses_catalog.course_id', $q);
	$this->db->or_like('categories.category_name', $q);
	$this->db->or_like('courses_catalog.course_code', $q);
	$this->db->or_like('courses_catalog.course_name', $q);
	$this->db->or_like('courses_catalog.course_summary', $q);
	$this->db->or_like('courses_catalog.course_contents', $q);
	$this->db->or_like('courses_catalog.course_duration', $q);
	$this->db->or_like('course_fee_type.course_fee_type', $q);
	$this->db->or_like('courses_catalog.notes', $q);
	$this->db->or_like('courses_catalog.active', $q);
	$this->db->or_like('courses_catalog.created', $q);
	$this->db->or_like('courses_catalog.updated', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL) {
	$this->db->select('courses_catalog.*,categories.category_name as category_name,course_fee_type.course_fee_type as course_fee_type');
	$this->db->join('categories', 'categories.category_id=courses_catalog.category_id', 'LEFT');
	$this->db->join('course_fee_type', 'course_fee_type.course_fee_type_id=courses_catalog.course_fee_type', 'LEFT');
		if($sort_column == 'course_fee_type'){
		$sort_column = 'course_fee_type.course_fee_type';
		}
		else if($sort_column == 'category_name'){
		$sort_column = 'categories.category_name';
		}
		else {
		$sort_column = 'courses_catalog.'.$sort_column;	
		}
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
        $this->db->like('courses_catalog.course_id', $q);
	$this->db->or_like('categories.category_name', $q);
	$this->db->or_like('courses_catalog.course_code', $q);
	$this->db->or_like('courses_catalog.course_name', $q);
	$this->db->or_like('courses_catalog.course_summary', $q);
	$this->db->or_like('courses_catalog.course_contents', $q);
	$this->db->or_like('courses_catalog.course_duration', $q);
	$this->db->or_like('course_fee_type.course_fee_type', $q);
	$this->db->or_like('courses_catalog.notes', $q);
	$this->db->or_like('courses_catalog.active', $q);
	$this->db->or_like('courses_catalog.created', $q);
	$this->db->or_like('courses_catalog.updated', $q);
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

/* End of file Courses_catalog_model.php */