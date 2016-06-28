<?php

/* Location: ./application/controllers/Currency.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:48:18 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Currency extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Currency_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::currency',
            'sort_by' => 'DESC',
            'sort_column' => 'currency_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('currency/currency_list', $data);
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
        $config['div'] = 'Currency_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Currency/list_data';
        $config['total_rows'] = $this->Currency_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $currency_data = $this->Currency_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'currency_data' => $currency_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('currency/currency_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Currency_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Currency',
		'currency_id' => $row->currency_id,
		'currency_name' => $row->currency_name,
		'currency_symbol' => $row->currency_symbol,
		'currency_short' => $row->currency_short,
		'country_id' => $row->country_id,
		'conversion' => $row->conversion,
		'active' => $row->active,
		'created' => $row->created,
	    );
			$this->_tpl('currency/currency_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('currency'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('currency/create_action'),
			'title'  => 'TRAMS::SCP::Create Currency',
	    'currency_id' => set_value('currency_id'),
	    'currency_name' => set_value('currency_name'),
	    'currency_symbol' => set_value('currency_symbol'),
	    'currency_short' => set_value('currency_short'),
	    'country_id' => set_value('country_id'),
	    'conversion' => set_value('conversion'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	);
          $this->_tpl('currency/currency_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'currency_name' => $this->input->post('currency_name',TRUE),
		'currency_symbol' => $this->input->post('currency_symbol',TRUE),
		'currency_short' => $this->input->post('currency_short',TRUE),
		'country_id' => $this->input->post('country_id',TRUE),
		'conversion' => $this->input->post('conversion',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
	    );

            $this->Currency_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('currency'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Currency_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('currency/update_action'),
				'title'  => 'TRAMS::SCP::Update Currency',
		'currency_id' => set_value('currency_id', $row->currency_id),
		'currency_name' => set_value('currency_name', $row->currency_name),
		'currency_symbol' => set_value('currency_symbol', $row->currency_symbol),
		'currency_short' => set_value('currency_short', $row->currency_short),
		'country_id' => set_value('country_id', $row->country_id),
		'conversion' => set_value('conversion', $row->conversion),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
	    );
			$this->_tpl('currency/currency_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('currency'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('currency_id', TRUE));
        } else {
            $data = array(
		'currency_name' => $this->input->post('currency_name',TRUE),
		'currency_symbol' => $this->input->post('currency_symbol',TRUE),
		'currency_short' => $this->input->post('currency_short',TRUE),
		'country_id' => $this->input->post('country_id',TRUE),
		'conversion' => $this->input->post('conversion',TRUE),
		'active' => $this->input->post('active',TRUE),
		
	    );

            $this->Currency_model->update($this->input->post('currency_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('currency'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Currency_model->get_by_id($id);

        if ($row) {
            $this->Currency_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('currency'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('currency'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('currency_name', 'currency name', 'trim|required');
	$this->form_validation->set_rules('currency_symbol', 'currency symbol', 'trim|required');
	$this->form_validation->set_rules('currency_short', 'currency short', 'trim|required');
	$this->form_validation->set_rules('country_id', 'country id', 'trim|required|numeric');
	$this->form_validation->set_rules('conversion', 'conversion', 'trim|required|numeric');
	$this->form_validation->set_rules('active', 'active', 'trim|required|numeric');
		

	$this->form_validation->set_rules('currency_id', 'currency_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Currency.php */
