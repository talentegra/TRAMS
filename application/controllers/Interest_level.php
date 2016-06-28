<?php

/* Location: ./application/controllers/Interest_level.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:49:30 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Interest_level extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Interest_level_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::interest_level',
            'sort_by' => 'DESC',
            'sort_column' => 'interest_level_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('interest_level/interest_level_list', $data);
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
        $config['div'] = 'Interest_level_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Interest_level/list_data';
        $config['total_rows'] = $this->Interest_level_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $interest_level_data = $this->Interest_level_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'interest_level_data' => $interest_level_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('interest_level/interest_level_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Interest_level_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Interest_level',
		'interest_level_id' => $row->interest_level_id,
		'interest_level' => $row->interest_level,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('interest_level/interest_level_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('interest_level'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('interest_level/create_action'),
			'title'  => 'TRAMS::SCP::Create Interest_level',
	    'interest_level_id' => set_value('interest_level_id'),
	    'interest_level' => set_value('interest_level'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('interest_level/interest_level_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'interest_level' => $this->input->post('interest_level',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Interest_level_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('interest_level'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Interest_level_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('interest_level/update_action'),
				'title'  => 'TRAMS::SCP::Update Interest_level',
		'interest_level_id' => set_value('interest_level_id', $row->interest_level_id),
		'interest_level' => set_value('interest_level', $row->interest_level),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('interest_level/interest_level_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('interest_level'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('interest_level_id', TRUE));
        } else {
            $data = array(
		'interest_level' => $this->input->post('interest_level',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Interest_level_model->update($this->input->post('interest_level_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('interest_level'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Interest_level_model->get_by_id($id);

        if ($row) {
            $this->Interest_level_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('interest_level'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('interest_level'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('interest_level', 'interest level', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('interest_level_id', 'interest_level_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Interest_level.php */
