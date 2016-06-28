<?php
/* 
 * Generated by CRUDigniter v2.1 Beta 
 * www.crudigniter.com
 */
 
class Faculty_admin_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get faculty_admin by id
     */
    function get_faculty_admin($id)
    {
        return $this->db->get_where('faculty_admins',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all faculty_admins
     */
    function get_all_faculty_admins()
    {
        return $this->db->get('faculty_admins')->result_array();
    }
    
    /*
     * function to add new faculty_admin
     */
    function add_faculty_admin($params)
    {
        $this->db->insert('faculty_admins',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update faculty_admin
     */
    function update_faculty_admin($id,$params)
    {
        $this->db->where('id',$id);
        $this->db->update('faculty_admins',$params);
    }
    
    /*
     * function to delete faculty_admin
     */
    function delete_faculty_admin($id)
    {
        $this->db->delete('faculty_admins',array('id'=>$id));
    }
	
	/*
     * function to delete faculty_admin
     */
    function delete_faculty_admin_by_user_id($id)
    {
		$this->db->where('user_id', $id);
		$this->db->delete('faculty_admins');
    }
	
	/*
     * function to delete faculty_admin
     */
    function delete_faculty_admin_by_faculty_id($id)
    {
		$this->db->where('faculty_id', $id);
		$this->db->delete('faculty_admins');
    }
	
	
	/*
     * Get all faculty_admins
     */
    function get_all_faculty_admins_details()
    {
       // return $this->db->get('faculty_admins')->result_array();
		$this->db->select('faculty_admins.*,users.first_name,users.last_name,faculty.faculty_name');
		$this->db->from('faculty_admins');
		$this->db->join('users', 'users.id = faculty_admins.user_id');
		$this->db->join('faculty', 'faculty.id = faculty_admins.faculty_id');
		$this->db->where('faculty.active','1');
		$this->db->where('users.active','1');
		return $this->db->get()->result_array();
    }
	/*
     * function to add new branch_admin
     */
    function add_faculty_admin_in_batch($params)
    {
        $this->db->insert_batch('faculty_admins',$params);
        return $this->db->insert_id();
    }
}