<?php

/* Location: ./application/controllers/Transport.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:57:32 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transport extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transport_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::transport',
            'sort_by' => 'DESC',
            'sort_column' => 'transport_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('transport/transport_list', $data);
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
        $config['div'] = 'Transport_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Transport/list_data';
        $config['total_rows'] = $this->Transport_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $transport_data = $this->Transport_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'transport_data' => $transport_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('transport/transport_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Transport_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Transport',
		'transport_id' => $row->transport_id,
		'transport_mode' => $row->transport_mode,
		'transport_desc' => $row->transport_desc,
		'transport_per_unit' => $row->transport_per_unit,
		'transport_price' => $row->transport_price,
		'ispublic' => $row->ispublic,
	    );
			$this->_tpl('transport/transport_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transport'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transport/create_action'),
			'title'  => 'TRAMS::SCP::Create Transport',
	    'transport_id' => set_value('transport_id'),
	    'transport_mode' => set_value('transport_mode'),
	    'transport_desc' => set_value('transport_desc'),
	    'transport_per_unit' => set_value('transport_per_unit'),
	    'transport_price' => set_value('transport_price'),
	    'ispublic' => set_value('ispublic'),
	);
          $this->_tpl('transport/transport_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'transport_mode' => $this->input->post('transport_mode',TRUE),
		'transport_desc' => $this->input->post('transport_desc',TRUE),
		'transport_per_unit' => $this->input->post('transport_per_unit',TRUE),
		'transport_price' => $this->input->post('transport_price',TRUE),
		'ispublic' => $this->input->post('ispublic',TRUE),
	    );

            $this->Transport_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transport'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transport_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transport/update_action'),
				'title'  => 'TRAMS::SCP::Update Transport',
		'transport_id' => set_value('transport_id', $row->transport_id),
		'transport_mode' => set_value('transport_mode', $row->transport_mode),
		'transport_desc' => set_value('transport_desc', $row->transport_desc),
		'transport_per_unit' => set_value('transport_per_unit', $row->transport_per_unit),
		'transport_price' => set_value('transport_price', $row->transport_price),
		'ispublic' => set_value('ispublic', $row->ispublic),
	    );
			$this->_tpl('transport/transport_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transport'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('transport_id', TRUE));
        } else {
            $data = array(
		'transport_mode' => $this->input->post('transport_mode',TRUE),
		'transport_desc' => $this->input->post('transport_desc',TRUE),
		'transport_per_unit' => $this->input->post('transport_per_unit',TRUE),
		'transport_price' => $this->input->post('transport_price',TRUE),
		'ispublic' => $this->input->post('ispublic',TRUE),
	    );

            $this->Transport_model->update($this->input->post('transport_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transport'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transport_model->get_by_id($id);

        if ($row) {
            $this->Transport_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transport'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transport'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('transport_mode', 'transport mode', 'trim|required');
	$this->form_validation->set_rules('transport_desc', 'transport desc', 'trim|required');
	$this->form_validation->set_rules('transport_per_unit', 'transport per unit', 'trim|required|numeric');
	$this->form_validation->set_rules('transport_price', 'transport price', 'trim|required');
	$this->form_validation->set_rules('ispublic', 'ispublic', 'trim|required');

	$this->form_validation->set_rules('transport_id', 'transport_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Transport.php */
