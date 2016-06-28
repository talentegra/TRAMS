



<?php

/* Location: ./application/controllers/Permission.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-20 03:31:15 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permission extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

	

    function create_perm() {

        $a = $this->arbac->create_perm("create_ticket","Create Ticket");
		$this->arbac->create_perm("edit_ticket", "Edit Ticket");
		$this->arbac->create_perm("assign_ticket", "Assign Ticket");
		$this->arbac->create_perm("transfer_ticket", "Transfer Ticket");
		$this->arbac->create_perm("post_reply_ticket", "Post Reply Ticket");
		$this->arbac->create_perm("close_ticket", "Close Ticket");
		$this->arbac->create_perm("search_ticket", "Search Ticket");
		$this->arbac->create_perm("delete_ticket", "Delete Ticket");
		$this->arbac->create_perm("edit_ticket_thread", "Edit Ticket Thread");
		$this->arbac->create_perm("create_org", "Create Organization");
		$this->arbac->create_perm("edit_org", "Edit Organization");
		$this->arbac->create_perm("delete_org","Delete Organization");
		$this->arbac->create_perm("create_user","Create User");
		$this->arbac->create_perm("edit_user","Edit User");
		$this->arbac->create_perm("manage_user","Manage User");
		$this->arbac->create_perm("user_dir","User Directory");
		
		
    }
	
	function create_user() {
	/*	
	 $this->arbac->create_user('vivekra@dqserv.com', 'admin', 'vivekra');
	 $this->arbac->create_user('muthu@dqserv.com', 'admin', 'muthu');
	 $this->arbac->create_user('raman@dqserv.com', 'admin', 'raman');
	 $this->arbac->create_user('yuvan@dqserv.com', 'admin', 'yuvan');
	 $this->arbac->create_user('vijay@dqserv.com', 'admin', 'vijay');
	 $this->arbac->create_user('vikram@dqserv.com', 'admin', 'vikram');
	 $this->arbac->create_user('kumar@dqserv.com', 'admin', 'kumar');
	*/
	$this->arbac->create_user('sandy@dqserv.com', 'admin', 'sandy');
	}
	
	
	 function create_group() {
		$this->arbac->create_group("All Access");
        $this->arbac->create_group("Extended Access");
		$a = $this->arbac->create_group("Limited Access");
		$this->arbac->create_group("View only");
    }
	
}	