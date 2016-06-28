<?php

/* Location: ./application/controllers/Delegations.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:48:24 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delegations extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Delegations_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::delegations',
            'sort_by' => 'DESC',
            'sort_column' => 'id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('delegations/delegations_list', $data);
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
        $config['div'] = 'Delegations_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Delegations/list_data';
        $config['total_rows'] = $this->Delegations_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $delegations_data = $this->Delegations_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'delegations_data' => $delegations_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('delegations/delegations_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Delegations_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Delegations',
		'id' => $row->id,
		'manager_id' => $row->manager_id,
		'delegate_id' => $row->delegate_id,
	    );
			$this->_tpl('delegations/delegations_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delegations'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('delegations/create_action'),
			'title'  => 'TRAMS::SCP::Create Delegations',
	    'id' => set_value('id'),
	    'manager_id' => set_value('manager_id'),
	    'delegate_id' => set_value('delegate_id'),
	);
          $this->_tpl('delegations/delegations_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'manager_id' => $this->input->post('manager_id',TRUE),
		'delegate_id' => $this->input->post('delegate_id',TRUE),
	    );

            $this->Delegations_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('delegations'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Delegations_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('delegations/update_action'),
				'title'  => 'TRAMS::SCP::Update Delegations',
		'id' => set_value('id', $row->id),
		'manager_id' => set_value('manager_id', $row->manager_id),
		'delegate_id' => set_value('delegate_id', $row->delegate_id),
	    );
			$this->_tpl('delegations/delegations_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delegations'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'manager_id' => $this->input->post('manager_id',TRUE),
		'delegate_id' => $this->input->post('delegate_id',TRUE),
	    );

            $this->Delegations_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('delegations'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Delegations_model->get_by_id($id);

        if ($row) {
            $this->Delegations_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('delegations'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('delegations'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('manager_id', 'manager id', 'trim|required|numeric');
	$this->form_validation->set_rules('delegate_id', 'delegate id', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Delegations.php */
