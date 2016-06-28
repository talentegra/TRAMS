<?php

/* Location: ./application/controllers/Branch.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:46:32 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branch extends APP_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Branch_model');
        $this->load->model('Branch_type_model');
        $this->load->model('City_model');
        $this->load->model('Country_model');
		$this->load->model('Status_model');
		$this->load->model('Staff_details_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/login');
        }
    }

    public function index() {
        $data = array(
            'title' => 'TRAMS::SCP::branch',
            'sort_by' => 'DESC',
            'sort_column' => 'branch_id',
            'q' => '',
            'total_rows' => ''
        );
        $this->_tpl('branch/branch_list', $data);
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
        $config['div'] = 'Branch_list'; //parent div tag id
        $config['base_url'] = base_url() . 'Branch/list_data';
        $config['total_rows'] = $this->Branch_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $branch_data = $this->Branch_model->get_limit_data($config['per_page'], $offset, $sort_column, $sort_by, $q);

        $data = array(
            'branch_data' => $branch_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
            'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('branch/branch_list_data', $data);
    }

    public function read($id) {
        $row = $this->Branch_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'TRAMS::SCP::Branch',
                'branch_id' => $row->branch_id,
                'enquiry_id' => $row->enquiry_id,
                'branch_code' => $row->branch_code,
                'branch_type' => $row->branch_type,
                'branch_name' => $row->branch_name,
                'branch_reg_date' => date("m-d-Y", strtotime($row->branch_reg_date)),
                'branch_address' => $row->branch_address,
                'branch_area' => $row->branch_area,
                'land_mark' => $row->land_mark,
                'city_id' => $row->city_id,
                'zipcode' => $row->zipcode,
                'country_id' => $row->country_id,
                'phone' => $row->phone,
                'mobile' => $row->mobile,
                'email_id' => $row->email_id,
                'manager_id' => $row->manager_id,
                'branch_status' => $row->branch_status,
                'ispublic' => $row->ispublic,
                'flags' => $row->flags,
                'group_membership' => $row->group_membership,
                'autoresp_email_id' => $row->autoresp_email_id,
                'message_auto_response' => $row->message_auto_response,
                'signature' => $row->signature,
                'created' => $row->created,
                'updated' => $row->updated,
            );
            $this->_tpl('branch/branch_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('branch'));
        }
    }

    public function create() {
        $branch_list = $this->Branch_type_model->get_all();
        $city_list = $this->City_model->get_all();
        $country_list = $this->Country_model->get_all();
		$status_list = $this->Status_model->get_status_by_status_type('5');
		$staff_details_list = $this->Staff_details_model->get_all();

        $data = array(
            'button' => 'Create',
            'action' => site_url('branch/create_action'),
            'title' => 'TRAMS::SCP::Create Branch',
            'branch_id' => set_value('branch_id'),
            'enquiry_id' => set_value('enquiry_id'),
            'branch_code' => set_value('branch_code'),
            'branch_type' => set_value('branch_type'),
            'branch_name' => set_value('branch_name'),
            'branch_reg_date' => set_value('branch_reg_date'),
            'branch_address' => set_value('branch_address'),
            'branch_area' => set_value('branch_area'),
            'land_mark' => set_value('land_mark'),
            'city_id' => set_value('city_id'),
            'zipcode' => set_value('zipcode'),
            'country_id' => set_value('country_id'),
            'phone' => set_value('phone'),
            'mobile' => set_value('mobile'),
            'email_id' => set_value('email_id'),
            'manager_id' => set_value('manager_id'),
            'branch_status' => set_value('branch_status'),
            'autoresp_email_id' => set_value('autoresp_email_id'),
            'message_auto_response' => set_value('message_auto_response'),
            'signature' => set_value('signature'),
            'created' => set_value('created'),
            'updated' => set_value('updated'),
            'branch_list' => $branch_list,
            'city_list' => $city_list,
            'country_list' => $country_list,
			'status_list' => $status_list,
			'staff_details_list' => $staff_details_list
        );
        $this->_tpl('branch/branch_form', $data);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'branch_code' => $this->input->post('branch_code', TRUE),
                'branch_type' => $this->input->post('branch_type', TRUE),
                'branch_name' => $this->input->post('branch_name', TRUE),
                'branch_reg_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('branch_reg_date', TRUE)))),
                'branch_address' => $this->input->post('branch_address', TRUE),
                'branch_area' => $this->input->post('branch_area', TRUE),
                'land_mark' => $this->input->post('land_mark', TRUE),
                'city_id' => $this->input->post('city_id', TRUE),
                'zipcode' => $this->input->post('zipcode', TRUE),
                'country_id' => $this->input->post('country_id', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'email_id' => $this->input->post('email_id', TRUE),
                'manager_id' => $this->input->post('manager_id', TRUE),
                'branch_status' => $this->input->post('branch_status', TRUE),
                'autoresp_email_id' => $this->input->post('autoresp_email_id', TRUE),
                'message_auto_response' => $this->input->post('message_auto_response', TRUE),
                'signature' => $this->input->post('signature', TRUE),
                'created' => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s'),
            );

            $this->Branch_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('branch'));
        }
    }

    public function update($id) {
        $branch_list = $this->Branch_type_model->get_all();
        $city_list = $this->City_model->get_all();
        $country_list = $this->Country_model->get_all();
		$status_list = $this->Status_model->get_status_by_status_type('5');
		$staff_details_list = $this->Staff_details_model->get_all();
        $row = $this->Branch_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('branch/update_action'),
                'title' => 'TRAMS::SCP::Update Branch',
                'branch_id' => set_value('branch_id', $row->branch_id),
                'branch_code' => set_value('branch_code', $row->branch_code),
                'branch_type' => set_value('branch_type', $row->branch_type),
                'branch_name' => set_value('branch_name', $row->branch_name),
                'branch_reg_date' => set_value('branch_reg_date', date("m-d-Y", strtotime($row->branch_reg_date))),
                'branch_address' => set_value('branch_address', $row->branch_address),
                'branch_area' => set_value('branch_area', $row->branch_area),
                'land_mark' => set_value('land_mark', $row->land_mark),
                'city_id' => set_value('city_id', $row->city_id),
                'zipcode' => set_value('zipcode', $row->zipcode),
                'country_id' => set_value('country_id', $row->country_id),
                'phone' => set_value('phone', $row->phone),
                'mobile' => set_value('mobile', $row->mobile),
                'email_id' => set_value('email_id', $row->email_id),
                'manager_id' => set_value('manager_id', $row->manager_id),
                'branch_status' => set_value('branch_status', $row->branch_status),
                'autoresp_email_id' => set_value('autoresp_email_id', $row->autoresp_email_id),
                'message_auto_response' => set_value('message_auto_response', $row->message_auto_response),
                'signature' => set_value('signature', $row->signature),
                'created' => set_value('created', $row->created),
                'updated' => set_value('updated', $row->updated),
				'branch_list' => $branch_list,
				'city_list' => $city_list,
				'country_list' => $country_list,
				'status_list' => $status_list,
				'staff_details_list' => $staff_details_list
            );
            $this->_tpl('branch/branch_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('branch'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('branch_id', TRUE));
        } else {
            $data = array(
                'enquiry_id' => $this->input->post('enquiry_id', TRUE),
                'branch_code' => $this->input->post('branch_code', TRUE),
                'branch_type' => $this->input->post('branch_type', TRUE),
                'branch_name' => $this->input->post('branch_name', TRUE),
                'branch_reg_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('branch_reg_date', TRUE)))),
                'branch_address' => $this->input->post('branch_address', TRUE),
                'branch_area' => $this->input->post('branch_area', TRUE),
                'land_mark' => $this->input->post('land_mark', TRUE),
                'city_id' => $this->input->post('city_id', TRUE),
                'zipcode' => $this->input->post('zipcode', TRUE),
                'country_id' => $this->input->post('country_id', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'email_id' => $this->input->post('email_id', TRUE),
                'manager_id' => $this->input->post('manager_id', TRUE),
                'branch_status' => $this->input->post('branch_status', TRUE),
                'autoresp_email_id' => $this->input->post('autoresp_email_id', TRUE),
                'message_auto_response' => $this->input->post('message_auto_response', TRUE),
                'signature' => $this->input->post('signature', TRUE),
                'updated' => date('Y-m-d H:i:s'),
            );

            $this->Branch_model->update($this->input->post('branch_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('branch'));
        }
    }

    public function delete($id) {
        $row = $this->Branch_model->get_by_id($id);

        if ($row) {
            $this->Branch_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('branch'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('branch'));
        }
    }

    public function _rules() {

    $this->form_validation->set_rules('branch_code', 'branch code', 'trim|required');
	$this->form_validation->set_rules('branch_type', 'branch type', 'trim|required');
	$this->form_validation->set_rules('branch_name', 'branch name', 'trim|required');
	$this->form_validation->set_rules('branch_reg_date', 'branch reg date', 'trim|required');
	$this->form_validation->set_rules('branch_address', 'branch address', 'trim|required');
	$this->form_validation->set_rules('branch_area', 'branch area', 'trim|required');
	$this->form_validation->set_rules('land_mark', 'land mark', 'trim|required');
	$this->form_validation->set_rules('city_id', 'city id', 'trim|required');
	$this->form_validation->set_rules('zipcode', 'zipcode', 'trim|required');
	$this->form_validation->set_rules('country_id', 'country id', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	$this->form_validation->set_rules('email_id', 'email id', 'trim|required');
	$this->form_validation->set_rules('autoresp_email_id', 'autoresp email id', 'trim|required');
	$this->form_validation->set_rules('signature', 'signature', 'trim|required');

        $this->form_validation->set_rules('branch_id', 'branch_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
	public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Branch_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Branch.php */
