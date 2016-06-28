<?php

/* Location: ./application/controllers/Leads.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:49:36 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leads extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Leads_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::leads',
            'sort_by' => 'DESC',
            'sort_column' => 'lead_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('leads/leads_list', $data);
    }

    public function list_data()
    {
		$page = $this->input->post('page');
        $sort_by = $this->input->post('sortby');
        $sort_column = $this->input->post('sort_column');
		$q = $this->input->post('q');

        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        $this->perPage = 5;

        if ($this->input->post('per_page') > 0) {
            $this->perPage = $this->input->post('per_page');
        }

        //pagination configuration
        $config['first_link'] = 'First';
        $config['div'] = 'Leads_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Leads/list_data';
        $config['total_rows'] = $this->Leads_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $leads_data = $this->Leads_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'leads_data' => $leads_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('leads/leads_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Leads_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Leads',
		'lead_id' => $row->lead_id,
		'source_id' => $row->source_id,
		'staff_id' => $row->staff_id,
		'first_name' => $row->first_name,
		'middle_name' => $row->middle_name,
		'last_name' => $row->last_name,
		'email' => $row->email,
		'mobile' => $row->mobile,
		'alt_mobile' => $row->alt_mobile,
		'ref_name' => $row->ref_name,
		'ref_mobile' => $row->ref_mobile,
		'comments' => $row->comments,
		'branch_id' => $row->branch_id,
		'course_id' => $row->course_id,
		'country_id' => $row->country_id,
		'active' => $row->active,
		'status' => $row->status,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('leads/leads_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leads'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('leads/create_action'),
			'title'  => 'TRAMS::SCP::Create Leads',
	    'lead_id' => set_value('lead_id'),
	    'source_id' => set_value('source_id'),
	    'staff_id' => set_value('staff_id'),
	    'first_name' => set_value('first_name'),
	    'middle_name' => set_value('middle_name'),
	    'last_name' => set_value('last_name'),
	    'email' => set_value('email'),
	    'mobile' => set_value('mobile'),
	    'alt_mobile' => set_value('alt_mobile'),
	    'ref_name' => set_value('ref_name'),
	    'ref_mobile' => set_value('ref_mobile'),
	    'comments' => set_value('comments'),
	    'branch_id' => set_value('branch_id'),
	    'course_id' => set_value('course_id'),
	    'country_id' => set_value('country_id'),
	    'active' => set_value('active'),
	    'status' => set_value('status'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('leads/leads_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'source_id' => $this->input->post('source_id',TRUE),
		'staff_id' => $this->input->post('staff_id',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'middle_name' => $this->input->post('middle_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'alt_mobile' => $this->input->post('alt_mobile',TRUE),
		'ref_name' => $this->input->post('ref_name',TRUE),
		'ref_mobile' => $this->input->post('ref_mobile',TRUE),
		'comments' => $this->input->post('comments',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'course_id' => $this->input->post('course_id',TRUE),
		'country_id' => $this->input->post('country_id',TRUE),
		'active' => $this->input->post('active',TRUE),
		'status' => $this->input->post('status',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Leads_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('leads'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Leads_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('leads/update_action'),
				'title'  => 'TRAMS::SCP::Update Leads',
		'lead_id' => set_value('lead_id', $row->lead_id),
		'source_id' => set_value('source_id', $row->source_id),
		'staff_id' => set_value('staff_id', $row->staff_id),
		'first_name' => set_value('first_name', $row->first_name),
		'middle_name' => set_value('middle_name', $row->middle_name),
		'last_name' => set_value('last_name', $row->last_name),
		'email' => set_value('email', $row->email),
		'mobile' => set_value('mobile', $row->mobile),
		'alt_mobile' => set_value('alt_mobile', $row->alt_mobile),
		'ref_name' => set_value('ref_name', $row->ref_name),
		'ref_mobile' => set_value('ref_mobile', $row->ref_mobile),
		'comments' => set_value('comments', $row->comments),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'course_id' => set_value('course_id', $row->course_id),
		'country_id' => set_value('country_id', $row->country_id),
		'active' => set_value('active', $row->active),
		'status' => set_value('status', $row->status),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('leads/leads_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leads'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('lead_id', TRUE));
        } else {
            $data = array(
		'source_id' => $this->input->post('source_id',TRUE),
		'staff_id' => $this->input->post('staff_id',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'middle_name' => $this->input->post('middle_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email' => $this->input->post('email',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'alt_mobile' => $this->input->post('alt_mobile',TRUE),
		'ref_name' => $this->input->post('ref_name',TRUE),
		'ref_mobile' => $this->input->post('ref_mobile',TRUE),
		'comments' => $this->input->post('comments',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'course_id' => $this->input->post('course_id',TRUE),
		'country_id' => $this->input->post('country_id',TRUE),
		'active' => $this->input->post('active',TRUE),
		'status' => $this->input->post('status',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Leads_model->update($this->input->post('lead_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('leads'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Leads_model->get_by_id($id);

        if ($row) {
            $this->Leads_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('leads'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leads'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('source_id', 'source id', 'trim|required|numeric');
	$this->form_validation->set_rules('staff_id', 'staff id', 'trim|required|numeric');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('middle_name', 'middle name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	$this->form_validation->set_rules('alt_mobile', 'alt mobile', 'trim|required');
	$this->form_validation->set_rules('ref_name', 'ref name', 'trim|required');
	$this->form_validation->set_rules('ref_mobile', 'ref mobile', 'trim|required');
	$this->form_validation->set_rules('comments', 'comments', 'trim|required');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('course_id', 'course id', 'trim|required|numeric');
	$this->form_validation->set_rules('country_id', 'country id', 'trim|required|numeric');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
		
		

	$this->form_validation->set_rules('lead_id', 'lead_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Leads.php */
