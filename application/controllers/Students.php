<?php

/* Location: ./application/controllers/Students.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:57:24 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Students extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Students_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::students',
            'sort_by' => 'DESC',
            'sort_column' => 'student_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('students/students_list', $data);
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
        $config['div'] = 'Students_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Students/list_data';
        $config['total_rows'] = $this->Students_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $students_data = $this->Students_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'students_data' => $students_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('students/students_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Students_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Students',
		'student_id' => $row->student_id,
		'branch_id' => $row->branch_id,
		'student_name' => $row->student_name,
		'middle_name' => $row->middle_name,
		'last_name' => $row->last_name,
		'company' => $row->company,
		'email' => $row->email,
		'mobile' => $row->mobile,
		'reg_date' => $row->reg_date,
		'photo' => $row->photo,
		'notes' => $row->notes,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('students/students_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('students/create_action'),
			'title'  => 'TRAMS::SCP::Create Students',
	    'student_id' => set_value('student_id'),
	    'branch_id' => set_value('branch_id'),
	    'student_name' => set_value('student_name'),
	    'middle_name' => set_value('middle_name'),
	    'last_name' => set_value('last_name'),
	    'company' => set_value('company'),
	    'email' => set_value('email'),
	    'mobile' => set_value('mobile'),
	    'reg_date' => set_value('reg_date'),
	    'photo' => set_value('photo'),
	    'notes' => set_value('notes'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('students/students_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'branch_id' => $this->input->post('branch_id',TRUE),
		'student_name' => $this->input->post('student_name',TRUE),
		'middle_name' => $this->input->post('middle_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'company' => $this->input->post('company',TRUE),
		'email' => $this->input->post('email',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'reg_date' => $this->input->post('reg_date',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Students_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('students'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Students_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('students/update_action'),
				'title'  => 'TRAMS::SCP::Update Students',
		'student_id' => set_value('student_id', $row->student_id),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'student_name' => set_value('student_name', $row->student_name),
		'middle_name' => set_value('middle_name', $row->middle_name),
		'last_name' => set_value('last_name', $row->last_name),
		'company' => set_value('company', $row->company),
		'email' => set_value('email', $row->email),
		'mobile' => set_value('mobile', $row->mobile),
		'reg_date' => set_value('reg_date', $row->reg_date),
		'photo' => set_value('photo', $row->photo),
		'notes' => set_value('notes', $row->notes),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('students/students_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('student_id', TRUE));
        } else {
            $data = array(
		'branch_id' => $this->input->post('branch_id',TRUE),
		'student_name' => $this->input->post('student_name',TRUE),
		'middle_name' => $this->input->post('middle_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'company' => $this->input->post('company',TRUE),
		'email' => $this->input->post('email',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'reg_date' => $this->input->post('reg_date',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Students_model->update($this->input->post('student_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('students'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Students_model->get_by_id($id);

        if ($row) {
            $this->Students_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('students'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('student_name', 'student name', 'trim|required');
	$this->form_validation->set_rules('middle_name', 'middle name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('company', 'company', 'trim|required|numeric');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	$this->form_validation->set_rules('reg_date', 'reg date', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('notes', 'notes', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required|numeric');
		
		

	$this->form_validation->set_rules('student_id', 'student_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Students.php */
