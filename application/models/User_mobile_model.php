<?php
/* Location: ./application/models/User_mobile_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:09:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_mobile_model extends CI_Model
{

    public $table = 'user_mobile';
    public $id = 'id';
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
    function get_all_customer()
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
    
    //  check unique mobile
    function check_unique_mobile($entered_mobile, $existing_user_mobile_id) {
        $this->db->select('*');
        $this->db->where('mobile_no', $entered_mobile);
	if ($existing_user_mobile_id > 0) {
            $this->db->where("id != ".$existing_user_mobile_id);
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