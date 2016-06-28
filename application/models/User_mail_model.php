<?php

/* Location: ./application/models/User_mail_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:09:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_mail_model extends CI_Model {

    public $table = 'user_email';
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

    // get all data array
    function get_all_customer() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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

    // get search related data
    function get_existing_emails($search) {

        $this->db->select('id,address as email');
        $this->db->like('address', $search, 'both');
        $query = $this->db->get($this->table);
        $result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }

    //  search for existing email or insert
    function update_tkt_new_email($data) {
        $this->db->select('*');
        $this->db->where('address', $data['address']);
        $query = $this->db->get($this->table);
        $count = $query->num_rows();
        if ($count == 0) {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    //  check unique email
    function check_unique_email($entered_email, $existing_user_email_id) {
        $this->db->select('*');
        $this->db->where('address', $entered_email);
        if ($existing_user_email_id > 0) {
            $this->db->where("id != ".$existing_user_email_id);
        }
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $count = $query->num_rows();
        //echo "<br> count ".$count;
        if ($count == 0) {
            return 'NEW';
        } else {
            return 'EXIST';
        }
    }

}

/* End of file User_mail_model.php */