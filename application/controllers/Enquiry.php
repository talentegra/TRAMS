<?php

/* Location: ./application/controllers/Enquiry.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:48:42 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enquiry extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Enquiry_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::enquiry',
            'sort_by' => 'DESC',
            'sort_column' => 'enquiry_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('enquiry/enquiry_list', $data);
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
        $config['div'] = 'Enquiry_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Enquiry/list_data';
        $config['total_rows'] = $this->Enquiry_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $enquiry_data = $this->Enquiry_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'enquiry_data' => $enquiry_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('enquiry/enquiry_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Enquiry_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Enquiry',
		'enquiry_id' => $row->enquiry_id,
		'lead_id' => $row->lead_id,
		'branch_id' => $row->branch_id,
		'staff_id' => $row->staff_id,
		'enquiry_date' => $row->enquiry_date,
		'enquiry_type' => $row->enquiry_type,
		'enquiry_description' => $row->enquiry_description,
		'course_id' => $row->course_id,
		'mobile' => $row->mobile,
		'email' => $row->email,
		'level' => $row->level,
		'status_id' => $row->status_id,
	    );
			$this->_tpl('enquiry/enquiry_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enquiry'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('enquiry/create_action'),
			'title'  => 'TRAMS::SCP::Create Enquiry',
	    'enquiry_id' => set_value('enquiry_id'),
	    'lead_id' => set_value('lead_id'),
	    'branch_id' => set_value('branch_id'),
	    'staff_id' => set_value('staff_id'),
	    'enquiry_date' => set_value('enquiry_date'),
	    'enquiry_type' => set_value('enquiry_type'),
	    'enquiry_description' => set_value('enquiry_description'),
	    'course_id' => set_value('course_id'),
	    'mobile' => set_value('mobile'),
	    'email' => set_value('email'),
	    'level' => set_value('level'),
	    'status_id' => set_value('status_id'),
	);
          $this->_tpl('enquiry/enquiry_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'lead_id' => $this->input->post('lead_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'staff_id' => $this->input->post('staff_id',TRUE),
		'enquiry_date' => $this->input->post('enquiry_date',TRUE),
		'enquiry_type' => $this->input->post('enquiry_type',TRUE),
		'enquiry_description' => $this->input->post('enquiry_description',TRUE),
		'course_id' => $this->input->post('course_id',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'email' => $this->input->post('email',TRUE),
		'level' => $this->input->post('level',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
	    );

            $this->Enquiry_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('enquiry'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Enquiry_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('enquiry/update_action'),
				'title'  => 'TRAMS::SCP::Update Enquiry',
		'enquiry_id' => set_value('enquiry_id', $row->enquiry_id),
		'lead_id' => set_value('lead_id', $row->lead_id),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'staff_id' => set_value('staff_id', $row->staff_id),
		'enquiry_date' => set_value('enquiry_date', $row->enquiry_date),
		'enquiry_type' => set_value('enquiry_type', $row->enquiry_type),
		'enquiry_description' => set_value('enquiry_description', $row->enquiry_description),
		'course_id' => set_value('course_id', $row->course_id),
		'mobile' => set_value('mobile', $row->mobile),
		'email' => set_value('email', $row->email),
		'level' => set_value('level', $row->level),
		'status_id' => set_value('status_id', $row->status_id),
	    );
			$this->_tpl('enquiry/enquiry_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enquiry'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('enquiry_id', TRUE));
        } else {
            $data = array(
		'lead_id' => $this->input->post('lead_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'staff_id' => $this->input->post('staff_id',TRUE),
		'enquiry_date' => $this->input->post('enquiry_date',TRUE),
		'enquiry_type' => $this->input->post('enquiry_type',TRUE),
		'enquiry_description' => $this->input->post('enquiry_description',TRUE),
		'course_id' => $this->input->post('course_id',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'email' => $this->input->post('email',TRUE),
		'level' => $this->input->post('level',TRUE),
		'status_id' => $this->input->post('status_id',TRUE),
	    );

            $this->Enquiry_model->update($this->input->post('enquiry_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('enquiry'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Enquiry_model->get_by_id($id);

        if ($row) {
            $this->Enquiry_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('enquiry'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enquiry'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('lead_id', 'lead id', 'trim|required|numeric');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('staff_id', 'staff id', 'trim|required|numeric');
	$this->form_validation->set_rules('enquiry_date', 'enquiry date', 'trim|required');
	$this->form_validation->set_rules('enquiry_type', 'enquiry type', 'trim|required');
	$this->form_validation->set_rules('enquiry_description', 'enquiry description', 'trim|required');
	$this->form_validation->set_rules('course_id', 'course id', 'trim|required|numeric');
	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required|numeric');
	$this->form_validation->set_rules('status_id', 'status id', 'trim|required|numeric');

	$this->form_validation->set_rules('enquiry_id', 'enquiry_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Enquiry.php */
