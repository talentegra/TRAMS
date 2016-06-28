<?php

/* Location: ./application/controllers/Accounts.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:45:31 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounts extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Accounts_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::accounts',
            'sort_by' => 'DESC',
            'sort_column' => 'account_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('accounts/accounts_list', $data);
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
        $config['div'] = 'Accounts_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Accounts/list_data';
        $config['total_rows'] = $this->Accounts_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $accounts_data = $this->Accounts_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'accounts_data' => $accounts_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('accounts/accounts_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Accounts_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Accounts',
		'account_id' => $row->account_id,
		'payee_name' => $row->payee_name,
		'amount_type' => $row->amount_type,
		'branch_id' => $row->branch_id,
		'payable_for' => $row->payable_for,
		'student_id' => $row->student_id,
		'total_amount' => $row->total_amount,
		'primary_date' => $row->primary_date,
		'due_date' => $row->due_date,
		'payment_type' => $row->payment_type,
		'account_type' => $row->account_type,
		'paid_amount' => $row->paid_amount,
		'due_amount' => $row->due_amount,
		'payment_date' => $row->payment_date,
		'payment_mode_id' => $row->payment_mode_id,
		'comments' => $row->comments,
		'account_status' => $row->account_status,
	    );
			$this->_tpl('accounts/accounts_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('accounts'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('accounts/create_action'),
			'title'  => 'TRAMS::SCP::Create Accounts',
	    'account_id' => set_value('account_id'),
	    'payee_name' => set_value('payee_name'),
	    'amount_type' => set_value('amount_type'),
	    'branch_id' => set_value('branch_id'),
	    'payable_for' => set_value('payable_for'),
	    'student_id' => set_value('student_id'),
	    'total_amount' => set_value('total_amount'),
	    'primary_date' => set_value('primary_date'),
	    'due_date' => set_value('due_date'),
	    'payment_type' => set_value('payment_type'),
	    'account_type' => set_value('account_type'),
	    'paid_amount' => set_value('paid_amount'),
	    'due_amount' => set_value('due_amount'),
	    'payment_date' => set_value('payment_date'),
	    'payment_mode_id' => set_value('payment_mode_id'),
	    'comments' => set_value('comments'),
	    'account_status' => set_value('account_status'),
	);
          $this->_tpl('accounts/accounts_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'payee_name' => $this->input->post('payee_name',TRUE),
		'amount_type' => $this->input->post('amount_type',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'payable_for' => $this->input->post('payable_for',TRUE),
		'student_id' => $this->input->post('student_id',TRUE),
		'total_amount' => $this->input->post('total_amount',TRUE),
		'primary_date' => $this->input->post('primary_date',TRUE),
		'due_date' => $this->input->post('due_date',TRUE),
		'payment_type' => $this->input->post('payment_type',TRUE),
		'account_type' => $this->input->post('account_type',TRUE),
		'paid_amount' => $this->input->post('paid_amount',TRUE),
		'due_amount' => $this->input->post('due_amount',TRUE),
		'payment_date' => $this->input->post('payment_date',TRUE),
		'payment_mode_id' => $this->input->post('payment_mode_id',TRUE),
		'comments' => $this->input->post('comments',TRUE),
		'account_status' => $this->input->post('account_status',TRUE),
	    );

            $this->Accounts_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('accounts'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Accounts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('accounts/update_action'),
				'title'  => 'TRAMS::SCP::Update Accounts',
		'account_id' => set_value('account_id', $row->account_id),
		'payee_name' => set_value('payee_name', $row->payee_name),
		'amount_type' => set_value('amount_type', $row->amount_type),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'payable_for' => set_value('payable_for', $row->payable_for),
		'student_id' => set_value('student_id', $row->student_id),
		'total_amount' => set_value('total_amount', $row->total_amount),
		'primary_date' => set_value('primary_date', $row->primary_date),
		'due_date' => set_value('due_date', $row->due_date),
		'payment_type' => set_value('payment_type', $row->payment_type),
		'account_type' => set_value('account_type', $row->account_type),
		'paid_amount' => set_value('paid_amount', $row->paid_amount),
		'due_amount' => set_value('due_amount', $row->due_amount),
		'payment_date' => set_value('payment_date', $row->payment_date),
		'payment_mode_id' => set_value('payment_mode_id', $row->payment_mode_id),
		'comments' => set_value('comments', $row->comments),
		'account_status' => set_value('account_status', $row->account_status),
	    );
			$this->_tpl('accounts/accounts_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('accounts'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('account_id', TRUE));
        } else {
            $data = array(
		'payee_name' => $this->input->post('payee_name',TRUE),
		'amount_type' => $this->input->post('amount_type',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'payable_for' => $this->input->post('payable_for',TRUE),
		'student_id' => $this->input->post('student_id',TRUE),
		'total_amount' => $this->input->post('total_amount',TRUE),
		'primary_date' => $this->input->post('primary_date',TRUE),
		'due_date' => $this->input->post('due_date',TRUE),
		'payment_type' => $this->input->post('payment_type',TRUE),
		'account_type' => $this->input->post('account_type',TRUE),
		'paid_amount' => $this->input->post('paid_amount',TRUE),
		'due_amount' => $this->input->post('due_amount',TRUE),
		'payment_date' => $this->input->post('payment_date',TRUE),
		'payment_mode_id' => $this->input->post('payment_mode_id',TRUE),
		'comments' => $this->input->post('comments',TRUE),
		'account_status' => $this->input->post('account_status',TRUE),
	    );

            $this->Accounts_model->update($this->input->post('account_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('accounts'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Accounts_model->get_by_id($id);

        if ($row) {
            $this->Accounts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('accounts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('accounts'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('payee_name', 'payee name', 'trim|required');
	$this->form_validation->set_rules('amount_type', 'amount type', 'trim|required|numeric');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('payable_for', 'payable for', 'trim|required');
	$this->form_validation->set_rules('student_id', 'student id', 'trim|required|numeric');
	$this->form_validation->set_rules('total_amount', 'total amount', 'trim|required');
	$this->form_validation->set_rules('primary_date', 'primary date', 'trim|required');
	$this->form_validation->set_rules('due_date', 'due date', 'trim|required');
	$this->form_validation->set_rules('payment_type', 'payment type', 'trim|required');
	$this->form_validation->set_rules('account_type', 'account type', 'trim|required');
	$this->form_validation->set_rules('paid_amount', 'paid amount', 'trim|required');
	$this->form_validation->set_rules('due_amount', 'due amount', 'trim|required');
	$this->form_validation->set_rules('payment_date', 'payment date', 'trim|required');
	$this->form_validation->set_rules('payment_mode_id', 'payment mode id', 'trim|required');
	$this->form_validation->set_rules('comments', 'comments', 'trim|required');
	$this->form_validation->set_rules('account_status', 'account status', 'trim|required|numeric');

	$this->form_validation->set_rules('account_id', 'account_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Accounts.php */
