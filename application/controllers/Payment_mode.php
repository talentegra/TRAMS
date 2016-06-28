<?php

/* Location: ./application/controllers/Payment_mode.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:50:04 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_mode extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_mode_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::payment_mode',
            'sort_by' => 'DESC',
            'sort_column' => 'payment_mode_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('payment_mode/payment_mode_list', $data);
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
        $config['div'] = 'Payment_mode_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Payment_mode/list_data';
        $config['total_rows'] = $this->Payment_mode_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $payment_mode_data = $this->Payment_mode_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'payment_mode_data' => $payment_mode_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('payment_mode/payment_mode_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Payment_mode_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Payment_mode',
		'payment_mode_id' => $row->payment_mode_id,
		'payment_mode' => $row->payment_mode,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('payment_mode/payment_mode_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_mode'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('payment_mode/create_action'),
			'title'  => 'TRAMS::SCP::Create Payment_mode',
	    'payment_mode_id' => set_value('payment_mode_id'),
	    'payment_mode' => set_value('payment_mode'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('payment_mode/payment_mode_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'payment_mode' => $this->input->post('payment_mode',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Payment_mode_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('payment_mode'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Payment_mode_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('payment_mode/update_action'),
				'title'  => 'TRAMS::SCP::Update Payment_mode',
		'payment_mode_id' => set_value('payment_mode_id', $row->payment_mode_id),
		'payment_mode' => set_value('payment_mode', $row->payment_mode),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('payment_mode/payment_mode_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_mode'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('payment_mode_id', TRUE));
        } else {
            $data = array(
		'payment_mode' => $this->input->post('payment_mode',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Payment_mode_model->update($this->input->post('payment_mode_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('payment_mode'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Payment_mode_model->get_by_id($id);

        if ($row) {
            $this->Payment_mode_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('payment_mode'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('payment_mode'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('payment_mode', 'payment mode', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required|numeric');
		
		

	$this->form_validation->set_rules('payment_mode_id', 'payment_mode_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Payment_mode.php */
