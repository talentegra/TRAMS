<?php

/* Location: ./application/controllers/Country.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:47:44 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Country_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::country',
            'sort_by' => 'DESC',
            'sort_column' => 'country_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('country/country_list', $data);
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
        $config['div'] = 'Country_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Country/list_data';
        $config['total_rows'] = $this->Country_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $country_data = $this->Country_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'country_data' => $country_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('country/country_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Country_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Country',
		'country_id' => $row->country_id,
		'country_name' => $row->country_name,
		'country_short' => $row->country_short,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('country/country_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('country/create_action'),
			'title'  => 'TRAMS::SCP::Create Country',
	    'country_id' => set_value('country_id'),
	    'country_name' => set_value('country_name'),
	    'country_short' => set_value('country_short'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('country/country_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'country_name' => $this->input->post('country_name',TRUE),
		'country_short' => $this->input->post('country_short',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Country_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('country'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Country_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('country/update_action'),
				'title'  => 'TRAMS::SCP::Update Country',
		'country_id' => set_value('country_id', $row->country_id),
		'country_name' => set_value('country_name', $row->country_name),
		'country_short' => set_value('country_short', $row->country_short),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('country/country_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('country_id', TRUE));
        } else {
            $data = array(
		'country_name' => $this->input->post('country_name',TRUE),
		'country_short' => $this->input->post('country_short',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Country_model->update($this->input->post('country_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('country'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Country_model->get_by_id($id);

        if ($row) {
            $this->Country_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('country'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('country_name', 'country name', 'trim|required');
	$this->form_validation->set_rules('country_short', 'country short', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('country_id', 'country_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Country.php */
