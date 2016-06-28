<?php

/* Location: ./application/controllers/Faculty_eligibility.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:49:03 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faculty_eligibility extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faculty_eligibility_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::faculty_eligibility',
            'sort_by' => 'DESC',
            'sort_column' => '',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('faculty_eligibility/faculty_eligibility_list', $data);
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
        $config['div'] = 'Faculty_eligibility_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Faculty_eligibility/list_data';
        $config['total_rows'] = $this->Faculty_eligibility_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $faculty_eligibility_data = $this->Faculty_eligibility_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'faculty_eligibility_data' => $faculty_eligibility_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('faculty_eligibility/faculty_eligibility_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Faculty_eligibility_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Faculty_eligibility',
		'faculty_id' => $row->faculty_id,
		'stage_id' => $row->stage_id,
		'review_date' => $row->review_date,
		'review_level' => $row->review_level,
		'reivewer_id' => $row->reivewer_id,
		'reviwer_comments' => $row->reviwer_comments,
		'shadow_date' => $row->shadow_date,
		'shadow_level' => $row->shadow_level,
		'shadower_id' => $row->shadower_id,
		'shadower_comments' => $row->shadower_comments,
		'assesment_comments' => $row->assesment_comments,
		'assesement_status' => $row->assesement_status,
	    );
			$this->_tpl('faculty_eligibility/faculty_eligibility_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faculty_eligibility'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faculty_eligibility/create_action'),
			'title'  => 'TRAMS::SCP::Create Faculty_eligibility',
	    'faculty_id' => set_value('faculty_id'),
	    'stage_id' => set_value('stage_id'),
	    'review_date' => set_value('review_date'),
	    'review_level' => set_value('review_level'),
	    'reivewer_id' => set_value('reivewer_id'),
	    'reviwer_comments' => set_value('reviwer_comments'),
	    'shadow_date' => set_value('shadow_date'),
	    'shadow_level' => set_value('shadow_level'),
	    'shadower_id' => set_value('shadower_id'),
	    'shadower_comments' => set_value('shadower_comments'),
	    'assesment_comments' => set_value('assesment_comments'),
	    'assesement_status' => set_value('assesement_status'),
	);
          $this->_tpl('faculty_eligibility/faculty_eligibility_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'stage_id' => $this->input->post('stage_id',TRUE),
		'review_date' => $this->input->post('review_date',TRUE),
		'review_level' => $this->input->post('review_level',TRUE),
		'reivewer_id' => $this->input->post('reivewer_id',TRUE),
		'reviwer_comments' => $this->input->post('reviwer_comments',TRUE),
		'shadow_date' => $this->input->post('shadow_date',TRUE),
		'shadow_level' => $this->input->post('shadow_level',TRUE),
		'shadower_id' => $this->input->post('shadower_id',TRUE),
		'shadower_comments' => $this->input->post('shadower_comments',TRUE),
		'assesment_comments' => $this->input->post('assesment_comments',TRUE),
		'assesement_status' => $this->input->post('assesement_status',TRUE),
	    );

            $this->Faculty_eligibility_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faculty_eligibility'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faculty_eligibility_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faculty_eligibility/update_action'),
				'title'  => 'TRAMS::SCP::Update Faculty_eligibility',
		'faculty_id' => set_value('faculty_id', $row->faculty_id),
		'stage_id' => set_value('stage_id', $row->stage_id),
		'review_date' => set_value('review_date', $row->review_date),
		'review_level' => set_value('review_level', $row->review_level),
		'reivewer_id' => set_value('reivewer_id', $row->reivewer_id),
		'reviwer_comments' => set_value('reviwer_comments', $row->reviwer_comments),
		'shadow_date' => set_value('shadow_date', $row->shadow_date),
		'shadow_level' => set_value('shadow_level', $row->shadow_level),
		'shadower_id' => set_value('shadower_id', $row->shadower_id),
		'shadower_comments' => set_value('shadower_comments', $row->shadower_comments),
		'assesment_comments' => set_value('assesment_comments', $row->assesment_comments),
		'assesement_status' => set_value('assesement_status', $row->assesement_status),
	    );
			$this->_tpl('faculty_eligibility/faculty_eligibility_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faculty_eligibility'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'stage_id' => $this->input->post('stage_id',TRUE),
		'review_date' => $this->input->post('review_date',TRUE),
		'review_level' => $this->input->post('review_level',TRUE),
		'reivewer_id' => $this->input->post('reivewer_id',TRUE),
		'reviwer_comments' => $this->input->post('reviwer_comments',TRUE),
		'shadow_date' => $this->input->post('shadow_date',TRUE),
		'shadow_level' => $this->input->post('shadow_level',TRUE),
		'shadower_id' => $this->input->post('shadower_id',TRUE),
		'shadower_comments' => $this->input->post('shadower_comments',TRUE),
		'assesment_comments' => $this->input->post('assesment_comments',TRUE),
		'assesement_status' => $this->input->post('assesement_status',TRUE),
	    );

            $this->Faculty_eligibility_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faculty_eligibility'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faculty_eligibility_model->get_by_id($id);

        if ($row) {
            $this->Faculty_eligibility_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faculty_eligibility'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faculty_eligibility'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('faculty_id', 'faculty id', 'trim|required|numeric');
	$this->form_validation->set_rules('stage_id', 'stage id', 'trim|required|numeric');
	$this->form_validation->set_rules('review_date', 'review date', 'trim|required');
	$this->form_validation->set_rules('review_level', 'review level', 'trim|required');
	$this->form_validation->set_rules('reivewer_id', 'reivewer id', 'trim|required|numeric');
	$this->form_validation->set_rules('reviwer_comments', 'reviwer comments', 'trim|required');
	$this->form_validation->set_rules('shadow_date', 'shadow date', 'trim|required');
	$this->form_validation->set_rules('shadow_level', 'shadow level', 'trim|required');
	$this->form_validation->set_rules('shadower_id', 'shadower id', 'trim|required|numeric');
	$this->form_validation->set_rules('shadower_comments', 'shadower comments', 'trim|required');
	$this->form_validation->set_rules('assesment_comments', 'assesment comments', 'trim|required');
	$this->form_validation->set_rules('assesement_status', 'assesement status', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Faculty_eligibility.php */
