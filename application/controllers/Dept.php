<?php

/* Location: ./application/controllers/Dept.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-21 19:15:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dept extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dept_model');
		 $this->load->model('Sla_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		$this->load->helper('nav');
		
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        
		$data['title'] = 'TesNow :: SCP :: Department';
		$data['dept_data'] = $this->Dept_model->get_all_dept();
		
        
		$this->load->view('templates/header', $data); 	
        $this->load->view('dept/dept_list', $data);
		$this->load->view('templates/footer', $data); 	
		
    }

    public function read($id) 
    {
        $data['title'] = 'TesNow :: SCP :: Department';
		$row = $this->Dept_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pid' => $row->pid,
	
		'sla_id' => $row->sla_id,
		'email_id' => $row->email_id,
		'autoresp_email_id' => $row->autoresp_email_id,
		'manager_id' => $row->manager_id,
		'flags' => $row->flags,
		'name' => $row->name,
		'signature' => $row->signature,
		'ispublic' => $row->ispublic,
		'group_membership' => $row->group_membership,
		'ticket_auto_response' => $row->ticket_auto_response,
		'message_auto_response' => $row->message_auto_response,
		'path' => $row->path,
		'updated' => $row->updated,
		'created' => $row->created,
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('dept/dept_read', $data);
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dept'));
        }
    }

    public function create() 
    {
         if(!$this->arbac->is_allowed('create_dept', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('dept')); } 
		 
		 $dept = $this->Dept_model->get_all();
		 $sla = $this->Sla_model->get_all();

		$data = array(
            'button' => 'Create',
            'action' => site_url('dept/create_action'),
	    'id' => set_value('id'),
	    'pid' => set_value('pid'),
	  
	    'sla_id' => set_value('sla_id'),
	    'email_id' => set_value('email_id'),
	    'autoresp_email_id' => set_value('autoresp_email_id'),
	    'manager_id' => set_value('manager_id'),
	    'flags' => set_value('flags'),
	    'name' => set_value('name'),
	    'signature' => set_value('signature'),
	    'ispublic' => set_value('ispublic'),
	    'group_membership' => set_value('group_membership'),
	    'ticket_auto_response' => set_value('ticket_auto_response'),
	    'message_auto_response' => set_value('message_auto_response'),
	    'path' => set_value('path'),
	    'updated' => set_value('updated'),
	    'created' => set_value('created'),
		'dept_data' => $dept,
		'sla_data' => $sla,
		'title' => 'TesNow :: SCP :: Department',
	);
        $this->load->view('templates/header', $data); 	
        $this->load->view('dept/dept_form', $data);
		$this->load->view('templates/footer', $data); 	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			
			$pid = ($this->input->post('pid',TRUE)) ? $this->input->post('pid',TRUE) : 0 ;
			$flags = ($this->input->post('flags',TRUE)) ? $this->input->post('flags',TRUE) : 0 ;
			$email_id = $this->input->post('email_id',TRUE) ?  $this->input->post('email_id',TRUE) : 0;
			$autoresp_email_id = ($this->input->post('autoresp_email_id',TRUE))? $this->input->post('autoresp_email_id',TRUE) : 0;
             $data = array(
		'pid' => $pid,
		'sla_id' => $this->input->post('sla_id',TRUE),
		'email_id' => $email_id,
		'autoresp_email_id' => $autoresp_email_id,
		'manager_id' => $this->input->post('manager_id',TRUE),
		'flags' => $flags,
		'name' => $this->input->post('name',TRUE),
		'signature' => $this->input->post('signature',TRUE),
		'ispublic' => $this->input->post('ispublic',TRUE),
		'group_membership' => $this->input->post('group_membership',TRUE),
		'ticket_auto_response' => $this->input->post('ticket_auto_response',TRUE),
		'message_auto_response' => $this->input->post('message_auto_response',TRUE),
		'path' => $this->input->post('path',TRUE),
		'updated' => date('Y-m-d H:i:s'),
		'created' => date('Y-m-d H:i:s'),
	    );

            $this->Dept_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dept'));
        }
    }
    
    public function update($id) 
    {
        if(!$this->arbac->is_allowed('edit_dept', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('dept')); } 
		$data['title'] = 'TesNow :: SCP :: Department';
		$row = $this->Dept_model->get_by_id($id);
		$dept = $this->Dept_model->get_all();
		$sla = $this->Sla_model->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dept/update_action'),
		'id' => set_value('id', $row->id),
		'pid' => set_value('pid', $row->pid),
	
		'sla_id' => set_value('sla_id', $row->sla_id),
		'email_id' => set_value('email_id', $row->email_id),
		'autoresp_email_id' => set_value('autoresp_email_id', $row->autoresp_email_id),
		'manager_id' => set_value('manager_id', $row->manager_id),
		'flags' => set_value('flags', $row->flags),
		'name' => set_value('name', $row->name),
		'signature' => set_value('signature', $row->signature),
		'ispublic' => set_value('ispublic', $row->ispublic),
		'group_membership' => set_value('group_membership', $row->group_membership),
		'ticket_auto_response' => set_value('ticket_auto_response', $row->ticket_auto_response),
		'message_auto_response' => set_value('message_auto_response', $row->message_auto_response),
		'path' => set_value('path', $row->path),
		'updated' => set_value('updated', $row->updated),
		'created' => set_value('created', $row->created),
		'dept_data' => $dept,
		'sla_data' => $sla,
		'row' => $row,
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('dept/dept_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dept'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
			$pid = ($this->input->post('pid',TRUE)) ? $this->input->post('pid',TRUE) : 0 ;
			$flags = ($this->input->post('flags',TRUE)) ? $this->input->post('flags',TRUE) : 0 ;
			$email_id = $this->input->post('email_id',TRUE) ?  $this->input->post('email_id',TRUE) : 0;
			$autoresp_email_id = ($this->input->post('autoresp_email_id',TRUE))? $this->input->post('autoresp_email_id',TRUE) : 0;
            $data = array(
		'pid' => $this->input->post('pid',TRUE),
	
		'sla_id' => $this->input->post('sla_id',TRUE),
		'email_id' => $email_id,
		'autoresp_email_id' => $autoresp_email_id,
		'manager_id' => $this->input->post('manager_id',TRUE),
		'flags' => $flags,
		'name' => $this->input->post('name',TRUE),
		'signature' => $this->input->post('signature',TRUE),
		'ispublic' => $this->input->post('ispublic',TRUE),
		'group_membership' => $this->input->post('group_membership',TRUE),
		'ticket_auto_response' => $this->input->post('ticket_auto_response',TRUE),
		'message_auto_response' => $this->input->post('message_auto_response',TRUE),
		'path' => $this->input->post('path',TRUE),
		'updated' => date('Y-m-d H:i:s'),
		
	    );

            $this->Dept_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dept'));
        }
    }
    
    public function delete($id) 
    {
         if(!$this->arbac->is_allowed('delete_dept', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('dept')); } 
		$row = $this->Dept_model->get_by_id($id);

        if ($row) {
            $this->Dept_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dept'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dept'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('group_membership', 'group_membership', 'trim|required');
	
	
		

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dept.php */
