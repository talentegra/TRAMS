<?php

/* Location: ./application/controllers/Batches_students.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:46:25 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batches_students extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Batches_students_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::batches_students',
            'sort_by' => 'DESC',
            'sort_column' => 'batch_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('batches_students/batches_students_list', $data);
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
        $config['div'] = 'Batches_students_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Batches_students/list_data';
        $config['total_rows'] = $this->Batches_students_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $batches_students_data = $this->Batches_students_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'batches_students_data' => $batches_students_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('batches_students/batches_students_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Batches_students_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Batches_students',
		'batch_id' => $row->batch_id,
		'student_id' => $row->student_id,
		'faculty_id' => $row->faculty_id,
		'student_rating' => $row->student_rating,
		'student_comments' => $row->student_comments,
		'faculty_rating' => $row->faculty_rating,
		'faculty_comments' => $row->faculty_comments,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('batches_students/batches_students_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches_students'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('batches_students/create_action'),
			'title'  => 'TRAMS::SCP::Create Batches_students',
	    'batch_id' => set_value('batch_id'),
	    'student_id' => set_value('student_id'),
	    'faculty_id' => set_value('faculty_id'),
	    'student_rating' => set_value('student_rating'),
	    'student_comments' => set_value('student_comments'),
	    'faculty_rating' => set_value('faculty_rating'),
	    'faculty_comments' => set_value('faculty_comments'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('batches_students/batches_students_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'student_id' => $this->input->post('student_id',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'student_rating' => $this->input->post('student_rating',TRUE),
		'student_comments' => $this->input->post('student_comments',TRUE),
		'faculty_rating' => $this->input->post('faculty_rating',TRUE),
		'faculty_comments' => $this->input->post('faculty_comments',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batches_students_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('batches_students'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Batches_students_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('batches_students/update_action'),
				'title'  => 'TRAMS::SCP::Update Batches_students',
		'batch_id' => set_value('batch_id', $row->batch_id),
		'student_id' => set_value('student_id', $row->student_id),
		'faculty_id' => set_value('faculty_id', $row->faculty_id),
		'student_rating' => set_value('student_rating', $row->student_rating),
		'student_comments' => set_value('student_comments', $row->student_comments),
		'faculty_rating' => set_value('faculty_rating', $row->faculty_rating),
		'faculty_comments' => set_value('faculty_comments', $row->faculty_comments),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('batches_students/batches_students_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches_students'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('batch_id', TRUE));
        } else {
            $data = array(
		'student_id' => $this->input->post('student_id',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'student_rating' => $this->input->post('student_rating',TRUE),
		'student_comments' => $this->input->post('student_comments',TRUE),
		'faculty_rating' => $this->input->post('faculty_rating',TRUE),
		'faculty_comments' => $this->input->post('faculty_comments',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batches_students_model->update($this->input->post('batch_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('batches_students'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Batches_students_model->get_by_id($id);

        if ($row) {
            $this->Batches_students_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('batches_students'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches_students'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('student_id', 'student id', 'trim|required|numeric');
	$this->form_validation->set_rules('faculty_id', 'faculty id', 'trim|required|numeric');
	$this->form_validation->set_rules('student_rating', 'student rating', 'trim|required|numeric');
	$this->form_validation->set_rules('student_comments', 'student comments', 'trim|required');
	$this->form_validation->set_rules('faculty_rating', 'faculty rating', 'trim|required|numeric');
	$this->form_validation->set_rules('faculty_comments', 'faculty comments', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('batch_id', 'batch_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Batches_students.php */
