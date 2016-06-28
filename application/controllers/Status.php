<?php

/* Location: ./application/controllers/Status.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:57:10 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Status_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::status',
            'sort_by' => 'DESC',
            'sort_column' => 'status_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('status/status_list', $data);
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
        $config['div'] = 'Status_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Status/list_data';
        $config['total_rows'] = $this->Status_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $status_data = $this->Status_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'status_data' => $status_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('status/status_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Status_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Status',
		'status_id' => $row->status_id,
		'status_type' => $row->status_type,
		'status' => $row->status,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('status/status_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('status/create_action'),
			'title'  => 'TRAMS::SCP::Create Status',
	    'status_id' => set_value('status_id'),
	    'status_type' => set_value('status_type'),
	    'status' => set_value('status'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('status/status_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'status_type' => $this->input->post('status_type',TRUE),
		'status' => $this->input->post('status',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Status_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('status'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('status/update_action'),
				'title'  => 'TRAMS::SCP::Update Status',
		'status_id' => set_value('status_id', $row->status_id),
		'status_type' => set_value('status_type', $row->status_type),
		'status' => set_value('status', $row->status),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('status/status_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('status_id', TRUE));
        } else {
            $data = array(
		'status_type' => $this->input->post('status_type',TRUE),
		'status' => $this->input->post('status',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Status_model->update($this->input->post('status_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('status'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Status_model->get_by_id($id);

        if ($row) {
            $this->Status_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('status'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('status_type', 'status type', 'trim|required|numeric');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required|numeric');
		
		

	$this->form_validation->set_rules('status_id', 'status_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Status.php */
