<?php

/* Location: ./application/controllers/Followup_thread.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-24 13:47:22 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Followup_thread extends APP_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Followup_thread_model');
        $this->load->model('Followup_action_model');
        $this->load->model('Interest_level_model');
        $this->load->model('Staff_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/login');
        }
    }

    public function index() {
		$followup_action_list = $this->Followup_action_model->get_all();
        $interest_level_list = $this->Interest_level_model->get_all();
        $staff_data = $this->Staff_model->get_all_staff();
        $data = array(
            'title' => 'TRAMS::SCP::followup_thread',
            'sort_by' => 'DESC',
            'sort_column' => '',
            'q' => '',
            'total_rows' => '',
			'followup_action_list' => $followup_action_list,
            'interest_level_list' => $interest_level_list,
            'staff_data' => $staff_data,
        );
        $this->_tpl('followup_thread/followup_thread_list', $data);
    }

    public function list_data() {
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
        $config['div'] = 'Followup_thread_list'; //parent div tag id
        $config['base_url'] = base_url() . 'Followup_thread/list_data';
        $config['total_rows'] = $this->Followup_thread_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $followup_thread_data = $this->Followup_thread_model->get_limit_data($config['per_page'], $offset, $sort_column, $sort_by, $q);

        $data = array(
            'followup_thread_data' => $followup_thread_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
            'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('followup_thread/followup_thread_list_data', $data);
    }

	 public function overdue_list() {
        $followup_action_list = $this->Followup_action_model->get_all();
        $interest_level_list = $this->Interest_level_model->get_all();
        $staff_data = $this->Staff_model->get_all_staff();
        $data = array(
            'title' => 'TRAMS::SCP::followup_thread',
            'sort_by' => 'DESC',
            'sort_column' => '',
            'q' => '',
            'total_rows' => '',
			'followup_action_list' => $followup_action_list,
            'interest_level_list' => $interest_level_list,
            'staff_data' => $staff_data,
        );
        $this->_tpl('followup_thread/followup_thread_overdue_list', $data);
    }
	
	public function overdue_list_data() {
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
        $config['div'] = 'Followup_thread_list'; //parent div tag id
        $config['base_url'] = base_url() . 'Followup_thread/overdue_list_data';
        $config['total_rows'] = $this->Followup_thread_model->total_rows($q,'overdue');
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $followup_thread_data = $this->Followup_thread_model->get_limit_data($config['per_page'], $offset, $sort_column, $sort_by, $q,'overdue');

        $data = array(
            'followup_thread_data' => $followup_thread_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
            'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('followup_thread/followup_thread_overdue_list_data', $data);
    }
	
    public function read($id) {
        $row = $this->Followup_thread_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'TRAMS::SCP::Followup_thread',
                'followup_id' => $row->followup_id,
                'pid' => $row->pid,
                'lead_id' => $row->lead_id,
                'followup_type' => $row->followup_type,
                'interest_level' => $row->interest_level,
                'followup_date' => $row->followup_date,
                'followup_action' => $row->followup_action,
                'followup_comments' => $row->followup_comments,
                'next_followup_date' => $row->next_followup_date,
                'next_followup_action' => $row->next_followup_action,
                'staff_id' => $row->staff_id,
                'status' => $row->status,
                'created' => $row->created,
                'updated' => $row->updated,
            );
            $this->_tpl('followup_thread/followup_thread_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('followup_thread'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('followup_thread/create_action'),
            'title' => 'TRAMS::SCP::Create Followup_thread',
            'followup_type' => set_value('followup_type'),
            'interest_level' => set_value('interest_level'),
            'followup_date' => set_value('followup_date'),
            'followup_action' => set_value('followup_action'),
            'followup_comments' => set_value('followup_comments'),
            'next_followup_date' => set_value('next_followup_date'),
            'next_followup_action' => set_value('next_followup_action'),
            'staff_id' => set_value('staff_id'),
            'status' => set_value('status'),
            'created' => set_value('created'),
            'updated' => set_value('updated'),
        );
        $this->_tpl('followup_thread/followup_thread_form', $data);
    }

    public function create_action() {
        list($fmonth,$fday,$fyear) = explode("/", $this->input->post('followup_date', TRUE));
        list($next_fmonth,$next_fday,$next_fyear) = explode("/", $this->input->post('next_followup_date', TRUE));
        
        if ($this->input->post('frm_page', TRUE) == 'lead_modal') { //From leads - modal box
            $data = array(
                    //'followup_type' => $this->input->post('followup_type', TRUE),
                    'lead_id' => $this->input->post('lead_id', TRUE),
                    'interest_level' => $this->input->post('interest_level', TRUE),
                    'followup_date' => $fyear.'-'.$fmonth.'-'.$fday,
                    'followup_action' => $this->input->post('followup_action', TRUE),
                    'followup_comments' => $this->input->post('followup_comments', TRUE),
                    'next_followup_date' => $next_fyear.'-'.$next_fmonth.'-'.$next_fday,
                    'next_followup_action' => $this->input->post('next_followup_action', TRUE),
                    'staff_id' => $this->input->post('staff_id', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s'),
                );
            
                /*echo "<pre>";
                print_r($data);
                echo "</pre>";
                exit;*/

                $this->Followup_thread_model->insert($data);
                $this->session->set_flashdata('message', 'Add Followup Create Record Success');
                redirect(site_url('leads'));
            
        } else {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
                    //'followup_type' => $this->input->post('followup_type', TRUE),
                    'lead_id' => $this->input->post('lead_id', TRUE),
                    'interest_level' => $this->input->post('interest_level', TRUE),
                    'followup_date' => $fyear.'-'.$fmonth.'-'.$fday,
                    'followup_action' => $this->input->post('followup_action', TRUE),
                    'followup_comments' => $this->input->post('followup_comments', TRUE),
                    'next_followup_date' => $next_fyear.'-'.$next_fmonth.'-'.$next_fday,
                    'next_followup_action' => $this->input->post('next_followup_action', TRUE),
                    'staff_id' => $this->input->post('staff_id', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s'),
                );

                $this->Followup_thread_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('followup_thread'));
            }
        }
    }

    public function update($id) {
        $row = $this->Followup_thread_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('followup_thread/update_action'),
                'title' => 'TRAMS::SCP::Update Followup_thread',
                'followup_id' => set_value('followup_id', $row->followup_id),
                'pid' => set_value('pid', $row->pid),
                'lead_id' => set_value('lead_id', $row->lead_id),
                'followup_type' => set_value('followup_type', $row->followup_type),
                'interest_level' => set_value('interest_level', $row->interest_level),
                'followup_date' => set_value('followup_date', $row->followup_date),
                'followup_action' => set_value('followup_action', $row->followup_action),
                'followup_comments' => set_value('followup_comments', $row->followup_comments),
                'next_followup_date' => set_value('next_followup_date', $row->next_followup_date),
                'next_followup_action' => set_value('next_followup_action', $row->next_followup_action),
                'staff_id' => set_value('staff_id', $row->staff_id),
                'status' => set_value('status', $row->status),
                'created' => set_value('created', $row->created),
                'updated' => set_value('updated', $row->updated),
            );
            $this->_tpl('followup_thread/followup_thread_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('followup_thread'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
                'followup_type' => $this->input->post('followup_type', TRUE),
                'interest_level' => $this->input->post('interest_level', TRUE),
                'followup_date' => $this->input->post('followup_date', TRUE),
                'followup_action' => $this->input->post('followup_action', TRUE),
                'followup_comments' => $this->input->post('followup_comments', TRUE),
                'next_followup_date' => $this->input->post('next_followup_date', TRUE),
                'next_followup_action' => $this->input->post('next_followup_action', TRUE),
                'staff_id' => $this->input->post('staff_id', TRUE),
                'status' => $this->input->post('status', TRUE),
                'updated' => date('Y-m-d H:i:s'),
            );

            $this->Followup_thread_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('followup_thread'));
        }
    }

    public function delete($id) {
        $row = $this->Followup_thread_model->get_by_id($id);

        if ($row) {
            $this->Followup_thread_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('followup_thread'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('followup_thread'));
        }
    }

    public function _rules() {
        //$this->form_validation->set_rules('followup_type', 'followup type', 'trim|required');
        $this->form_validation->set_rules('interest_level', 'interest level', 'trim|required');
        $this->form_validation->set_rules('followup_date', 'followup date', 'trim|required');
        $this->form_validation->set_rules('followup_action', 'followup action', 'trim|required');
        $this->form_validation->set_rules('followup_comments', 'followup comments', 'trim|required');
        $this->form_validation->set_rules('next_followup_date', 'next followup date', 'trim|required');
        $this->form_validation->set_rules('next_followup_action', 'next followup action', 'trim|required');
        $this->form_validation->set_rules('staff_id', 'staff id', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');



        $this->form_validation->set_rules('', '', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist() {
        $val = $this->input->post('val');
        $col = $this->input->post('col');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $res = $this->Account_type_model->check_exist($val, $col, $id);
        if ($res) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

}

/* End of file Followup_thread.php */
