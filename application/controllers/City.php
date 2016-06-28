<?php

/* Location: ./application/controllers/City.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:46:56 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class City extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('City_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::city',
            'sort_by' => 'DESC',
            'sort_column' => 'city_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('city/city_list', $data);
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
        $config['div'] = 'City_list'; //parent div tag id
        $config['base_url'] = base_url(). 'City/list_data';
        $config['total_rows'] = $this->City_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $city_data = $this->City_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'city_data' => $city_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('city/city_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->City_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::City',
		'city_id' => $row->city_id,
		'city_name' => $row->city_name,
		'state_id' => $row->state_id,
		'country_id' => $row->country_id,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('city/city_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('city/create_action'),
			'title'  => 'TRAMS::SCP::Create City',
	    'city_id' => set_value('city_id'),
	    'city_name' => set_value('city_name'),
	    'state_id' => set_value('state_id'),
	    'country_id' => set_value('country_id'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('city/city_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'city_name' => $this->input->post('city_name',TRUE),
		'state_id' => $this->input->post('state_id',TRUE),
		'country_id' => $this->input->post('country_id',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->City_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('city'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->City_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('city/update_action'),
				'title'  => 'TRAMS::SCP::Update City',
		'city_id' => set_value('city_id', $row->city_id),
		'city_name' => set_value('city_name', $row->city_name),
		'state_id' => set_value('state_id', $row->state_id),
		'country_id' => set_value('country_id', $row->country_id),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('city/city_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('city_id', TRUE));
        } else {
            $data = array(
		'city_name' => $this->input->post('city_name',TRUE),
		'state_id' => $this->input->post('state_id',TRUE),
		'country_id' => $this->input->post('country_id',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->City_model->update($this->input->post('city_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('city'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->City_model->get_by_id($id);

        if ($row) {
            $this->City_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('city'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('city_name', 'city name', 'trim|required');
	$this->form_validation->set_rules('state_id', 'state id', 'trim|required|numeric');
	$this->form_validation->set_rules('country_id', 'country id', 'trim|required|numeric');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('city_id', 'city_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file City.php */
