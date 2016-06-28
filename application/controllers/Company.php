<?php

/* Location: ./application/controllers/Company.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:47:05 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::company',
            'sort_by' => 'DESC',
            'sort_column' => 'company_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('company/company_list', $data);
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
        $config['div'] = 'Company_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Company/list_data';
        $config['total_rows'] = $this->Company_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $company_data = $this->Company_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'company_data' => $company_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('company/company_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Company_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Company',
		'company_id' => $row->company_id,
		'company_name' => $row->company_name,
		'company_address' => $row->company_address,
		'city_id' => $row->city_id,
		'company_pincode' => $row->company_pincode,
		'company_email' => $row->company_email,
		'company_domain' => $row->company_domain,
		'company_phone' => $row->company_phone,
		'company_contact_name' => $row->company_contact_name,
		'company_contact_email' => $row->company_contact_email,
		'company_contact_mobile' => $row->company_contact_mobile,
		'company_discount' => $row->company_discount,
	    );
			$this->_tpl('company/company_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('company/create_action'),
			'title'  => 'TRAMS::SCP::Create Company',
	    'company_id' => set_value('company_id'),
	    'company_name' => set_value('company_name'),
	    'company_address' => set_value('company_address'),
	    'city_id' => set_value('city_id'),
	    'company_pincode' => set_value('company_pincode'),
	    'company_email' => set_value('company_email'),
	    'company_domain' => set_value('company_domain'),
	    'company_phone' => set_value('company_phone'),
	    'company_contact_name' => set_value('company_contact_name'),
	    'company_contact_email' => set_value('company_contact_email'),
	    'company_contact_mobile' => set_value('company_contact_mobile'),
	    'company_discount' => set_value('company_discount'),
	);
          $this->_tpl('company/company_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'company_name' => $this->input->post('company_name',TRUE),
		'company_address' => $this->input->post('company_address',TRUE),
		'city_id' => $this->input->post('city_id',TRUE),
		'company_pincode' => $this->input->post('company_pincode',TRUE),
		'company_email' => $this->input->post('company_email',TRUE),
		'company_domain' => $this->input->post('company_domain',TRUE),
		'company_phone' => $this->input->post('company_phone',TRUE),
		'company_contact_name' => $this->input->post('company_contact_name',TRUE),
		'company_contact_email' => $this->input->post('company_contact_email',TRUE),
		'company_contact_mobile' => $this->input->post('company_contact_mobile',TRUE),
		'company_discount' => $this->input->post('company_discount',TRUE),
	    );

            $this->Company_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('company'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Company_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('company/update_action'),
				'title'  => 'TRAMS::SCP::Update Company',
		'company_id' => set_value('company_id', $row->company_id),
		'company_name' => set_value('company_name', $row->company_name),
		'company_address' => set_value('company_address', $row->company_address),
		'city_id' => set_value('city_id', $row->city_id),
		'company_pincode' => set_value('company_pincode', $row->company_pincode),
		'company_email' => set_value('company_email', $row->company_email),
		'company_domain' => set_value('company_domain', $row->company_domain),
		'company_phone' => set_value('company_phone', $row->company_phone),
		'company_contact_name' => set_value('company_contact_name', $row->company_contact_name),
		'company_contact_email' => set_value('company_contact_email', $row->company_contact_email),
		'company_contact_mobile' => set_value('company_contact_mobile', $row->company_contact_mobile),
		'company_discount' => set_value('company_discount', $row->company_discount),
	    );
			$this->_tpl('company/company_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('company_id', TRUE));
        } else {
            $data = array(
		'company_name' => $this->input->post('company_name',TRUE),
		'company_address' => $this->input->post('company_address',TRUE),
		'city_id' => $this->input->post('city_id',TRUE),
		'company_pincode' => $this->input->post('company_pincode',TRUE),
		'company_email' => $this->input->post('company_email',TRUE),
		'company_domain' => $this->input->post('company_domain',TRUE),
		'company_phone' => $this->input->post('company_phone',TRUE),
		'company_contact_name' => $this->input->post('company_contact_name',TRUE),
		'company_contact_email' => $this->input->post('company_contact_email',TRUE),
		'company_contact_mobile' => $this->input->post('company_contact_mobile',TRUE),
		'company_discount' => $this->input->post('company_discount',TRUE),
	    );

            $this->Company_model->update($this->input->post('company_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('company'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Company_model->get_by_id($id);

        if ($row) {
            $this->Company_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('company'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('company'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('company_name', 'company name', 'trim|required');
	$this->form_validation->set_rules('company_address', 'company address', 'trim|required');
	$this->form_validation->set_rules('city_id', 'city id', 'trim|required|numeric');
	$this->form_validation->set_rules('company_pincode', 'company pincode', 'trim|required|numeric');
	$this->form_validation->set_rules('company_email', 'company email', 'trim|required');
	$this->form_validation->set_rules('company_domain', 'company domain', 'trim|required');
	$this->form_validation->set_rules('company_phone', 'company phone', 'trim|required');
	$this->form_validation->set_rules('company_contact_name', 'company contact name', 'trim|required');
	$this->form_validation->set_rules('company_contact_email', 'company contact email', 'trim|required');
	$this->form_validation->set_rules('company_contact_mobile', 'company contact mobile', 'trim|required');
	$this->form_validation->set_rules('company_discount', 'company discount', 'trim|required|numeric');

	$this->form_validation->set_rules('company_id', 'company_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Company.php */
