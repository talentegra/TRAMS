<?php

/* Location: ./application/controllers/Sla.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-21 21:21:30 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sla extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sla_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $sla = $this->Sla_model->get_all();

        $data = array(
            'sla_data' => $sla
        );
		$this->load->view('templates/header', $data); 	
        $this->load->view('sla/sla_list', $data);
		$this->load->view('templates/footer', $data); 	
		
    }

    public function read($id) 
    {
        $row = $this->Sla_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'flags' => $row->flags,
		'grace_period' => $row->grace_period,
		'name' => $row->name,
		'notes' => $row->notes,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('sla/sla_read', $data);
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sla'));
        }
    }

    public function create() 
    {
        if(!$this->arbac->is_allowed('create_sla', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('sla')); } 	
		$data = array(
            'button' => 'Create',
            'action' => site_url('sla/create_action'),
	    'id' => set_value('id'),
	    'flags' => set_value('flags'),
	    'grace_period' => set_value('grace_period'),
	    'name' => set_value('name'),
	    'notes' => set_value('notes'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
        $this->load->view('templates/header', $data); 	
        $this->load->view('sla/sla_form', $data);
		$this->load->view('templates/footer', $data); 	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'flags' => $this->input->post('flags',TRUE),
		'grace_period' => $this->input->post('grace_period',TRUE),
		'name' => $this->input->post('name',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Sla_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sla'));
        }
    }
    
    public function update($id) 
    {
        if(!$this->arbac->is_allowed('edit_sla', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('sla')); } 	
		$row = $this->Sla_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sla/update_action'),
		'id' => set_value('id', $row->id),
		'flags' => set_value('flags', $row->flags),
		'grace_period' => set_value('grace_period', $row->grace_period),
		'name' => set_value('name', $row->name),
		'notes' => set_value('notes', $row->notes),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('sla/sla_form', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sla'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'flags' => $this->input->post('flags',TRUE),
		'grace_period' => $this->input->post('grace_period',TRUE),
		'name' => $this->input->post('name',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Sla_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sla'));
        }
    }
    
    public function delete($id) 
    {
         if(!$this->arbac->is_allowed('delete_sla', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('sla')); } 	
		$row = $this->Sla_model->get_by_id($id);

        if ($row) {
            $this->Sla_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sla'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sla'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('flags', 'flags', 'trim|required');
	$this->form_validation->set_rules('grace_period', 'grace period', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	
		
		

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sla.php */
