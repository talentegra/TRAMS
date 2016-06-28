<?php

/* Location: ./application/controllers/Package_course.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:49:58 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Package_course extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Package_course_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::package_course',
            'sort_by' => 'DESC',
            'sort_column' => '',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('package_course/package_course_list', $data);
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
        $config['div'] = 'Package_course_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Package_course/list_data';
        $config['total_rows'] = $this->Package_course_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $package_course_data = $this->Package_course_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'package_course_data' => $package_course_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('package_course/package_course_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Package_course_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Package_course',
		'package_id' => $row->package_id,
		'course_id' => $row->course_id,
	    );
			$this->_tpl('package_course/package_course_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package_course'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('package_course/create_action'),
			'title'  => 'TRAMS::SCP::Create Package_course',
	    'package_id' => set_value('package_id'),
	    'course_id' => set_value('course_id'),
	);
          $this->_tpl('package_course/package_course_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'package_id' => $this->input->post('package_id',TRUE),
		'course_id' => $this->input->post('course_id',TRUE),
	    );

            $this->Package_course_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('package_course'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Package_course_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('package_course/update_action'),
				'title'  => 'TRAMS::SCP::Update Package_course',
		'package_id' => set_value('package_id', $row->package_id),
		'course_id' => set_value('course_id', $row->course_id),
	    );
			$this->_tpl('package_course/package_course_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package_course'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'package_id' => $this->input->post('package_id',TRUE),
		'course_id' => $this->input->post('course_id',TRUE),
	    );

            $this->Package_course_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('package_course'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Package_course_model->get_by_id($id);

        if ($row) {
            $this->Package_course_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('package_course'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package_course'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('package_id', 'package id', 'trim|required|numeric');
	$this->form_validation->set_rules('course_id', 'course id', 'trim|required|numeric');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Package_course.php */
