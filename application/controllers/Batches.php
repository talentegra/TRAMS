<?php

/* Location: ./application/controllers/Batches.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-27 20:21:04 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batches extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Batches_model');
		$this->load->model('Categories_model');
		$this->load->model('Course_fee_type_model');
		$this->load->model('Batch_pattern_model');
		$this->load->model('batch_type_model');
		$this->load->model('Staff_details_model');
		$this->load->model('Currency_model');
		$this->load->model('Branch_model');
		$this->load->model('Courses_catalog_model');
		
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::batches',
            'sort_by' => 'DESC',
            'sort_column' => 'batch_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('batches/batches_list', $data);
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
        $config['div'] = 'Batches_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Batches/list_data';
        $config['total_rows'] = $this->Batches_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $batches_data = $this->Batches_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'batches_data' => $batches_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('batches/batches_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Batches_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Batches',
		'batch_id' => $row->batch_id,
		'course_id' => $row->course_id,
		'category_id' => $row->category_id,
		'batch_title' => $row->batch_title,
		'description' => $row->description,
		'faculty_id' => $row->faculty_id,
		'branch_id' => $row->branch_id,
		'batch_type' => $row->batch_type,
		'batch_pattern' => $row->batch_pattern,
		'start_date' => date("m/d/Y", strtotime($row->start_date)),
		'end_date' => date("m/d/Y", strtotime($row->end_date)),
		'week_days' => $row->week_days,
		'student_enrolled' => $row->student_enrolled,
		'batch_capacity' => $row->batch_capacity,
		'iscorporate' => $row->iscorporate,
		'currency_id' => $row->currency_id,
		'batch_fee_type' => $row->batch_fee_type,
		'fees' => $row->fees,
		'course_fee_type' => $row->course_fee_type,
		'course_fee' => $row->course_fee,
		'batch_status' => $row->batch_status,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('batches/batches_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches'));
        }
    }

    public function create() 
    {
		$course_fee_type_list = $this->Course_fee_type_model->get_all();
		$batch_pattern_list = $this->Batch_pattern_model->get_all();
		$branch_list = $this->Branch_model->get_all();
		$batch_type_list = $this->batch_type_model->get_all();
		$staff_list = $this->Staff_details_model->get_all();
		$currrency_list = $this->Currency_model->get_all();
		$course_list = $this->Courses_catalog_model->get_all();
		
        $data = array(
            'button' => 'Create',
            'action' => site_url('batches/create_action'),
			'title'  => 'TRAMS::SCP::Create Batches',
	    'batch_id' => set_value('batch_id'),
	    'course_id' => set_value('course_id'),
	    'batch_title' => set_value('batch_title'),
	    'description' => set_value('description'),
	    'faculty_id' => set_value('faculty_id'),
	    'branch_id' => set_value('branch_id'),
	    'batch_type' => set_value('batch_type'),
	    'batch_pattern' => set_value('batch_pattern'),
	    'start_date' => set_value('start_date'),
	    'end_date' => set_value('end_date'),
	    'week_days' => set_value('week_days'),
	    'student_enrolled' => set_value('student_enrolled'),
	    'batch_capacity' => set_value('batch_capacity'),
	    'iscorporate' => set_value('iscorporate'),
	    'currency_id' => set_value('currency_id'),
	    'batch_fee_type' => set_value('batch_fee_type'),
	    'fees' => set_value('fees'),
	    'course_fee_type' => set_value('course_fee_type'),
	    'course_fee' => set_value('course_fee'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
		'course_fee_type_list' => $course_fee_type_list,
		'branch_list' => $branch_list,
		'batch_pattern_list' => $batch_pattern_list,
		'batch_type_list' => $batch_type_list,
		'staff_list' => $staff_list,
		'currrency_list' => $currrency_list,
		'course_list' => $course_list,
	);
          $this->_tpl('batches/batches_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
		$course_details = $this->Courses_catalog_model->get_by_id($this->input->post('course_id',TRUE));
            $data = array(
		'course_id' => $this->input->post('course_id',TRUE),
		'category_id' => $course_details->category_id,
		'batch_title' => $this->input->post('batch_title',TRUE),
		'description' => $this->input->post('description',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'batch_type' => $this->input->post('batch_type',TRUE),
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		'start_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('start_date',TRUE)))),
		'end_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('end_date',TRUE)))),
		'week_days' => $this->input->post('week_days',TRUE),
		'student_enrolled' => $this->input->post('student_enrolled',TRUE),
		'batch_capacity' => $this->input->post('batch_capacity',TRUE),
		'iscorporate' => $this->input->post('iscorporate',TRUE),
		'currency_id' => $this->input->post('currency_id',TRUE),
		'batch_fee_type' => $this->input->post('batch_fee_type',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		'course_fee' => $this->input->post('course_fee',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batches_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('batches'));
        }
    }
    
    public function update($id) 
    {
		$course_fee_type_list = $this->Course_fee_type_model->get_all();
		$batch_pattern_list = $this->Batch_pattern_model->get_all();
		$branch_list = $this->Branch_model->get_all();
		$batch_type_list = $this->batch_type_model->get_all();
		$staff_list = $this->Staff_details_model->get_all();
		$currrency_list = $this->Currency_model->get_all();
		$course_list = $this->Courses_catalog_model->get_all();
        $row = $this->Batches_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('batches/update_action'),
				'title'  => 'TRAMS::SCP::Update Batches',
		'batch_id' => set_value('batch_id', $row->batch_id),
		'course_id' => set_value('course_id', $row->course_id),
		'category_id' => set_value('category_id', $row->category_id),
		'batch_title' => set_value('batch_title', $row->batch_title),
		'description' => set_value('description', $row->description),
		'faculty_id' => set_value('faculty_id', $row->faculty_id),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'batch_type' => set_value('batch_type', $row->batch_type),
		'batch_pattern' => set_value('batch_pattern', $row->batch_pattern),
		'start_date' => set_value('start_date', date("m/d/Y", strtotime($row->start_date))),
		'end_date' => set_value('end_date', date("m/d/Y", strtotime($row->end_date))),
		'week_days' => set_value('week_days', $row->week_days),
		'student_enrolled' => set_value('student_enrolled', $row->student_enrolled),
		'batch_capacity' => set_value('batch_capacity', $row->batch_capacity),
		'iscorporate' => set_value('iscorporate', $row->iscorporate),
		'currency_id' => set_value('currency_id', $row->currency_id),
		'batch_fee_type' => set_value('batch_fee_type', $row->batch_fee_type),
		'fees' => set_value('fees', $row->fees),
		'course_fee_type' => set_value('course_fee_type', $row->course_fee_type),
		'course_fee' => set_value('course_fee', $row->course_fee),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
		'course_fee_type_list' => $course_fee_type_list,
		'branch_list' => $branch_list,
		'batch_pattern_list' => $batch_pattern_list,
		'batch_type_list' => $batch_type_list,
		'staff_list' => $staff_list,
		'currrency_list' => $currrency_list,
		'course_list' => $course_list,
	    );
			$this->_tpl('batches/batches_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('batch_id', TRUE));
        } else {
		$course_details = $this->Courses_catalog_model->get_by_id($this->input->post('course_id',TRUE));
            $data = array(
		'course_id' => $this->input->post('course_id',TRUE),
		'category_id' => $course_details->category_id,
		'batch_title' => $this->input->post('batch_title',TRUE),
		'description' => $this->input->post('description',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'batch_type' => $this->input->post('batch_type',TRUE),
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		'start_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('start_date',TRUE)))),
		'end_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('end_date',TRUE)))),
		'week_days' => $this->input->post('week_days',TRUE),
		'student_enrolled' => $this->input->post('student_enrolled',TRUE),
		'batch_capacity' => $this->input->post('batch_capacity',TRUE),
		'iscorporate' => $this->input->post('iscorporate',TRUE),
		'currency_id' => $this->input->post('currency_id',TRUE),
		'batch_fee_type' => $this->input->post('batch_fee_type',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		'course_fee' => $this->input->post('course_fee',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batches_model->update($this->input->post('batch_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('batches'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Batches_model->get_by_id($id);

        if ($row) {
            $this->Batches_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('batches'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('course_id', 'course id', 'trim|required');
	$this->form_validation->set_rules('batch_title', 'batch title', 'trim|required');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required');
	$this->form_validation->set_rules('batch_type', 'batch type', 'trim|required');
	$this->form_validation->set_rules('batch_pattern', 'batch pattern', 'trim|required');
	$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
	$this->form_validation->set_rules('end_date', 'end date', 'trim|required');
	$this->form_validation->set_rules('currency_id', 'currency id', 'trim|required');
	$this->form_validation->set_rules('batch_fee_type', 'batch fee type', 'trim|required');
	$this->form_validation->set_rules('course_fee_type', 'course fee type', 'trim|required');
		
		

	$this->form_validation->set_rules('batch_id', 'batch_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Batches_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Batches.php */
