<?php

/* Location: ./application/models/Staff_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-20 03:31:15 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_dept_access_model extends CI_Model {

    public $table = 'staff_dept_access';
    public $id = 'staff_id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_dept_role_by_staff($staff_id) {
        $this->db->select('*');
        $this->db->where('staff_id', $staff_id);
        //$this->db->where('dept_id', $dept_id);
        
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
	
	
	// get data by id
	function get_role_by_staff_dept_id($staff_id, $ticket_dept_id) {
		$this->db->select('*');
		$this->db->where('staff_id', $staff_id);
		$this->db->where('dept_id', $ticket_dept_id);

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


    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    // update data
    function update_role_to_default($role_id,$data) {
        $this->db->where('role_id', $role_id);
        $this->db->update($this->table, $data);
    }
    
    // insert data
    function insert_batch($data) {
        $this->db->insert_batch($this->table, $data);
    }

}

/* End of file Staff_model.php */