<?php


/* Location: ./application/models/Staff_details_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-24 18:44:08 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_details_model extends CI_Model
{

    public $table = 'staff_details';
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
    function get_all_staff_details()
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
    function get_staff_details($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('staff_id', $q);
	$this->db->or_like('firstname', $q);
	$this->db->or_like('lastname', $q);
	$this->db->or_like('father_name', $q);
	$this->db->or_like('husband_name', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('phone_ext', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('home_phone', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('dob_place', $q);
	$this->db->or_like('martial_status', $q);
	$this->db->or_like('children', $q);
	$this->db->or_like('occupation', $q);
	$this->db->or_like('joined_date', $q);
	$this->db->or_like('education', $q);
	$this->db->or_like('specialization', $q);
	$this->db->or_like('achivement_awards', $q);
	$this->db->or_like('events_attended', $q);
	$this->db->or_like('event_trained', $q);
	$this->db->or_like('fulltime', $q);
	$this->db->or_like('sms_notification', $q);
	$this->db->or_like('isadmin', $q);
	$this->db->or_like('isvisible', $q);
	$this->db->or_like('onvacation', $q);
	$this->db->or_like('assigned_only', $q);
	$this->db->or_like('change_passwd', $q);
	$this->db->or_like('max_page_size', $q);
	$this->db->or_like('auto_refresh_rate', $q);
	$this->db->or_like('default_signature_type', $q);
	$this->db->or_like('default_paper_size', $q);
	$this->db->or_like('extra', $q);
	$this->db->or_like('permissions', $q);
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
        $this->db->like('staff_id', $q);
	$this->db->or_like('firstname', $q);
	$this->db->or_like('lastname', $q);
	$this->db->or_like('father_name', $q);
	$this->db->or_like('husband_name', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('phone_ext', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('home_phone', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('dob_place', $q);
	$this->db->or_like('martial_status', $q);
	$this->db->or_like('children', $q);
	$this->db->or_like('occupation', $q);
	$this->db->or_like('joined_date', $q);
	$this->db->or_like('education', $q);
	$this->db->or_like('specialization', $q);
	$this->db->or_like('achivement_awards', $q);
	$this->db->or_like('events_attended', $q);
	$this->db->or_like('event_trained', $q);
	$this->db->or_like('fulltime', $q);
	$this->db->or_like('sms_notification', $q);
	$this->db->or_like('isadmin', $q);
	$this->db->or_like('isvisible', $q);
	$this->db->or_like('onvacation', $q);
	$this->db->or_like('assigned_only', $q);
	$this->db->or_like('change_passwd', $q);
	$this->db->or_like('max_page_size', $q);
	$this->db->or_like('auto_refresh_rate', $q);
	$this->db->or_like('default_signature_type', $q);
	$this->db->or_like('default_paper_size', $q);
	$this->db->or_like('extra', $q);
	$this->db->or_like('permissions', $q);
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

/* End of file Staff_details_model.php */