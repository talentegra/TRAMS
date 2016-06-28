<?php

/* Location: ./application/controllers/Enrollment.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:48:54 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enrollment extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Enrollment_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::enrollment',
            'sort_by' => 'DESC',
            'sort_column' => 'enroll_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('enrollment/enrollment_list', $data);
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
        $config['div'] = 'Enrollment_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Enrollment/list_data';
        $config['total_rows'] = $this->Enrollment_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $enrollment_data = $this->Enrollment_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'enrollment_data' => $enrollment_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('enrollment/enrollment_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Enrollment_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Enrollment',
		'enroll_id' => $row->enroll_id,
		'enroll_date' => $row->enroll_date,
		'stud_id' => $row->stud_id,
		'batch_id' => $row->batch_id,
		'score' => $row->score,
		'registration_fee' => $row->registration_fee,
		'admission_fee' => $row->admission_fee,
		'discount' => $row->discount,
		'discount_percent' => $row->discount_percent,
		'tax' => $row->tax,
		'total_fee' => $row->total_fee,
		'payment_mode' => $row->payment_mode,
		'payment_option' => $row->payment_option,
		'notes' => $row->notes,
		'certificate_notes' => $row->certificate_notes,
	    );
			$this->_tpl('enrollment/enrollment_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enrollment'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('enrollment/create_action'),
			'title'  => 'TRAMS::SCP::Create Enrollment',
	    'enroll_id' => set_value('enroll_id'),
	    'enroll_date' => set_value('enroll_date'),
	    'stud_id' => set_value('stud_id'),
	    'batch_id' => set_value('batch_id'),
	    'score' => set_value('score'),
	    'registration_fee' => set_value('registration_fee'),
	    'admission_fee' => set_value('admission_fee'),
	    'discount' => set_value('discount'),
	    'discount_percent' => set_value('discount_percent'),
	    'tax' => set_value('tax'),
	    'total_fee' => set_value('total_fee'),
	    'payment_mode' => set_value('payment_mode'),
	    'payment_option' => set_value('payment_option'),
	    'notes' => set_value('notes'),
	    'certificate_notes' => set_value('certificate_notes'),
	);
          $this->_tpl('enrollment/enrollment_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'enroll_date' => $this->input->post('enroll_date',TRUE),
		'stud_id' => $this->input->post('stud_id',TRUE),
		'batch_id' => $this->input->post('batch_id',TRUE),
		'score' => $this->input->post('score',TRUE),
		'registration_fee' => $this->input->post('registration_fee',TRUE),
		'admission_fee' => $this->input->post('admission_fee',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'discount_percent' => $this->input->post('discount_percent',TRUE),
		'tax' => $this->input->post('tax',TRUE),
		'total_fee' => $this->input->post('total_fee',TRUE),
		'payment_mode' => $this->input->post('payment_mode',TRUE),
		'payment_option' => $this->input->post('payment_option',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'certificate_notes' => $this->input->post('certificate_notes',TRUE),
	    );

            $this->Enrollment_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('enrollment'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Enrollment_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('enrollment/update_action'),
				'title'  => 'TRAMS::SCP::Update Enrollment',
		'enroll_id' => set_value('enroll_id', $row->enroll_id),
		'enroll_date' => set_value('enroll_date', $row->enroll_date),
		'stud_id' => set_value('stud_id', $row->stud_id),
		'batch_id' => set_value('batch_id', $row->batch_id),
		'score' => set_value('score', $row->score),
		'registration_fee' => set_value('registration_fee', $row->registration_fee),
		'admission_fee' => set_value('admission_fee', $row->admission_fee),
		'discount' => set_value('discount', $row->discount),
		'discount_percent' => set_value('discount_percent', $row->discount_percent),
		'tax' => set_value('tax', $row->tax),
		'total_fee' => set_value('total_fee', $row->total_fee),
		'payment_mode' => set_value('payment_mode', $row->payment_mode),
		'payment_option' => set_value('payment_option', $row->payment_option),
		'notes' => set_value('notes', $row->notes),
		'certificate_notes' => set_value('certificate_notes', $row->certificate_notes),
	    );
			$this->_tpl('enrollment/enrollment_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enrollment'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('enroll_id', TRUE));
        } else {
            $data = array(
		'enroll_date' => $this->input->post('enroll_date',TRUE),
		'stud_id' => $this->input->post('stud_id',TRUE),
		'batch_id' => $this->input->post('batch_id',TRUE),
		'score' => $this->input->post('score',TRUE),
		'registration_fee' => $this->input->post('registration_fee',TRUE),
		'admission_fee' => $this->input->post('admission_fee',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'discount_percent' => $this->input->post('discount_percent',TRUE),
		'tax' => $this->input->post('tax',TRUE),
		'total_fee' => $this->input->post('total_fee',TRUE),
		'payment_mode' => $this->input->post('payment_mode',TRUE),
		'payment_option' => $this->input->post('payment_option',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'certificate_notes' => $this->input->post('certificate_notes',TRUE),
	    );

            $this->Enrollment_model->update($this->input->post('enroll_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('enrollment'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Enrollment_model->get_by_id($id);

        if ($row) {
            $this->Enrollment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('enrollment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('enrollment'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('enroll_date', 'enroll date', 'trim|required');
	$this->form_validation->set_rules('stud_id', 'stud id', 'trim|required|numeric');
	$this->form_validation->set_rules('batch_id', 'batch id', 'trim|required|numeric');
	$this->form_validation->set_rules('score', 'score', 'trim|required');
	$this->form_validation->set_rules('registration_fee', 'registration fee', 'trim|required');
	$this->form_validation->set_rules('admission_fee', 'admission fee', 'trim|required');
	$this->form_validation->set_rules('discount', 'discount', 'trim|required');
	$this->form_validation->set_rules('discount_percent', 'discount percent', 'trim|required');
	$this->form_validation->set_rules('tax', 'tax', 'trim|required');
	$this->form_validation->set_rules('total_fee', 'total fee', 'trim|required');
	$this->form_validation->set_rules('payment_mode', 'payment mode', 'trim|required');
	$this->form_validation->set_rules('payment_option', 'payment option', 'trim|required');
	$this->form_validation->set_rules('notes', 'notes', 'trim|required');
	$this->form_validation->set_rules('certificate_notes', 'certificate notes', 'trim|required');

	$this->form_validation->set_rules('enroll_id', 'enroll_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Enrollment.php */
