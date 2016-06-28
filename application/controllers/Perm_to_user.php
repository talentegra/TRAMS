<?php

/* Location: ./application/controllers/Perm_to_user.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 17:42:13 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perm_to_user extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perm_to_user_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::arbac_perm_to_user',
            'sort_by' => 'DESC',
            'sort_column' => 'perm_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('perm_to_user/perm_to_user_list', $data);
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
        $config['div'] = 'Perm_to_user_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Perm_to_user/list_data';
        $config['total_rows'] = $this->Perm_to_user_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $perm_to_user_data = $this->Perm_to_user_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'perm_to_user_data' => $perm_to_user_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('perm_to_user/perm_to_user_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Perm_to_user_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Perm_to_user',
		'perm_id' => $row->perm_id,
		'user_id' => $row->user_id,
	    );
			$this->_tpl('perm_to_user/perm_to_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perm_to_user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perm_to_user/create_action'),
			'title'  => 'TRAMS::SCP::Create Perm_to_user',
	    'perm_id' => set_value('perm_id'),
	    'user_id' => set_value('user_id'),
	);
          $this->_tpl('perm_to_user/perm_to_user_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Perm_to_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perm_to_user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perm_to_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perm_to_user/update_action'),
				'title'  => 'TRAMS::SCP::Update Perm_to_user',
		'perm_id' => set_value('perm_id', $row->perm_id),
		'user_id' => set_value('user_id', $row->user_id),
	    );
			$this->_tpl('perm_to_user/perm_to_user_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perm_to_user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('perm_id', TRUE));
        } else {
            $data = array(
	    );

            $this->Perm_to_user_model->update($this->input->post('perm_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perm_to_user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perm_to_user_model->get_by_id($id);

        if ($row) {
            $this->Perm_to_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perm_to_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perm_to_user'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('perm_id', 'perm_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perm_to_user.php */
