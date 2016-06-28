<?php

/* Location: ./application/controllers/Team.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-24 23:39:08 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Team_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $team = $this->Team_model->get_all();

        $data = array(
            'team_data' => $team
        );
		$this->load->view('templates/header', $data); 	
        $this->load->view('team/team_list', $data);
		$this->load->view('templates/footer', $data); 	
		
    }

    public function read($id) 
    {
        $row = $this->Team_model->get_by_id($id);
        if ($row) {
            $data = array(
		'team_id' => $row->team_id,
		'lead_id' => $row->lead_id,
		'flags' => $row->flags,
		'name' => $row->name,
		'notes' => $row->notes,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('team/team_read', $data);
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }

    public function create() 
    {
        if(!$this->arbac->is_allowed('create_team', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('team')); } 	
		$data = array(
            'button' => 'Create',
            'action' => site_url('team/create_action'),
	    'team_id' => set_value('team_id'),
	    'lead_id' => set_value('lead_id'),
	    'flags' => set_value('flags'),
	    'name' => set_value('name'),
	    'notes' => set_value('notes'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
        $this->load->view('templates/header', $data); 	
        $this->load->view('team/team_form', $data);
		$this->load->view('templates/footer', $data); 	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'lead_id' => $this->input->post('lead_id',TRUE),
		'flags' => $this->input->post('flags',TRUE),
		'name' => $this->input->post('name',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Team_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('team'));
        }
    }
    
    public function update($id) 
    {
        if(!$this->arbac->is_allowed('edit_team', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('team')); }
		$row = $this->Team_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('team/update_action'),
		'team_id' => set_value('team_id', $row->team_id),
		'lead_id' => set_value('lead_id', $row->lead_id),
		'flags' => set_value('flags', $row->flags),
		'name' => set_value('name', $row->name),
		'notes' => set_value('notes', $row->notes),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('team/team_edit', $data);
			$this->load->view('templates/footer', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('team_id', TRUE));
        } else {
            $data = array(
		'lead_id' => $this->input->post('lead_id',TRUE),
		'flags' => $this->input->post('flags',TRUE),
		'name' => $this->input->post('name',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Team_model->update($this->input->post('team_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('team'));
        }
    }
    
    public function delete($id) 
    {
        if(!$this->arbac->is_allowed('delete_team', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('team')); }
		$row = $this->Team_model->get_by_id($id);

        if ($row) {
            $this->Team_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('team'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('team'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('flags', 'flags', 'trim|required|numeric');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('notes', 'notes', 'trim|required');
		
		

	$this->form_validation->set_rules('team_id', 'team_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Team.php */
