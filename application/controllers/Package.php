<?php

/* Location: ./application/controllers/Package.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:49:51 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Package extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Package_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::package',
            'sort_by' => 'DESC',
            'sort_column' => 'package_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('package/package_list', $data);
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
        $config['div'] = 'Package_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Package/list_data';
        $config['total_rows'] = $this->Package_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $package_data = $this->Package_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'package_data' => $package_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('package/package_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Package_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Package',
		'package_id' => $row->package_id,
		'package_name' => $row->package_name,
		'package_fee' => $row->package_fee,
		'branch_id' => $row->branch_id,
		'acitve' => $row->acitve,
	    );
			$this->_tpl('package/package_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('package/create_action'),
			'title'  => 'TRAMS::SCP::Create Package',
	    'package_id' => set_value('package_id'),
	    'package_name' => set_value('package_name'),
	    'package_fee' => set_value('package_fee'),
	    'branch_id' => set_value('branch_id'),
	    'acitve' => set_value('acitve'),
	);
          $this->_tpl('package/package_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'package_name' => $this->input->post('package_name',TRUE),
		'package_fee' => $this->input->post('package_fee',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'acitve' => $this->input->post('acitve',TRUE),
	    );

            $this->Package_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('package'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Package_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('package/update_action'),
				'title'  => 'TRAMS::SCP::Update Package',
		'package_id' => set_value('package_id', $row->package_id),
		'package_name' => set_value('package_name', $row->package_name),
		'package_fee' => set_value('package_fee', $row->package_fee),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'acitve' => set_value('acitve', $row->acitve),
	    );
			$this->_tpl('package/package_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('package_id', TRUE));
        } else {
            $data = array(
		'package_name' => $this->input->post('package_name',TRUE),
		'package_fee' => $this->input->post('package_fee',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'acitve' => $this->input->post('acitve',TRUE),
	    );

            $this->Package_model->update($this->input->post('package_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('package'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Package_model->get_by_id($id);

        if ($row) {
            $this->Package_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('package'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('package_name', 'package name', 'trim|required');
	$this->form_validation->set_rules('package_fee', 'package fee', 'trim|required');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('acitve', 'acitve', 'trim|required');

	$this->form_validation->set_rules('package_id', 'package_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Package.php */
