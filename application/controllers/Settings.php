<?php

/* Location: ./application/controllers/Settings.php */
/* Derived from Harviacode  */
/* Modified by Asmitha Shetty 2016-06-23 */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends APP_Controller {

    function __construct() {
        parent::__construct();


        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/login');
        }
    }

    public function index() {
        $data = array(
            'title' => 'TRAMS::SCP::Settings',
        );
        $this->_tpl('settings/settings_list', $data);
    }

    

}

/* End of file Branch.php */
