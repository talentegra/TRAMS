<?php

/* Location: ./application/controllers/Categories.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-27 17:18:47 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::categories',
            'sort_by' => 'DESC',
            'sort_column' => 'category_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('categories/categories_list', $data);
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
        $config['div'] = 'Categories_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Categories/list_data';
        $config['total_rows'] = $this->Categories_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $categories_data = $this->Categories_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'categories_data' => $categories_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('categories/categories_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Categories_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Categories',
		'category_id' => $row->category_id,
		'parent_id' => $row->parent_id,
		'category_name' => $row->category_name,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('categories/categories_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }

    public function create() 
    {
		$category_list = $this->Categories_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('categories/create_action'),
			'title'  => 'TRAMS::SCP::Create Categories',
	    'category_id' => set_value('category_id'),
	    'parent_id' => set_value('parent_id'),
	    'category_name' => set_value('category_name'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
		'category_list' => $category_list
	);
          $this->_tpl('categories/categories_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'parent_id' => $this->input->post('parent_id',TRUE),
		'category_name' => $this->input->post('category_name',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Categories_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('categories'));
        }
    }
    
    public function update($id) 
    {
		$category_list = $this->Categories_model->get_all();
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('categories/update_action'),
				'title'  => 'TRAMS::SCP::Update Categories',
		'category_id' => set_value('category_id', $row->category_id),
		'parent_id' => set_value('parent_id', $row->parent_id),
		'category_name' => set_value('category_name', $row->category_name),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
		'category_list' => $category_list
	    );
			$this->_tpl('categories/categories_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('category_id', TRUE));
        } else {
            $data = array(
		'parent_id' => $this->input->post('parent_id',TRUE),
		'category_name' => $this->input->post('category_name',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Categories_model->update($this->input->post('category_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('categories'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $this->Categories_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('categories'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('category_name', 'category name', 'trim|required');
		
		

	$this->form_validation->set_rules('category_id', 'category_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Categories_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Categories.php */
