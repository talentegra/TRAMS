<?php

/* Location: ./application/controllers/Batch_pattern.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:46:05 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batch_pattern extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Batch_pattern_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::batch_pattern',
            'sort_by' => 'DESC',
            'sort_column' => 'batch_pattern_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('batch_pattern/batch_pattern_list', $data);
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
        $config['div'] = 'Batch_pattern_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Batch_pattern/list_data';
        $config['total_rows'] = $this->Batch_pattern_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $batch_pattern_data = $this->Batch_pattern_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'batch_pattern_data' => $batch_pattern_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('batch_pattern/batch_pattern_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Batch_pattern_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Batch_pattern',
		'batch_pattern_id' => $row->batch_pattern_id,
		'batch_pattern' => $row->batch_pattern,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('batch_pattern/batch_pattern_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_pattern'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('batch_pattern/create_action'),
			'title'  => 'TRAMS::SCP::Create Batch_pattern',
	    'batch_pattern_id' => set_value('batch_pattern_id'),
	    'batch_pattern' => set_value('batch_pattern'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('batch_pattern/batch_pattern_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batch_pattern_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('batch_pattern'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Batch_pattern_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('batch_pattern/update_action'),
				'title'  => 'TRAMS::SCP::Update Batch_pattern',
		'batch_pattern_id' => set_value('batch_pattern_id', $row->batch_pattern_id),
		'batch_pattern' => set_value('batch_pattern', $row->batch_pattern),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('batch_pattern/batch_pattern_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_pattern'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('batch_pattern_id', TRUE));
        } else {
            $data = array(
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batch_pattern_model->update($this->input->post('batch_pattern_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('batch_pattern'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Batch_pattern_model->get_by_id($id);

        if ($row) {
            $this->Batch_pattern_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('batch_pattern'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_pattern'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('batch_pattern', 'batch pattern', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('batch_pattern_id', 'batch_pattern_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Batch_pattern.php */
