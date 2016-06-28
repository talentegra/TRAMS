<?php

/* Location: ./application/controllers/Account_type.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-20 01:12:20 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account_type extends APP_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Account_type_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/login');
        }
    }

    public function index() {
        $account_type = $this->Account_type_model->get_all();

        $data = array(
            'account_type_data' => $account_type,
            'title' => 'TRAMS::SCP::Account_type',
            'sort_by' => "DESC",
            'sort_column' => "account_type_id",
        );
        $this->_tpl('account_type/account_type_list', $data);
    }

    function account_type_list_ajax_data() {
        $page = $this->input->post('page');
        $sort_by = $this->input->post('sortby');
        $sort_column = $this->input->post('sort_column');

        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

        $this->perPage = 5;

        if ($this->input->post('per_page') > 0) {
            $this->perPage = $this->input->post('per_page');
        }

        $acc_type = $this->Account_type_model->get_all_acc_type_ajax();

        //total rows count
        $totalRec = count($acc_type);

        //pagination configuration
        $config['first_link'] = 'First';
        $config['div'] = 'account_type_list'; //parent div tag id
        $config['base_url'] = base_url() . 'account_type/account_type_list_ajax_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $account_type_data = $this->Account_type_model->get_all_acc_type_ajax(array('start' => $offset, 'limit' => $this->perPage, 'sort_by' => $sort_by, 'sort_column' => $sort_column));

        $data = array(
            'account_type_data' => $account_type_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | Account Type',
            'primary_role_id' => $this->session->userdata('primary_role'),
        );

        //load the view
        $this->load->view('account_type/account_type_list_detail', $data);
    }

    public function read($id) {
        $row = $this->Account_type_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'TRAMS::SCP::Account_type',
                'account_type_id' => $row->account_type_id,
                'account_mode' => $row->account_mode,
                'account_type' => $row->account_type,
                'created' => $row->created,
                'updated' => $row->updated,
            );
            $this->_tpl('account_type/account_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account_type'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('account_type/create_action'),
            'title' => 'TRAMS::SCP::Create Account_type',
            'account_type_id' => set_value('account_type_id'),
            'account_mode' => set_value('account_mode'),
            'account_type' => set_value('account_type'),
            'created' => set_value('created'),
            'updated' => set_value('updated'),
        );
        $this->_tpl('account_type/account_type_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'account_mode' => $this->input->post('account_mode', TRUE),
                'account_type' => $this->input->post('account_type', TRUE),
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s'),
            );

            $this->Account_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('account_type'));
        }
    }

    public function update($id) {
        $row = $this->Account_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('account_type/update_action'),
                'title' => 'TRAMS::SCP::Update Account_type',
                'account_type_id' => set_value('account_type_id', $row->account_type_id),
                'account_mode' => set_value('account_mode', $row->account_mode),
                'account_type' => set_value('account_type', $row->account_type),
                'created' => set_value('created', $row->created),
                'updated' => set_value('updated', $row->updated),
            );
            $this->_tpl('account_type/account_type_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account_type'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('account_type_id', TRUE));
        } else {
            $data = array(
                'account_mode' => $this->input->post('account_mode', TRUE),
                'account_type' => $this->input->post('account_type', TRUE),
                'updated' => date('Y-m-d H:i:s'),
            );

            $this->Account_type_model->update($this->input->post('account_type_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('account_type'));
        }
    }

    public function delete($id) {
        $row = $this->Account_type_model->get_by_id($id);

        if ($row) {
            $this->Account_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('account_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('account_type'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('account_mode', 'account mode', 'trim|required');
        $this->form_validation->set_rules('account_type', 'account type', 'trim|required');



        $this->form_validation->set_rules('account_type_id', 'account_type_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Account_type.php */
