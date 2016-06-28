<?php

/* Location: ./application/models/Ticket_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-30 02:57:44 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ticket_model extends CI_Model {

    public $table = 'ticket';
    public $id = 'ticket_id';
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
    function get_all_ticket() {
        $this->db->select('tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.source, tkt.call_logged_company, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, usr.name, tsno.serial_no as serial_no, tsno.model_no as model_no, tsno.manufacturer as manufacturer, status.state, tkt.created as ticket_created, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color');
        $this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'usr.id=umail.user_id', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');

        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id) {


        $this->db->select('status.name as status_name, cust.name as cust_name, cust.phone as cust_phone, tkt.duedate, tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.site_contact_name, 
                    tkt.site_contact_email, tkt.site_contact_mobile, tkt.site_address, tkt.site_location, tkt.alt_contact_name, tkt.alt_contact_email, tkt.alt_contact_mobile, 
                    tkt.ip_address, tsla.isresponsedue, tsla.responseduedate, tsla.duedate as resolutionduedate, tsla.elapsed_resolution_time, tsla.elapsed_resolution_percent, tkt.lastmessage, tkt.lastresponse, umob.mobile_no as mobile, tkt.customer_ticket_id, tkt.source, tkt.call_logged_company, 
                    tsla.sla_resolution_state, tsla.sla_response_state, tsla.response_time, tsla.resolution_time,  tsla.elapsed_response_time, tsla.elapsed_response_percent, tsla.isoverdue as isresolutiondue, tsla.hold_time as hold_time, 
                    tkt.isoverdue, cdata.sla_response_breached_reason, cdata.sla_breached_reason, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, umail.address as email, usr.name, tsno.serial_no as serial_no, 
                    sla.name as sla_type, tsno.model_no as model_no, tsno.manufacturer as manufacturer, tsno.invoice_date, tsno.invoice_no, tsno.billing_name, 
                    tsno.billing_address, tsno.billing_location, tsno.billing_type, sla.name as sla_name, status.state, tkt.created as ticket_created,tkt.updated as ticket_updated, 
                    CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, 
                    IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, 
                    cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color,tkt.dept_id,tkt.staff_id,tkt.user_id,tkt.status_id,
                    issparereceived,issparereplaced,isresolvenote,tkt.closed,cdata.spare_replace_comments,tkt.istravel,sla.grace_period,sla.response_grace_period,
                    sla.exclude_days,cdata.resolution_note,isserial,tkt.dept_id');
        //$this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'umail.id=usr.default_email_id', 'LEFT');
        $this->db->join('user_mobile AS umob', 'umob.id=usr.default_mobile_no', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
	$this->db->join('ticket_sla AS tsla', 'tkt.ticket_id=tsla.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('customer as cust', 'tkt.cust_id=cust.id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');

        $this->db->where('tkt.ticket_id', $id);
        return $this->db->get($this->table . ' AS tkt')->row();
    }

    // get data array by id
    function get_ticket($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ticket_id', $q);
        $this->db->or_like('ticketID', $q);
        $this->db->or_like('dept_id', $q);
        $this->db->or_like('priority_id', $q);
        $this->db->or_like('topic_id', $q);
        $this->db->or_like('staff_id', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('subject', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('ip_address', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('source', $q);
        $this->db->or_like('isoverdue', $q);
        $this->db->or_like('isanswered', $q);
        $this->db->or_like('duedate', $q);
        $this->db->or_like('reopened', $q);
        $this->db->or_like('closed', $q);
        $this->db->or_like('lastmessage', $q);
        $this->db->or_like('firstresponse', $q);
        $this->db->or_like('lastresponse', $q);
        $this->db->or_like('created', $q);
        $this->db->or_like('updated', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ticket_id', $q);
        $this->db->or_like('ticketID', $q);
        $this->db->or_like('dept_id', $q);
        $this->db->or_like('priority_id', $q);
        $this->db->or_like('topic_id', $q);
        $this->db->or_like('staff_id', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('subject', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('ip_address', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('source', $q);
        $this->db->or_like('isoverdue', $q);
        $this->db->or_like('isanswered', $q);
        $this->db->or_like('duedate', $q);
        $this->db->or_like('reopened', $q);
        $this->db->or_like('closed', $q);
        $this->db->or_like('lastmessage', $q);
        $this->db->or_like('firstresponse', $q);
        $this->db->or_like('lastresponse', $q);
        $this->db->or_like('created', $q);
        $this->db->or_like('updated', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
        //echo "<br> str ".$this->db->last_query();exit;
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
    function get_search_user($search, $search_type = NULL) {
        
        //$this->db->select('customer.name as company_name,dq_user.name as name,address,mobile_no');
        $this->db->select('dq_user.id,address as email,mobile_no as phone,customer.name as company_name,dq_user.name as name');

        $this->db->join('user_mobile', 'dq_user.id = user_mobile.user_id AND dq_user.default_mobile_no = user_mobile.id', 'LEFT');
        $this->db->join('user_email', 'dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id', 'LEFT');
        $this->db->join('customer', 'dq_user.org_id = customer.id', 'LEFT');

        if ($search_type == NULL) {
            $this->db->or_like('mobile_no', $search, 'both');
            $this->db->or_like('address', $search, 'both');
            $this->db->or_like('customer.name', $search, 'both');
        } 
        if ($search_type == 'email') {
            $this->db->like('address', $search, 'both');
        } 
        if ($search_type == 'mobile') {
            $this->db->like('mobile_no', $search, 'both');
        }

        $query = $this->db->get('dq_user');
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

    // load user data
    function load_user_info($user_id, $cust_type) {

        //$this->db->select('customer.name as company_name,dq_user.name as name,address,mobile_no');
        $this->db->select('dq_user.id,user_customer_site.site_id,user_email.address as email,user_mobile.mobile_no,dq_user.name as name,
                          customer_site.address as store_address,location,city,postcode,customer_site.phone,internal_note,'
                . 'dq_user.org_id,user_mobile.id as mobile_pk_id,user_email.id as email_pk_id');

        $this->db->join('user_mobile', 'dq_user.id = user_mobile.user_id AND dq_user.default_mobile_no = user_mobile.id', 'LEFT');
        $this->db->join('user_email', 'dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id', 'LEFT');

        if ($cust_type > 0) { //Company
            $this->db->select('customer.name as company_name, customer.cust_type');
            $this->db->join('customer', 'dq_user.org_id = customer.id', 'LEFT');
            $this->db->join('user_customer_site', 'user_customer_site.user_id = dq_user.id AND user_customer_site.cust_id = customer.id', 'LEFT');
        } else { //Individual
            $this->db->join('user_customer_site', 'user_customer_site.user_id = dq_user.id', 'LEFT');
        }

        $this->db->join('customer_site', 'user_customer_site.site_id = customer_site.site_id', 'LEFT');

        $this->db->where('dq_user.id', $user_id);

        $query = $this->db->get('dq_user');
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

    // get all data array
    function get_staff_ticket($id) {
        $this->db->select('tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.source, tkt.call_logged_company, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, usr.name, tsno.serial_no as serial_no, tsno.model_no as model_no, tsno.manufacturer as manufacturer, status.state, tkt.created as ticket_created, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color');
        $this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'usr.id=umail.user_id', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');
        $this->db->where('tkt.staff_id', $id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

    function get_pending_ticket($id) {
        $this->db->select('tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.source, tkt.call_logged_company, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, usr.name, tsno.serial_no as serial_no, tsno.model_no as model_no, tsno.manufacturer as manufacturer, status.state, tkt.created as ticket_created, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color');
        $this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'usr.id=umail.user_id', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');
        $this->db->where('tkt.dept_id', $id);
        $this->db->where('tkt.status_id', 3);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

    function get_open_ticket($id) {
        $this->db->select('tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.source, tkt.call_logged_company, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, usr.name, tsno.serial_no as serial_no, tsno.model_no as model_no, tsno.manufacturer as manufacturer, status.name as status_name, status.state, tkt.created as ticket_created, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color');
        $this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'usr.id=umail.user_id', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');
        $this->db->where('tkt.dept_id', $id);
        $this->db->where('tkt.status_id', 1);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

    function get_closed_ticket($id) {
        $this->db->select('tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.source, tkt.call_logged_company, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, usr.name, tsno.serial_no as serial_no, tsno.model_no as model_no, tsno.manufacturer as manufacturer, status.state, tkt.created as ticket_created, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color');
        $this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'usr.id=umail.user_id', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');
        $this->db->where('tkt.dept_id', $id);
        $this->db->where('tkt.status_id', 6);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

    function get_resolved_ticket($id) {
        $this->db->select('tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.source, tkt.call_logged_company, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, usr.name, tsno.serial_no as serial_no, tsno.model_no as model_no, tsno.manufacturer as manufacturer, status.state, tkt.created as ticket_created, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color');
        $this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'usr.id=umail.user_id', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');
        $this->db->where('tkt.dept_id', $id);
        $this->db->where('tkt.status_id', 5);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }
    
    // load user data
    function load_customer_user_info($user_id, $cust_type) {

        //$this->db->select('customer.name as company_name,dq_user.name as name,address,mobile_no');
        $this->db->select('dq_user.id,user_email.address as email,user_mobile.mobile_no,dq_user.name as name,
                          dq_user.org_id,user_mobile.id as mobile_pk_id,user_email.id as email_pk_id');

        $this->db->join('user_mobile', 'dq_user.id = user_mobile.user_id AND dq_user.default_mobile_no = user_mobile.id', 'LEFT');
        $this->db->join('user_email', 'dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id', 'LEFT');

        $this->db->select('customer.name as company_name, customer.cust_type');
        $this->db->join('customer', 'dq_user.org_id = customer.id', 'LEFT'); 

        $this->db->where('dq_user.id', $user_id);

        $query = $this->db->get('dq_user');
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }
    
    // get search related data
    function get_search_user_by_location($search,$search_type = NULL) {
        
        //$this->db->select('customer.name as company_name,dq_user.name as name,address,mobile_no');
        $this->db->select('dq_user.id,user_email.address as email,user_mobile.mobile_no as phone,customer.name as company_name,dq_user.name as name,customer_site.location as location,customer_site.site_id as site_id');

        $this->db->join('user_mobile', 'dq_user.id = user_mobile.user_id AND dq_user.default_mobile_no = user_mobile.id', 'LEFT');
        $this->db->join('user_email', 'dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id', 'LEFT');
        $this->db->join('customer', 'dq_user.org_id = customer.id', 'LEFT');
        $this->db->join('customer_site', 'customer_site.cust_id = customer.id', 'LEFT');
        $this->db->join('user_customer_site','user_customer_site.site_id = customer_site.site_id','LEFT');

        if ($search_type == NULL) {
            $this->db->or_like('mobile_no', $search, 'both');
            $this->db->or_like('customer.name', $search, 'both');
        } 
        if ($search_type == 'location') {
            $this->db->like('location', $search, 'both');
        } 
        

        $query = $this->db->get('dq_user');
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }
    
    // load user data
    function load_user_location_info($cust_id, $site_id) {

        //$this->db->select('customer.name as company_name,dq_user.name as name,address,mobile_no');
        $this->db->select('dq_user.id,user_customer_site.site_id,user_email.address as email,user_mobile.mobile_no,dq_user.name as name,
                          customer_site.address as store_address,location,city,postcode,customer_site.phone,internal_note,'
                . 'dq_user.org_id,user_mobile.id as mobile_pk_id,user_email.id as email_pk_id,customer.name as company_name, customer.cust_type');

        $this->db->join('user_mobile', 'dq_user.id = user_mobile.user_id AND dq_user.default_mobile_no = user_mobile.id', 'LEFT');
        $this->db->join('user_email', 'dq_user.id = user_email.user_id AND dq_user.default_email_id = user_email.id', 'LEFT');
        $this->db->join('customer', 'dq_user.org_id = customer.id', 'LEFT');
        $this->db->join('user_customer_site', 'user_customer_site.user_id = dq_user.id AND user_customer_site.cust_id = customer.id', 'LEFT');
        $this->db->join('customer_site', 'user_customer_site.site_id = customer_site.site_id', 'LEFT');
        
        /*if ($cust_type > 0) { //Company
            $this->db->select('customer.name as company_name, customer.cust_type');
            $this->db->join('customer', 'dq_user.org_id = customer.id', 'LEFT');
            $this->db->join('user_customer_site', 'user_customer_site.user_id = dq_user.id AND user_customer_site.cust_id = customer.id', 'LEFT');
        } else { //Individual
            $this->db->join('user_customer_site', 'user_customer_site.user_id = dq_user.id', 'LEFT');
        }*/

        

        $this->db->where('customer.id', $cust_id);
        $this->db->where('customer_site.site_id', $site_id);

        $query = $this->db->get('dq_user');
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();

        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }

        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }
    
    // get all data array
    function get_all_ticket_ajax($params = array()) {
        $this->db->select('tkt.ticket_id, tkt.number,dept.name as dept_name, tkt.source, tkt.call_logged_company, tkt.call_logged_cust_location, tkt.call_logged_in, tkt.nature_call, usr.name, tsno.serial_no as serial_no, tsno.model_no as model_no, tsno.manufacturer as manufacturer, status.state, tkt.created as ticket_created, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff, IF(staff.staff_id IS NULL,team.name, CONCAT_WS(" ", staff.lastname, staff.firstname)) as assigned, IF(ptopic.topic_pid IS NULL, topic.topic, CONCAT_WS(" / ", ptopic.topic, topic.topic)) as helptopic, cdata.priority as priority_id, cdata.subject, pri.priority_desc, pri.priority_color');
        $this->db->from('ticket AS tkt');
        $this->db->join('ticket_status AS status', 'status.id=tkt.status_id', 'LEFT');
        $this->db->join('dq_user AS usr', 'usr.id=tkt.user_id', 'LEFT');
        $this->db->join('user_email AS umail', 'usr.id=umail.user_id', 'LEFT');
        $this->db->join('ticket_serial AS tsno', 'tkt.ticket_id=tsno.ticket_id', 'LEFT');
        $this->db->join('department AS dept', 'tkt.dept_id=dept.id', 'LEFT');
        $this->db->join('sla as sla', 'tkt.sla_id=sla.id', 'LEFT');
        $this->db->join('staff as staff', 'tkt.staff_id=staff.staff_id', 'LEFT');
        $this->db->join('team as team', 'tkt.team_id=team.team_id', 'LEFT');
        $this->db->join('help_topic AS topic', 'tkt.ticket_type_id=topic.topic_id', 'LEFT');
        $this->db->join('help_topic AS ptopic', 'ptopic.topic_id=topic.topic_pid', 'LEFT');
        $this->db->join('ticket__cdata AS cdata', 'cdata.ticket_id = tkt.ticket_id', 'LEFT');
        $this->db->join('ticket_priority AS pri', 'pri.priority_id = cdata.priority', 'LEFT');
		$this->db->join('customer as cust', 'tkt.cust_id=cust.id', 'LEFT');

		if(array_key_exists("search_status",$params)){
			if($params['search_status']!=''){
            $this->db->where('tkt.status_id', $params['search_status']);
			}
        }
		if(array_key_exists("search_priority",$params)){
			if($params['search_priority']!=''){
            $this->db->where('pri.priority_id', $params['search_priority']);
			}
        }
		if(array_key_exists("search_dept",$params)){
			if($params['search_dept']!=''){
            $this->db->where('tkt.dept_id', $params['search_dept']);
			}
        }
		if(array_key_exists("search_call_logged_in",$params)){
			if($params['search_call_logged_in']!=''){
            $this->db->where('tkt.call_logged_in', $params['search_call_logged_in']);
			}
        }
		if(array_key_exists("search_nature_call",$params)){
			if($params['search_nature_call']!=''){
            $this->db->where('tkt.nature_call', $params['search_nature_call']);
			}
        }
		
		if(array_key_exists("start_date",$params) && array_key_exists("end_date",$params)){
			if($params['start_date']!='' && $params['end_date']!='' ){
            $this->db->where('DATE(tkt.created) >=', date('Y-m-d', strtotime($params['start_date'])));
			$this->db->where('DATE(tkt.created) <=', date('Y-m-d', strtotime($params['end_date'])));
			}
			else if($params['start_date']!=''){
			$this->db->where('DATE(tkt.created)', date('Y-m-d', strtotime($params['start_date'])) );	
			}
        }

		if(array_key_exists("keyword",$params)){
			if($params['keyword']!=''){
           // $this->db->where("tsno.serial_no LIKE %".$params['keyword']."%");
		   $this->db->like("Concat(IFNULL(tkt.number, ''), '', IFNULL(tsno.serial_no, ''), '', IFNULL(tsno.model_no, ''), '', IFNULL(tsno.manufacturer, ''), '', 
		   IFNULL(tsno.invoice_no, ''), '', IFNULL(tsno.billing_name, ''), '', IFNULL(tsno.billing_address, ''), '', IFNULL(tsno.billing_location, ''), '', 
		   IFNULL(tsno.billing_type, ''), '', IFNULL(cust.cust_account, ''), '', IFNULL(cust.name, ''))", $params['keyword'], 'both');
			}
        }
		
		if (array_key_exists("frm_search_keyword", $params)) {
            if ($params['frm_search_keyword'] != 'undefined' && $params['frm_search_keyword'] != '') {
                $this->db->like("Concat(IFNULL(tkt.number, ''), '', IFNULL(cdata.subject, ''), '', IFNULL(usr.name, ''), '', IFNULL(tsno.manufacturer, ''), '', 
				IFNULL(tsno.model_no, ''), '', IFNULL(tsno.serial_no, ''), '', IFNULL(tkt.call_logged_in, ''), '', IFNULL(tkt.nature_call, ''), '', 
				IFNULL(pri.priority_desc, ''), '', IFNULL(dept.name, ''))"
                   , $params['frm_search_keyword'], 'both');
            }
        }
		
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }
        elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }
        
        if(array_key_exists("sort_column",$params)){
            $this->db->order_by($params['sort_column'], $params['sort_by']);
        }
        else {
            $this->db->order_by($this->id, $this->order);
        }
        
        $query = $this->db->get();
        //echo "<br> str ".$this->db->last_query();
        return ($query->num_rows() > 0) ? $query->result() : FALSE;
        
        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result_array();
    }

}

/* End of file Ticket_model.php */