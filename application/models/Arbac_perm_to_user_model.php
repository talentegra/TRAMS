<?php

/* Location: ./application/models/Staff_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-20 03:31:15 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Arbac_perm_to_user_model extends CI_Model {

    public $table = 'arbac_perm_to_user';
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
    function get_perm_by_staff($staff_id) {
        $this->db->select('perm_id');
        $this->db->where('user_id', $staff_id);
        
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
        $this->db->where('user_id', $id);
        $this->db->delete($this->table);
    }
    
    // insert data
    function insert_batch($data) {
        $this->db->insert_batch($this->table, $data);
    }

}

/* End of file Staff_model.php */