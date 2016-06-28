<?php

/* Location: ./application/controllers/Perm_to_group.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 17:41:52 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perm_to_group extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perm_to_group_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::arbac_perm_to_group',
            'sort_by' => 'DESC',
            'sort_column' => 'perm_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('perm_to_group/perm_to_group_list', $data);
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
        $config['div'] = 'Perm_to_group_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Perm_to_group/list_data';
        $config['total_rows'] = $this->Perm_to_group_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $perm_to_group_data = $this->Perm_to_group_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'perm_to_group_data' => $perm_to_group_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('perm_to_group/perm_to_group_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Perm_to_group_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Perm_to_group',
		'perm_id' => $row->perm_id,
		'group_id' => $row->group_id,
	    );
			$this->_tpl('perm_to_group/perm_to_group_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perm_to_group'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perm_to_group/create_action'),
			'title'  => 'TRAMS::SCP::Create Perm_to_group',
	    'perm_id' => set_value('perm_id'),
	    'group_id' => set_value('group_id'),
	);
          $this->_tpl('perm_to_group/perm_to_group_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
	    );

            $this->Perm_to_group_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perm_to_group'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perm_to_group_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perm_to_group/update_action'),
				'title'  => 'TRAMS::SCP::Update Perm_to_group',
		'perm_id' => set_value('perm_id', $row->perm_id),
		'group_id' => set_value('group_id', $row->group_id),
	    );
			$this->_tpl('perm_to_group/perm_to_group_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perm_to_group'));
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

            $this->Perm_to_group_model->update($this->input->post('perm_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perm_to_group'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perm_to_group_model->get_by_id($id);

        if ($row) {
            $this->Perm_to_group_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perm_to_group'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perm_to_group'));
        }
    }

    public function _rules() 
    {

	$this->form_validation->set_rules('perm_id', 'perm_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Perm_to_group.php */
