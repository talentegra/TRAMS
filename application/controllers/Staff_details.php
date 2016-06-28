<?php

/* Location: ./application/controllers/Staff_details.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-06-21 15:56:50 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_details extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_details_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $data = array(
            'title' => 'TRAMS::SCP::staff_details',
            'sort_by' => 'DESC',
            'sort_column' => 'staff_id',
			'q' => '',
			'total_rows' => ''
        );
        $this->_tpl('staff_details/staff_details_list', $data);
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
        $config['div'] = 'Staff_details_list'; //parent div tag id
        $config['base_url'] = base_url(). 'Staff_details/list_data';
        $config['total_rows'] = $this->Staff_details_model->total_rows($q);
        $config['per_page'] = $this->perPage;

        $this->ajax_pagination->initialize($config);

        //get the posts data
        $staff_details_data = $this->Staff_details_model->get_limit_data($config['per_page'], $offset,$sort_column ,$sort_by , $q);

        $data = array(
            'staff_details_data' => $staff_details_data,
            'page' => $page,
            'sort_by' => $sort_by,
            'sort_column' => $sort_column,
            'set_user_pagination_status' => $this->perPage,
            'title' => 'TRAMS | ',
            'primary_role_id' => $this->session->userdata('primary_role'),
			'total_rows' => $config['total_rows']
        );

        //load the view
        $this->load->view('staff_details/staff_details_list_data', $data);
    }

    public function read($id) 
    {
        $row = $this->Staff_details_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Staff_details',
		'staff_id' => $row->staff_id,
		'firstname' => $row->firstname,
		'lastname' => $row->lastname,
		'father_name' => $row->father_name,
		'husband_name' => $row->husband_name,
		'phone' => $row->phone,
		'phone_ext' => $row->phone_ext,
		'mobile' => $row->mobile,
		'home_phone' => $row->home_phone,
		'photo' => $row->photo,
		'dob' => $row->dob,
		'dob_place' => $row->dob_place,
		'martial_status' => $row->martial_status,
		'children' => $row->children,
		'occupation' => $row->occupation,
		'joined_date' => $row->joined_date,
		'education' => $row->education,
		'specialization' => $row->specialization,
		'achivement_awards' => $row->achivement_awards,
		'events_attended' => $row->events_attended,
		'event_trained' => $row->event_trained,
		'fulltime' => $row->fulltime,
		'sms_notification' => $row->sms_notification,
		'isadmin' => $row->isadmin,
		'isvisible' => $row->isvisible,
		'onvacation' => $row->onvacation,
		'assigned_only' => $row->assigned_only,
		'change_passwd' => $row->change_passwd,
		'max_page_size' => $row->max_page_size,
		'auto_refresh_rate' => $row->auto_refresh_rate,
		'default_signature_type' => $row->default_signature_type,
		'default_paper_size' => $row->default_paper_size,
		'extra' => $row->extra,
		'permissions' => $row->permissions,
	    );
			$this->_tpl('staff_details/staff_details_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_details'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('staff_details/create_action'),
			'title'  => 'TRAMS::SCP::Create Staff_details',
	    'staff_id' => set_value('staff_id'),
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
	    'specialization' => set_value('specialization'),
	    'achivement_awards' => set_value('achivement_awards'),
	    'events_attended' => set_value('events_attended'),
	    'event_trained' => set_value('event_trained'),
	    'fulltime' => set_value('fulltime'),
	    'sms_notification' => set_value('sms_notification'),
	    'isadmin' => set_value('isadmin'),
	    'isvisible' => set_value('isvisible'),
	    'onvacation' => set_value('onvacation'),
	    'assigned_only' => set_value('assigned_only'),
	    'change_passwd' => set_value('change_passwd'),
	    'max_page_size' => set_value('max_page_size'),
	    'auto_refresh_rate' => set_value('auto_refresh_rate'),
	    'default_signature_type' => set_value('default_signature_type'),
	    'default_paper_size' => set_value('default_paper_size'),
	    'extra' => set_value('extra'),
	    'permissions' => set_value('permissions'),
	);
          $this->_tpl('staff_details/staff_details_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
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
		'joined_date' => $this->input->post('joined_date',TRUE),
		'education' => $this->input->post('education',TRUE),
		'specialization' => $this->input->post('specialization',TRUE),
		'achivement_awards' => $this->input->post('achivement_awards',TRUE),
		'events_attended' => $this->input->post('events_attended',TRUE),
		'event_trained' => $this->input->post('event_trained',TRUE),
		'fulltime' => $this->input->post('fulltime',TRUE),
		'sms_notification' => $this->input->post('sms_notification',TRUE),
		'isadmin' => $this->input->post('isadmin',TRUE),
		'isvisible' => $this->input->post('isvisible',TRUE),
		'onvacation' => $this->input->post('onvacation',TRUE),
		'assigned_only' => $this->input->post('assigned_only',TRUE),
		'change_passwd' => $this->input->post('change_passwd',TRUE),
		'max_page_size' => $this->input->post('max_page_size',TRUE),
		'auto_refresh_rate' => $this->input->post('auto_refresh_rate',TRUE),
		'default_signature_type' => $this->input->post('default_signature_type',TRUE),
		'default_paper_size' => $this->input->post('default_paper_size',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'permissions' => $this->input->post('permissions',TRUE),
	    );

            $this->Staff_details_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('staff_details'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Staff_details_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('staff_details/update_action'),
				'title'  => 'TRAMS::SCP::Update Staff_details',
		'staff_id' => set_value('staff_id', $row->staff_id),
		'firstname' => set_value('firstname', $row->firstname),
		'lastname' => set_value('lastname', $row->lastname),
		'father_name' => set_value('father_name', $row->father_name),
		'husband_name' => set_value('husband_name', $row->husband_name),
		'phone' => set_value('phone', $row->phone),
		'phone_ext' => set_value('phone_ext', $row->phone_ext),
		'mobile' => set_value('mobile', $row->mobile),
		'home_phone' => set_value('home_phone', $row->home_phone),
		'photo' => set_value('photo', $row->photo),
		'dob' => set_value('dob', $row->dob),
		'dob_place' => set_value('dob_place', $row->dob_place),
		'martial_status' => set_value('martial_status', $row->martial_status),
		'children' => set_value('children', $row->children),
		'occupation' => set_value('occupation', $row->occupation),
		'joined_date' => set_value('joined_date', $row->joined_date),
		'education' => set_value('education', $row->education),
		'specialization' => set_value('specialization', $row->specialization),
		'achivement_awards' => set_value('achivement_awards', $row->achivement_awards),
		'events_attended' => set_value('events_attended', $row->events_attended),
		'event_trained' => set_value('event_trained', $row->event_trained),
		'fulltime' => set_value('fulltime', $row->fulltime),
		'sms_notification' => set_value('sms_notification', $row->sms_notification),
		'isadmin' => set_value('isadmin', $row->isadmin),
		'isvisible' => set_value('isvisible', $row->isvisible),
		'onvacation' => set_value('onvacation', $row->onvacation),
		'assigned_only' => set_value('assigned_only', $row->assigned_only),
		'change_passwd' => set_value('change_passwd', $row->change_passwd),
		'max_page_size' => set_value('max_page_size', $row->max_page_size),
		'auto_refresh_rate' => set_value('auto_refresh_rate', $row->auto_refresh_rate),
		'default_signature_type' => set_value('default_signature_type', $row->default_signature_type),
		'default_paper_size' => set_value('default_paper_size', $row->default_paper_size),
		'extra' => set_value('extra', $row->extra),
		'permissions' => set_value('permissions', $row->permissions),
	    );
			$this->_tpl('staff_details/staff_details_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_details'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('staff_id', TRUE));
        } else {
            $data = array(
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
		'joined_date' => $this->input->post('joined_date',TRUE),
		'education' => $this->input->post('education',TRUE),
		'specialization' => $this->input->post('specialization',TRUE),
		'achivement_awards' => $this->input->post('achivement_awards',TRUE),
		'events_attended' => $this->input->post('events_attended',TRUE),
		'event_trained' => $this->input->post('event_trained',TRUE),
		'fulltime' => $this->input->post('fulltime',TRUE),
		'sms_notification' => $this->input->post('sms_notification',TRUE),
		'isadmin' => $this->input->post('isadmin',TRUE),
		'isvisible' => $this->input->post('isvisible',TRUE),
		'onvacation' => $this->input->post('onvacation',TRUE),
		'assigned_only' => $this->input->post('assigned_only',TRUE),
		'change_passwd' => $this->input->post('change_passwd',TRUE),
		'max_page_size' => $this->input->post('max_page_size',TRUE),
		'auto_refresh_rate' => $this->input->post('auto_refresh_rate',TRUE),
		'default_signature_type' => $this->input->post('default_signature_type',TRUE),
		'default_paper_size' => $this->input->post('default_paper_size',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'permissions' => $this->input->post('permissions',TRUE),
	    );

            $this->Staff_details_model->update($this->input->post('staff_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('staff_details'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Staff_details_model->get_by_id($id);

        if ($row) {
            $this->Staff_details_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('staff_details'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff_details'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
	$this->form_validation->set_rules('father_name', 'father name', 'trim|required');
	$this->form_validation->set_rules('husband_name', 'husband name', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('phone_ext', 'phone ext', 'trim|required');
	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	$this->form_validation->set_rules('home_phone', 'home phone', 'trim|required|numeric');
	$this->form_validation->set_rules('photo', 'photo', 'trim|required');
	$this->form_validation->set_rules('dob', 'dob', 'trim|required');
	$this->form_validation->set_rules('dob_place', 'dob place', 'trim|required');
	$this->form_validation->set_rules('martial_status', 'martial status', 'trim|required');
	$this->form_validation->set_rules('children', 'children', 'trim|required');
	$this->form_validation->set_rules('occupation', 'occupation', 'trim|required');
	$this->form_validation->set_rules('joined_date', 'joined date', 'trim|required');
	$this->form_validation->set_rules('education', 'education', 'trim|required');
	$this->form_validation->set_rules('specialization', 'specialization', 'trim|required');
	$this->form_validation->set_rules('achivement_awards', 'achivement awards', 'trim|required');
	$this->form_validation->set_rules('events_attended', 'events attended', 'trim|required|numeric');
	$this->form_validation->set_rules('event_trained', 'event trained', 'trim|required|numeric');
	$this->form_validation->set_rules('fulltime', 'fulltime', 'trim|required');
	$this->form_validation->set_rules('sms_notification', 'sms notification', 'trim|required');
	$this->form_validation->set_rules('isadmin', 'isadmin', 'trim|required');
	$this->form_validation->set_rules('isvisible', 'isvisible', 'trim|required');
	$this->form_validation->set_rules('onvacation', 'onvacation', 'trim|required');
	$this->form_validation->set_rules('assigned_only', 'assigned only', 'trim|required');
	$this->form_validation->set_rules('change_passwd', 'change passwd', 'trim|required');
	$this->form_validation->set_rules('max_page_size', 'max page size', 'trim|required|numeric');
	$this->form_validation->set_rules('auto_refresh_rate', 'auto refresh rate', 'trim|required|numeric');
	$this->form_validation->set_rules('default_signature_type', 'default signature type', 'trim|required');
	$this->form_validation->set_rules('default_paper_size', 'default paper size', 'trim|required');
	$this->form_validation->set_rules('extra', 'extra', 'trim|required');
	$this->form_validation->set_rules('permissions', 'permissions', 'trim|required');

	$this->form_validation->set_rules('staff_id', 'staff_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Staff_details.php */
