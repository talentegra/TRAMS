<?php

/* Location: ./application/models/Dept_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-21 19:15:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_template_model extends CI_Model {

    public $table = 'email_template';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all data in an array 
    function get_all_templates() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('pid', $q);
        $this->db->or_like('tpl_id', $q);
        $this->db->or_like('sla_id', $q);
        $this->db->or_like('email_id', $q);
        $this->db->or_like('autoresp_email_id', $q);
        $this->db->or_like('manager_id', $q);
        $this->db->or_like('flags', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('signature', $q);
        $this->db->or_like('ispublic', $q);
        $this->db->or_like('group_membership', $q);
        $this->db->or_like('ticket_auto_response', $q);
        $this->db->or_like('message_auto_response', $q);
        $this->db->or_like('path', $q);
        $this->db->or_like('updated', $q);
        $this->db->or_like('created', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('pid', $q);
        $this->db->or_like('tpl_id', $q);
        $this->db->or_like('sla_id', $q);
        $this->db->or_like('email_id', $q);
        $this->db->or_like('autoresp_email_id', $q);
        $this->db->or_like('manager_id', $q);
        $this->db->or_like('flags', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('signature', $q);
        $this->db->or_like('ispublic', $q);
        $this->db->or_like('group_membership', $q);
        $this->db->or_like('ticket_auto_response', $q);
        $this->db->or_like('message_auto_response', $q);
        $this->db->or_like('path', $q);
        $this->db->or_like('updated', $q);
        $this->db->or_like('created', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

    function display_list($id=0) {

        $qry = 'SELECT dept.*,dept.id as id,dept.name as name, dept.signature as signature, count(staff.staff_id) as users 
             FROM department dept 
             LEFT JOIN staff staff ON (dept.id=staff.dept_id) 
             WHERE dept.id=' . $id .
                ' GROUP BY dept.id';
        return $this->db->query($qry)->result_array();
    }

    function get_staff_by_dept_id($dept_id) {
        $this->db->where('staff.staff_id', $staff_id);
        $this->db->join('staff', 'staff.dept_id = department.id', 'LEFT');
        $this->db->join('arbac_users', 'arbac_users.id=staff.staff_id', 'LEFT');
        $this->db->where($this->id, $dept_id);
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

/* End of file Dept_model.php */