<?php

/* Location: ./application/controllers/Organization.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:49:42 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organization extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organization_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::organization',
            'sort_by' => 'DESC',
            'sort_column' => 'id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('organization/organization_list', $data);
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
        $config['div'] = 'Organization_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Organization/list_data';
        $config['total_rows'] = $this->Organization_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $organization_data = $this->Organization_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'organization_data' => $organization_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('organization/organization_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Organization_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Organization',
		'id' => $row->id,
		'name' => $row->name,
		'manager' => $row->manager,
		'status' => $row->status,
		'domain' => $row->domain,
		'extra' => $row->extra,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('organization/organization_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organization'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('organization/create_action'),
			'title'  => 'TRAMS::SCP::Create Organization',
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'manager' => set_value('manager'),
	    'status' => set_value('status'),
	    'domain' => set_value('domain'),
	    'extra' => set_value('extra'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('organization/organization_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'status' => $this->input->post('status',TRUE),
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Organization_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('organization'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Organization_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('organization/update_action'),
				'title'  => 'TRAMS::SCP::Update Organization',
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'manager' => set_value('manager', $row->manager),
		'status' => set_value('status', $row->status),
		'domain' => set_value('domain', $row->domain),
		'extra' => set_value('extra', $row->extra),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('organization/organization_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organization'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'status' => $this->input->post('status',TRUE),
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Organization_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('organization'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Organization_model->get_by_id($id);

        if ($row) {
            $this->Organization_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('organization'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organization'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('manager', 'manager', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
	$this->form_validation->set_rules('domain', 'domain', 'trim|required');
	$this->form_validation->set_rules('extra', 'extra', 'trim|required');
		
		

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Organization.php */
