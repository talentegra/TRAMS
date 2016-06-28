<?php

/* Location: ./application/controllers/Staff.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:53:53 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model');
		$this->load->model('Staff_details_model');
		$this->load->model('Branch_type_model');
		$this->load->model('Branch_model');
		$this->load->model('Organization_model');
		$this->load->model('Designation_model');
		$this->load->model('Arbac_groups_model');
		$this->load->model('Status_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::staff',
            'sort_by' => 'DESC',
            'sort_column' => 'staff_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('staff/staff_list', $data);
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
        $config['div'] = 'Staff_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Staff/list_data';
        $config['total_rows'] = $this->Staff_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $staff_data = $this->Staff_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'staff_data' => $staff_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('staff/staff_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Staff_model->get_by_id($id);
		$row_details = $this->Staff_details_model->get_by_id($id);
		$row_organization = $this->Organization_model->get_by_id($row->org_id);
		$row_branch = $this->Branch_model->get_by_id($row->branch_id);
		$row_designation = $this->Designation_model->get_by_id($row->designation_id);
		$row_group = $this->Arbac_groups_model->get_by_id($row->group_id);
		$row_status = $this->Status_model->get_by_id($row->status);
		$row_staff = $this->Staff_details_model->get_by_id($row->manager_id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Staff',
		'staff_id' => $row->staff_id,
		'org_id' => $row_organization->name,
		'branch_id' => $row_branch->branch_name,
		'group_id' => $row_group->name,
		'manager_id' => $row_staff->firstname." ".$row_staff->lastname,
		'designation_id' => $row_designation->name,
		'status' => $row_status->status,
		'signature' => $row->signature,
		'lang' => $row->lang,
		'timezone' => $row->timezone,
		'locale' => $row->locale,
		'notes' => $row->notes,
		'created' => $row->created,
		'updated' => $row->updated,
		
		'firstname' => $row_details->firstname,
		'lastname' => $row_details->lastname,
		'father_name' => $row_details->father_name,
		'husband_name' => $row_details->husband_name,
		'phone' => $row_details->phone,
		'phone_ext' => $row_details->phone_ext,
		'mobile' => $row_details->mobile,
		'home_phone' => $row_details->home_phone,
		'photo' => $row_details->photo,
		'dob' => $row_details->dob,
		'dob_place' => $row_details->dob_place,
		'martial_status' => $row_details->martial_status,
		'children' => $row_details->children,
		'occupation' => $row_details->occupation,
		'joined_date' => date("m/d/Y", strtotime($row_details->joined_date)),
		'education' => $row_details->education,
		'specialization' => $row_details->specialization,
		'achivement_awards' => $row_details->achivement_awards,
		'events_attended' => $row_details->events_attended,
		'event_trained' => $row_details->event_trained,
		'fulltime' => $row_details->fulltime,
		'sms_notification' => $row_details->sms_notification,
		'isadmin' => $row_details->isadmin,
		'isvisible' => $row_details->isvisible,
		'onvacation' => $row_details->onvacation,
		'assigned_only' => $row_details->assigned_only,
		'change_passwd' => $row_details->change_passwd,
		'max_page_size' => $row_details->max_page_size,
		'auto_refresh_rate' => $row_details->auto_refresh_rate,
		'default_signature_type' => $row_details->default_signature_type,
		'default_paper_size' => $row_details->default_paper_size,
		'extra' => $row_details->extra,
		'permissions' => $row_details->permissions,
	    );
			$this->_tpl('staff/staff_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function create() 
    {
		$organization_list = $this->Organization_model->get_all();
		$branch_list = $this->Branch_model->get_all();
		$designation_list = $this->Designation_model->get_all();
		$group_list = $this->Arbac_groups_model->get_all_except_admin();
		$status_list = $this->Status_model->get_status_by_status_type('7');
		$staff_list = $this->Staff_model->get_all();
		$staff_details_list = $this->Staff_details_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('staff/create_action'),
			'title'  => 'TRAMS::SCP::Create Staff',
	    'staff_id' => set_value('staff_id'),
	    'org_id' => set_value('org_id'),
	    'branch_id' => set_value('branch_id'),
	    'group_id' => set_value('group_id'),
	    'manager_id' => set_value('manager_id'),
	    'designation_id' => set_value('designation_id'),
	    'status' => set_value('status'),
	    'signature' => set_value('signature'),
	    'lang' => set_value('lang'),
	    'timezone' => set_value('timezone'),
	    'locale' => set_value('locale'),
	    'notes' => set_value('notes'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
		'organization_list' => $organization_list,
		'branch_list' => $branch_list,
		'designation_list' => $designation_list,
		'group_list' => $group_list,
		'status_list' => $status_list,
		'staff_details_list' => $staff_details_list,
		
	    'firstname' => set_value('firstname'),
	    'lastname' => set_value('lastname'),
	    'father_name' => set_value('father_name'),
	    'husband_name' => set_value('husband_name'),
	    'phone' => set_value('phone'),
	    'phone_ext' => set_value('phone_ext'),
	    'mobile' => set_value('mobile'),
	    'home_phone' => set_value('home_phone'),
	    'photo' => set_value('photo'),
	    'dob' => set_value('dob'),
	    'dob_place' => set_value('dob_place'),
	    'martial_status' => set_value('martial_status'),
	    'children' => set_value('children'),
	    'occupation' => set_value('occupation'),
	    'joined_date' => set_value('joined_date'),
	    'education' => set_value('education'),
	    'achivement_awards' => set_value('achivement_awards'),
	    'events_attended' => set_value('events_attended'),
	    'event_trained' => set_value('event_trained'),
	    'fulltime' => set_value('fulltime'),
	    'sms_notification' => set_value('sms_notification'),
	    'isadmin' => set_value('isadmin'),
	    'isvisible' => set_value('isvisible'),
	    'onvacation' => set_value('onvacation'),
	    'assigned_only' => set_value('assigned_only'),
	    'max_page_size' => set_value('max_page_size'),
	    'auto_refresh_rate' => set_value('auto_refresh_rate'),
	    'default_signature_type' => set_value('default_signature_type'),
	    'default_paper_size' => set_value('default_paper_size'),
	    'extra' => set_value('extra'),
	    'permissions' => set_value('permissions'),
	);
          $this->_tpl('staff/staff_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $staff_data = array(
		'org_id' => $this->input->post('org_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
		'manager_id' => $this->input->post('manager_id',TRUE),
		'designation_id' => $this->input->post('designation_id',TRUE),
		'status' => $this->input->post('status',TRUE),
		'signature' => $this->input->post('signature',TRUE),
		'lang' => $this->input->post('lang',TRUE),
		'timezone' => $this->input->post('timezone',TRUE),
		'locale' => $this->input->post('locale',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );
		$staff_details_data = array(
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'father_name' => $this->input->post('father_name',TRUE),
		'husband_name' => $this->input->post('husband_name',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'phone_ext' => $this->input->post('phone_ext',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'home_phone' => $this->input->post('home_phone',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'dob' => $this->input->post('dob',TRUE),
		'dob_place' => $this->input->post('dob_place',TRUE),
		'martial_status' => $this->input->post('martial_status',TRUE),
		'children' => $this->input->post('children',TRUE),
		'occupation' => $this->input->post('occupation',TRUE),
		'joined_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('joined_date',TRUE)))),
		'education' => $this->input->post('education',TRUE),
		'achivement_awards' => $this->input->post('achivement_awards',TRUE),
		'events_attended' => $this->input->post('events_attended',TRUE),
		'event_trained' => $this->input->post('event_trained',TRUE),
		'fulltime' => $this->input->post('fulltime',TRUE),
		'sms_notification' => $this->input->post('sms_notification',TRUE),
		'isadmin' => $this->input->post('isadmin',TRUE),
		'isvisible' => $this->input->post('isvisible',TRUE),
		'onvacation' => $this->input->post('onvacation',TRUE),
		'assigned_only' => $this->input->post('assigned_only',TRUE),
		'max_page_size' => $this->input->post('max_page_size',TRUE),
		'auto_refresh_rate' => $this->input->post('auto_refresh_rate',TRUE),
		'default_signature_type' => $this->input->post('default_signature_type',TRUE),
		'default_paper_size' => $this->input->post('default_paper_size',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'permissions' => $this->input->post('permissions',TRUE),
	    );

            $staff_id = $this->Staff_model->insert($staff_data);
			if($staff_id){
			$staff_details_data['staff_id'] = $staff_id;
			$this->Staff_details_model->insert($staff_details_data);
			}
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('staff'));
        }
    }
    
    public function update($id) 
    {
		$organization_list = $this->Organization_model->get_all();
		$branch_list = $this->Branch_model->get_all();
		$designation_list = $this->Designation_model->get_all();
		$group_list = $this->Arbac_groups_model->get_all_except_admin();
		$status_list = $this->Status_model->get_status_by_status_type('7');
		$staff_list = $this->Staff_model->get_all();
		$staff_details_list = $this->Staff_details_model->get_all();
        $row = $this->Staff_model->get_by_id($id);
		$row_details = $this->Staff_details_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('staff/update_action'),
				'title'  => 'TRAMS::SCP::Update Staff',
		'staff_id' => set_value('staff_id', $row->staff_id),
		'org_id' => set_value('org_id', $row->org_id),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'group_id' => set_value('group_id', $row->group_id),
		'manager_id' => set_value('manager_id', $row->manager_id),
		'designation_id' => set_value('designation_id', $row->designation_id),
		'status' => set_value('status', $row->status),
		'signature' => set_value('signature', $row->signature),
		'lang' => set_value('lang', $row->lang),
		'timezone' => set_value('timezone', $row->timezone),
		'locale' => set_value('locale', $row->locale),
		'notes' => set_value('notes', $row->notes),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
		'organization_list' => $organization_list,
		'branch_list' => $branch_list,
		'designation_list' => $designation_list,
		'group_list' => $group_list,
		'status_list' => $status_list,
		'staff_details_list' => $staff_details_list,
		
		'firstname' => set_value('firstname', $row_details->firstname),
		'lastname' => set_value('lastname', $row_details->lastname),
		'father_name' => set_value('father_name', $row_details->father_name),
		'husband_name' => set_value('husband_name', $row_details->husband_name),
		'phone' => set_value('phone', $row_details->phone),
		'phone_ext' => set_value('phone_ext', $row_details->phone_ext),
		'mobile' => set_value('mobile', $row_details->mobile),
		'home_phone' => set_value('home_phone', $row_details->home_phone),
		'photo' => set_value('photo', $row_details->photo),
		'dob' => set_value('dob', $row_details->dob),
		'dob_place' => set_value('dob_place', $row_details->dob_place),
		'martial_status' => set_value('martial_status', $row_details->martial_status),
		'children' => set_value('children', $row_details->children),
		'occupation' => set_value('occupation', $row_details->occupation),
		'joined_date' => set_value('joined_date', date("m/d/Y", strtotime($row_details->joined_date))),
		'education' => set_value('education', $row_details->education),
		'specialization' => set_value('specialization', $row_details->specialization),
		'achivement_awards' => set_value('achivement_awards', $row_details->achivement_awards),
		'events_attended' => set_value('events_attended', $row_details->events_attended),
		'event_trained' => set_value('event_trained', $row_details->event_trained),
		'fulltime' => set_value('fulltime', $row_details->fulltime),
		'sms_notification' => set_value('sms_notification', $row_details->sms_notification),
		'isadmin' => set_value('isadmin', $row_details->isadmin),
		'isvisible' => set_value('isvisible', $row_details->isvisible),
		'onvacation' => set_value('onvacation', $row_details->onvacation),
		'assigned_only' => set_value('assigned_only', $row_details->assigned_only),
		'change_passwd' => set_value('change_passwd', $row_details->change_passwd),
		'max_page_size' => set_value('max_page_size', $row_details->max_page_size),
		'auto_refresh_rate' => set_value('auto_refresh_rate', $row_details->auto_refresh_rate),
		'default_signature_type' => set_value('default_signature_type', $row_details->default_signature_type),
		'default_paper_size' => set_value('default_paper_size', $row_details->default_paper_size),
		'extra' => set_value('extra', $row_details->extra),
		'permissions' => set_value('permissions', $row_details->permissions),
	    );
			$this->_tpl('staff/staff_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('staff_id', TRUE));
        } else {
            $staff_data = array(
		'org_id' => $this->input->post('org_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'group_id' => $this->input->post('group_id',TRUE),
		'manager_id' => $this->input->post('manager_id',TRUE),
		'designation_id' => $this->input->post('designation_id',TRUE),
		'status' => $this->input->post('status',TRUE),
		'signature' => $this->input->post('signature',TRUE),
		'lang' => $this->input->post('lang',TRUE),
		'timezone' => $this->input->post('timezone',TRUE),
		'locale' => $this->input->post('locale',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );
		
		$staff_details_data = array(
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'father_name' => $this->input->post('father_name',TRUE),
		'husband_name' => $this->input->post('husband_name',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'phone_ext' => $this->input->post('phone_ext',TRUE),
		'mobile' => $this->input->post('mobile',TRUE),
		'home_phone' => $this->input->post('home_phone',TRUE),
		'photo' => $this->input->post('photo',TRUE),
		'dob' => $this->input->post('dob',TRUE),
		'dob_place' => $this->input->post('dob_place',TRUE),
		'martial_status' => $this->input->post('martial_status',TRUE),
		'children' => $this->input->post('children',TRUE),
		'occupation' => $this->input->post('occupation',TRUE),
		'joined_date' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('joined_date',TRUE)))),
		'education' => $this->input->post('education',TRUE),
		'achivement_awards' => $this->input->post('achivement_awards',TRUE),
		'events_attended' => $this->input->post('events_attended',TRUE),
		'event_trained' => $this->input->post('event_trained',TRUE),
		'fulltime' => $this->input->post('fulltime',TRUE),
		'sms_notification' => $this->input->post('sms_notification',TRUE),
		'isadmin' => $this->input->post('isadmin',TRUE),
		'isvisible' => $this->input->post('isvisible',TRUE),
		'onvacation' => $this->input->post('onvacation',TRUE),
		'assigned_only' => $this->input->post('assigned_only',TRUE),
		'max_page_size' => $this->input->post('max_page_size',TRUE),
		'auto_refresh_rate' => $this->input->post('auto_refresh_rate',TRUE),
		'default_signature_type' => $this->input->post('default_signature_type',TRUE),
		'default_paper_size' => $this->input->post('default_paper_size',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'permissions' => $this->input->post('permissions',TRUE),
	    );
		

            $this->Staff_model->update($this->input->post('staff_id', TRUE), $staff_data);
			$this->Staff_details_model->update($this->input->post('staff_id', TRUE), $staff_details_data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('staff'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Staff_model->get_by_id($id);

        if ($row) {
            $this->Staff_model->delete($id);
			$this->Staff_details_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('staff'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('org_id', 'org id', 'trim|required|numeric');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('group_id', 'group id', 'trim|required|numeric');
	$this->form_validation->set_rules('designation_id', 'designation id', 'trim|required|numeric');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('signature', 'signature', 'trim|required');
	$this->form_validation->set_rules('lang', 'lang', 'trim|required');
	$this->form_validation->set_rules('timezone', 'timezone', 'trim|required');
	$this->form_validation->set_rules('locale', 'locale', 'trim|required');
		
		

	$this->form_validation->set_rules('staff_id', 'staff_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Staff.php */
