<?php

/* Location: ./application/controllers/Roles.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-23 01:47:39 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Roles_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        $this->load->model('Arbac_perm_to_group_model');
        $this->load->model('Staff_dept_access_model');
        $this->load->model('Staff_model');

        if (!$this->arbac->is_loggedin()) {
            redirect('scp/login');
        }
         if (!$this->arbac->is_allowed('manage_roles', $this->session->userdata('id'))) {
          $this->session->set_flashdata('error', 'Permission Denied');
          redirect(site_url('staff'));
        }
    }

    public function index() {
        $roles = $this->Roles_model->get_all();

        $data = array(
            'roles_data' => $roles
        );
        $this->load->view('templates/header', $data);
        $this->load->view('roles/roles_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id) {
        if (!$this->arbac->is_allowed('manage_roles', $this->session->userdata('id'))) {
            $this->session->set_flashdata('error', 'Permission Denied');
            redirect(site_url('roles'));
        }

        $row = $this->Roles_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'name' => $row->name,
                'definition' => $row->definition,
            );
            $this->load->view('templates/header', $data);
            $this->load->view('roles/roles_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
        }
    }

    public function create() {
        if(!$this->arbac->is_allowed('create_roles', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('roles')); } 	
        $data = array(
            'button' => 'Create',
            'action' => site_url('roles/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'definition' => set_value('definition'),
            'create_ticket' => set_value('create_ticket'),
            'edit_ticket' => set_value('edit_ticket'),
            'delete_ticket' => set_value('delete_ticket'),
            'transfer_ticket' => set_value('transfer_ticket'),
            'assign_ticket' => set_value('assign_ticket'),
            'spare_replace' => set_value('spare_replace'),
            'close_ticket' => set_value('close_ticket'),
            'edit_thread' => set_value('edit_thread'),
            'list_ticket' => set_value('list_ticket'),
            'transport' => set_value('transport'),
            'approvals' => set_value('approvals'),
            'view_ticket' => set_value('view_ticket'),
            'restrict_view_ticket' => set_value('restrict_view_ticket'),
            'sla_details' => set_value('sla_details'),
            'post_reply' => set_value('post_reply'),
            'resolution_notes' => set_value('resolution_notes'),
        );
        $this->load->view('templates/header', $data);
        $this->load->view('roles/roles_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action() {
        $this->_rules();

        $permission_group = array();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'definition' => $this->input->post('definition', TRUE),
                    //'create_ticket' => $this->input->post('create_ticket', TRUE),
                    //'transfer_ticket' => $this->input->post('transfer_ticket', TRUE),
            );

            $role_id = $this->Roles_model->insert($data);

            //Insert into Arbac_perm_to_group table
            if ($this->input->post('create_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 1, 'group_id' => $role_id);
            }
            if ($this->input->post('edit_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 2, 'group_id' => $role_id);
            }
            if ($this->input->post('assign_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 3, 'group_id' => $role_id);
            }
            if ($this->input->post('transfer_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 4, 'group_id' => $role_id);
            }
            if ($this->input->post('post_reply', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 5, 'group_id' => $role_id);
            }
            if ($this->input->post('close_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 6, 'group_id' => $role_id);
            }
            if ($this->input->post('delete_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 8, 'group_id' => $role_id);
            }
            if ($this->input->post('view_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 16, 'group_id' => $role_id);
            }
            if ($this->input->post('edit_thread', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 9, 'group_id' => $role_id);
            }
            if ($this->input->post('spare_replace', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 11, 'group_id' => $role_id);
            }
            if ($this->input->post('list_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 10, 'group_id' => $role_id);
            }
            if ($this->input->post('transport', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 12, 'group_id' => $role_id);
            }
            if ($this->input->post('approvals', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 13, 'group_id' => $role_id);
            }
            if ($this->input->post('resolution_notes', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 14, 'group_id' => $role_id);
            }
            if ($this->input->post('restrict_view_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 17, 'group_id' => $role_id);
            }
            if ($this->input->post('sla_details', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 15, 'group_id' => $role_id);
            }

            if (count($permission_group) > 0) {
                $this->Arbac_perm_to_group_model->insert_batch($permission_group);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('roles'));
        }
    }

    public function update($id) {
        if (!$this->arbac->is_allowed('edit_roles', $this->session->userdata('id'))) {
          $this->session->set_flashdata('error', 'Permission Denied');
          redirect(site_url('roles'));
        }
        $row = $this->Roles_model->get_by_id($id);
        $arr_permission = $this->Arbac_perm_to_group_model->get_perm_by_group($id);

        $create_ticket = "";
        $edit_ticket = "";
        $delete_ticket = "";
        $transfer_ticket = "";
        $assign_ticket = "";
        $spare_replace = "";
        $close_ticket = "";
        $edit_thread = "";
        $list_ticket = "";
        $transport = "";
        $approvals = "";
        $view_ticket = "";
        $restrict_view_ticket = "";
        $sla_details = "";
        $post_reply = "";
        $resolution_notes = "";

        if ($arr_permission != 'failure') {
            foreach ($arr_permission as $value) {
                //echo "<br>  vl ".$value['perm_id'];

                if (in_array(1, $value)) {
                    $create_ticket = 1;
                }
                if (in_array(2, $value)) {
                    $edit_ticket = 1;
                }
                if (in_array(8, $value)) {
                    $delete_ticket = 1;
                }
                if (in_array(4, $value)) {
                    $transfer_ticket = 1;
                }
                if (in_array(3, $value)) {
                    $assign_ticket = 1;
                }
                if (in_array(11, $value)) {
                    $spare_replace = 1;
                }
                if (in_array(6, $value)) {
                    $close_ticket = 1;
                }
                if (in_array(9, $value)) {
                    $edit_thread = 1;
                }
                if (in_array(10, $value)) {
                    $list_ticket = 1;
                }
                if (in_array(12, $value)) {
                    $transport = 1;
                }
                if (in_array(13, $value)) {
                    $approvals = 1;
                }
                if (in_array(16, $value)) {
                    $view_ticket = 1;
                }
                if (in_array(17, $value)) {
                    $restrict_view_ticket = 1;
                }
                if (in_array(15, $value)) {
                    $sla_details = 1;
                }
                if (in_array(5, $value)) {
                    $post_reply = 1;
                }
                if (in_array(14, $value)) {
                    $resolution_notes = 1;
                }
            }
        }

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('roles/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
                'definition' => set_value('definition', $row->definition),
                'create_ticket' => $create_ticket,
                'edit_ticket' => $edit_ticket,
                'delete_ticket' => $delete_ticket,
                'transfer_ticket' => $transfer_ticket,
                'assign_ticket' => $assign_ticket,
                'spare_replace' => $spare_replace,
                'close_ticket' => $close_ticket,
                'edit_thread' => $edit_thread,
                'list_ticket' => $list_ticket,
                'transport' => $transport,
                'approvals' => $approvals,
                'view_ticket' => $view_ticket,
                'restrict_view_ticket' => $restrict_view_ticket,
                'sla_details' => $sla_details,
                'post_reply' => $post_reply,
                'resolution_notes' => $resolution_notes,
            );
            $this->load->view('templates/header', $data);
            $this->load->view('roles/roles_edit', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'definition' => $this->input->post('definition', TRUE),
                //'create_ticket' => $this->input->post('create_ticket', TRUE),
                //'transfer_ticket' => $this->input->post('transfer_ticket', TRUE),
            );

            $this->Roles_model->update($this->input->post('id', TRUE), $data);
            
            $role_id = $this->input->post('id', TRUE);
            //Update group permissions
            //Delete existing permissions
            $this->Arbac_perm_to_group_model->delete($role_id);
            
            $permission_group = array();
            
            //Insert into Arbac_perm_to_group table
            if ($this->input->post('create_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 1, 'group_id' => $role_id);
            }
            if ($this->input->post('edit_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 2, 'group_id' => $role_id);
            }
            if ($this->input->post('assign_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 3, 'group_id' => $role_id);
            }
            if ($this->input->post('transfer_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 4, 'group_id' => $role_id);
            }
            if ($this->input->post('post_reply', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 5, 'group_id' => $role_id);
            }
            if ($this->input->post('close_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 6, 'group_id' => $role_id);
            }
            if ($this->input->post('delete_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 8, 'group_id' => $role_id);
            }
            if ($this->input->post('view_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 16, 'group_id' => $role_id);
            }
            if ($this->input->post('edit_thread', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 9, 'group_id' => $role_id);
            }
            if ($this->input->post('spare_replace', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 11, 'group_id' => $role_id);
            }
            if ($this->input->post('list_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 10, 'group_id' => $role_id);
            }
            if ($this->input->post('transport', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 12, 'group_id' => $role_id);
            }
            if ($this->input->post('approvals', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 13, 'group_id' => $role_id);
            }
            if ($this->input->post('resolution_notes', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 14, 'group_id' => $role_id);
            }
            if ($this->input->post('restrict_view_ticket', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 17, 'group_id' => $role_id);
            }
            if ($this->input->post('sla_details', TRUE) == 1) {
                $permission_group[] = array('perm_id' => 15, 'group_id' => $role_id);
            }

            if (count($permission_group) > 0) {
                $this->Arbac_perm_to_group_model->insert_batch($permission_group);
            }
            
            
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('roles'));
        }
    }

    public function delete($id) {
        if (!$this->arbac->is_allowed('delete_roles', $this->session->userdata('id'))) {
            $this->session->set_flashdata('error', 'Permission Denied');
            redirect(site_url('roles'));
        }
        $row = $this->Roles_model->get_by_id($id);
        
        if ($id == 3) {
            $this->session->set_flashdata('error', 'Default Access Group cannot delete');
            redirect(site_url('roles'));
        }

        if ($row) {
            $this->Roles_model->delete($id);
            
            $this->Arbac_perm_to_group_model->delete($id);
            
            //Update Staff_dept_access table role_id to default
            $data = array('role_id' => 3);
            
            $this->Staff_dept_access_model->update_role_to_default($id,$data);
            $this->Staff_model->update_role_to_default($id,$data);
            
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('roles'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('definition', 'definition', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Roles.php */
