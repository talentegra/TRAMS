<?php

/* Location: ./application/controllers/Candidate_requirement.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:46:44 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidate_requirement extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_requirement_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::candidate_requirement',
            'sort_by' => 'DESC',
            'sort_column' => 'candidate_req_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('candidate_requirement/candidate_requirement_list', $data);
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
        $config['div'] = 'Candidate_requirement_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Candidate_requirement/list_data';
        $config['total_rows'] = $this->Candidate_requirement_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $candidate_requirement_data = $this->Candidate_requirement_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'candidate_requirement_data' => $candidate_requirement_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('candidate_requirement/candidate_requirement_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Candidate_requirement_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Candidate_requirement',
		'candidate_req_id' => $row->candidate_req_id,
		'candidate_req_details' => $row->candidate_req_details,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('candidate_requirement/candidate_requirement_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('candidate_requirement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('candidate_requirement/create_action'),
			'title'  => 'TRAMS::SCP::Create Candidate_requirement',
	    'candidate_req_id' => set_value('candidate_req_id'),
	    'candidate_req_details' => set_value('candidate_req_details'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('candidate_requirement/candidate_requirement_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'candidate_req_details' => $this->input->post('candidate_req_details',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Candidate_requirement_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('candidate_requirement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Candidate_requirement_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('candidate_requirement/update_action'),
				'title'  => 'TRAMS::SCP::Update Candidate_requirement',
		'candidate_req_id' => set_value('candidate_req_id', $row->candidate_req_id),
		'candidate_req_details' => set_value('candidate_req_details', $row->candidate_req_details),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('candidate_requirement/candidate_requirement_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('candidate_requirement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('candidate_req_id', TRUE));
        } else {
            $data = array(
		'candidate_req_details' => $this->input->post('candidate_req_details',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Candidate_requirement_model->update($this->input->post('candidate_req_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('candidate_requirement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Candidate_requirement_model->get_by_id($id);

        if ($row) {
            $this->Candidate_requirement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('candidate_requirement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('candidate_requirement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('candidate_req_details', 'candidate req details', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('candidate_req_id', 'candidate_req_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Candidate_requirement.php */
