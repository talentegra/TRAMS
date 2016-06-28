<?php

/* Location: ./application/controllers/Customer.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:09:38 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		$this->load->library('upload');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $customer = $this->Customer_model->get_all();

        $data = array(
            'title' => 'TesNOW::SCP::Customer',
			'customer_data' => $customer,
			
        );
		$this->load->view('templates/header', $data); 	
        $this->load->view('customer/customer_list', $data);
		$this->load->view('templates/footer', $data); 	
		
    }

    public function read($id) 
    {
        if(!$this->arbac->is_group_allowed('manage_roles', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('customer')); }
		
		$row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'title' => 'TesNOW::SCP::Customer',
		'id' => $row->id,
		'name' => $row->name,
		'cust_type' => $row->cust_type,
		'manager' => $row->manager,
		'manager_mobile' => $row->manager_mobile,
		'status' => $row->status,
		'domain' => $row->domain,
		'extra' => $row->extra,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('customer/customer_read', $data);
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function create() 
    {
        if(!$this->arbac->is_allowed('create_customer', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('customer')); } 
		$this->load->model('Customer_type_model');
		$cust_type_data = $this->Customer_type_model->get_all();
		
		$data = array(
            'button' => 'Create',
            'action' => site_url('customer/create_action'),
			'title' => 'TesNOW::SCP::Customer',
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'cust_type' => set_value('cust_type'),
	    'manager' => set_value('manager'),
	    'manager_mobile' => set_value('manager_mobile'),
	    'status' => set_value('status'),
	    'domain' => set_value('domain'),
	    'extra' => set_value('extra'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
		'cust_type_data' => $cust_type_data,
	);
        $this->load->view('templates/header', $data); 	
        $this->load->view('customer/customer_form', $data);
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
		'cust_type' => $this->input->post('cust_type',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'manager_mobile' => $this->input->post('manager_mobile',TRUE),
		'status' => $this->input->post('status',TRUE),
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function update($id) 
    {
		if(!$this->arbac->is_allowed('edit_customer', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('customer')); } 
		$this->load->model('Customer_type_model');
		$cust_type_data = $this->Customer_type_model->get_all();
		
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customer/update_action'),
				'title' => 'TesNOW::SCP::Customer',
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'cust_type' => set_value('cust_type', $row->cust_type),
		'manager' => set_value('manager', $row->manager),
		'manager_mobile' => set_value('manager_mobile', $row->manager_mobile),
		'status' => set_value('status', $row->status),
		'domain' => set_value('domain', $row->domain),
		'extra' => set_value('extra', $row->extra),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
		'cust_type_data' => $cust_type_data,
		'row' => $row,
	    );
			$this->load->view('templates/header', $data); 
            $this->load->view('customer/customer_edit', $data);
			$this->load->view('templates/footer', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
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
		'cust_type' => $this->input->post('cust_type',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'manager_mobile' => $this->input->post('manager_mobile',TRUE),
		'status' => $this->input->post('status',TRUE),
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Customer_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customer'));
        }
    }
    
    public function delete($id) 
    {
        if(!$this->arbac->is_allowed('delete_customer', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('customer')); } 
		$row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('cust_type', 'cust type', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
		
		

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
	
	
	/**
      # Function      :   customer_upload - view to Upload XLS file
      # Purpose       :   customer_upload
      # params        :   none
      # Return        :   none
      # Created_by    :   Vivek
      # Created_date  :   Apr 30 2016
     */
    public function customer_upload() {
        
		 if(!$this->arbac->is_allowed('upload_customer', $this->session->userdata('id'))) { $this->session->set_flashdata('error', 'Permission Denied'); redirect(site_url('customer')); }
		else {		
		$data = array(
            'title' => 'TesNOW::SCP::Customer',
        );
        $this->load->view('templates/header', $data);
        $this->load->view('customer/customer_upload', $data);
        $this->load->view('templates/footer', $data);
		}
    }
    /**
      # Function      :   serial_upload - Upload XLS file to the serial table
      # Purpose       :   serial_upload
      # params        :   none
      # Return        :   none
      # Created_by    :   Asmitha
      # Created_date  :   Mar 30 2016
     */
	
	
	public function customer_upload_submit() {
        if ($_FILES) {
            $output = "";
            $config['upload_path'] = './upload/'; //$this->config->item('upload_path');
            $config['allowed_types'] = 'xls|xlsx|csv';
            $config['max_size'] = 0;
            $this->upload->initialize($config);
            // If upload failed, display error
            if (!$this->upload->do_upload()) {
                $output = $this->upload->display_errors();
                
                $this->session->set_flashdata('message', $output);
                redirect(site_url('customer/customer_upload'));
                
            } else {
                //Create a list of serial no, to validate duplicates
                $arr_customer_list = $this->Customer_model->get_unique_customer();
                $existing_customer = array();
                if ($arr_customer_list != "failure") {
                    foreach ($arr_customer_list as $customer_value) {
                        $existing_customer[$customer_value['name']] = $customer_value['name'];
                    }
                }
                $file_data = $this->upload->data();
                $file_name = $config['upload_path'] . $file_data['file_name'];
                //load the excel library
                $this->load->library('excel');
                //read file from path
                $objPHPExcel = PHPExcel_IOFactory::load($file_name);
                //get only the Cell Collection
                $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
                $header = array();
                $arr_data = array();
                //extract to a PHP readable array format
                foreach ($cell_collection as $cell) {
                    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getFormattedValue();
                    
                    //header will/should be in row 1 only. of course this can be modified to suit your need.
                    if ($row == 1) {
                        $header[$row][$data_value] = $data_value;
                        $header_col[$column] = $data_value;
                    } else {
                        $arr_data[$row][$header_col[$column]] = $data_value;
                    }
                }
                foreach ($arr_data as $arr_key => $arr_value) {
                    foreach ($header[1] as $h_key) {
                        if (!isset($arr_data[$arr_key][$h_key])) {
                            $arr_data[$arr_key][$h_key] = '0';
                        }
                    }
                    $customer = $arr_data[$arr_key]['billing_name'];
                    $customer_error = 0;
                    if ($customer != "") {
                        if (in_array($customer, $existing_customer)) {
                            $customer_error = 1;
                        }
                    }
                    if ($customer_error == 0) {    //Insert
                        $data = array(
                            'name' => $arr_data[$arr_key]['billing_name'],
                            'created' => date('Y-m-d H:i:s'),
                            'updated' => date('Y-m-d H:i:s'),
                        );
                        $this->Customer_model->insert($data);
                        $existing_customer[$customer] = $customer; //Push the inserted customer.
                    } else {  //Update
                        
                        $data = array(
                            
                            'name' => $arr_data[$arr_key]['billing_name'],
                            'updated' => date('Y-m-d H:i:s'),
                        );
                        $this->Customer_model->update_by_customer($arr_data[$arr_key]['billing_name'], $data);
                    }
                }
                
                //Delete uplaoded file
                unlink($file_name);
                
                $this->session->set_flashdata('message', 'Upload Record Success');
                redirect(site_url('customer/customer_upload'));
            
            } //End Else
        }
    }


}

/* End of file Customer.php */
