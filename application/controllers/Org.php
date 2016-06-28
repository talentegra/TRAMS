<?php

/* Location: ./application/controllers/Org.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-21 18:26:54 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Org extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Org_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $org = $this->Org_model->get_all();

        $data = array(
            'org_data' => $org
        );
		$this->load->view('templates/header', $data); 	
        $this->load->view('org/organization_list', $data);
		$this->load->view('templates/footer', $data); 	
		
    }

    public function read($id) 
    {
		echo $this->session->userdata('email');
	if($this->arbac->is_allowed('view_org')){
			
        $row = $this->Org_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'manager' => $row->manager,
		'status' => $row->status,
		'domain' => $row->domain,
		'extra' => $row->extra,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('org/organization_read', $data);
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('org'));
        }
	}
	else {
		 $this->session->set_flashdata('message', 'Permission denied');
		 redirect(site_url('org'));
	}
    }

    public function create() 
    {
        if(!$this->arbac->is_allowed('create_org', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('org')); } 
		$data = array(
            'button' => 'Create',
            'action' => site_url('org/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'manager' => set_value('manager'),
	    'status' => set_value('status'),
	    'domain' => set_value('domain'),
	    'extra' => set_value('extra'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
        $this->load->view('templates/header', $data); 	
        $this->load->view('org/organization_form', $data);
		$this->load->view('templates/footer', $data); 	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'status' => $this->input->post('status',TRUE),
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Org_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('org'));
        }
    }
    
    public function update($id) 
    {
        if(!$this->arbac->is_allowed('edit_org', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('org')); } 
		$row = $this->Org_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('org/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'manager' => set_value('manager', $row->manager),
		'status' => set_value('status', $row->status),
		'domain' => set_value('domain', $row->domain),
		'extra' => set_value('extra', $row->extra),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('org/organization_form', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('org'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'status' => $this->input->post('status',TRUE),
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Org_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('org'));
        }
    }
    
    public function delete($id) 
    {
        if(!$this->arbac->is_allowed('delete_org', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('org')); } 
		$row = $this->Org_model->get_by_id($id);

        if ($row) {
            $this->Org_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('org'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('org'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('manager', 'manager', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	
		
		

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Org.php */
