<?php

/* Location: ./application/controllers/Staff_branch_access.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:56:44 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_branch_access extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_branch_access_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::staff_branch_access',
            'sort_by' => 'DESC',
            'sort_column' => 'staff_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('staff_branch_access/staff_branch_access_list', $data);
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
        $config['div'] = 'Staff_branch_access_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Staff_branch_access/list_data';
        $config['total_rows'] = $this->Staff_branch_access_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $staff_branch_access_data = $this->Staff_branch_access_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'staff_branch_access_data' => $staff_branch_access_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('staff_branch_access/staff_branch_access_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Staff_branch_access_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Staff_branch_access',
		'staff_id' => $row->staff_id,
		'branch_id' => $row->branch_id,
		'group_id' => $row->group_id,
		'flags' => $row->flags,
	    );
			$this->_tpl('staff_branch_access/staff_branch_access_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_branch_access'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('staff_branch_access/create_action'),
			'title'  => 'TRAMS::SCP::Create Staff_branch_access',
	    'staff_id' => set_value('staff_id'),
	    'branch_id' => set_value('branch_id'),
	    'group_id' => set_value('group_id'),
	    'flags' => set_value('flags'),
	);
          $this->_tpl('staff_branch_access/staff_branch_access_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'group_id' => $this->input->post('group_id',TRUE),
		'flags' => $this->input->post('flags',TRUE),
	    );

            $this->Staff_branch_access_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('staff_branch_access'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Staff_branch_access_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('staff_branch_access/update_action'),
				'title'  => 'TRAMS::SCP::Update Staff_branch_access',
		'staff_id' => set_value('staff_id', $row->staff_id),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'group_id' => set_value('group_id', $row->group_id),
		'flags' => set_value('flags', $row->flags),
	    );
			$this->_tpl('staff_branch_access/staff_branch_access_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_branch_access'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('staff_id', TRUE));
        } else {
            $data = array(
		'group_id' => $this->input->post('group_id',TRUE),
		'flags' => $this->input->post('flags',TRUE),
	    );

            $this->Staff_branch_access_model->update($this->input->post('staff_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('staff_branch_access'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Staff_branch_access_model->get_by_id($id);

        if ($row) {
            $this->Staff_branch_access_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('staff_branch_access'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_branch_access'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('group_id', 'group id', 'trim|required|numeric');
	$this->form_validation->set_rules('flags', 'flags', 'trim|required|numeric');

	$this->form_validation->set_rules('staff_id', 'staff_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Staff_branch_access.php */
