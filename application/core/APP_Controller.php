<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Extend CI's Controller class to add system-wide application specific logic
 *
 *	@author		Asmitha
 *	@version	1.0.0
 */
class APP_Controller extends CI_Controller {

	/**
	 *	Init & set defaults
	 */	
	var $tpl_data 			= array();
	var $uri_data 			= array();
	var $current_dts		= 0;

	// --------------------------------------------------------------------
	
	/**
	 *	class constructor
	 *
	 *	@author	Asmitha
	 */
	public function __construct()
	{
		parent::__construct();
		
		// Enable the profiler.
		//$this->output->enable_profiler(TRUE);
                $this->output->enable_profiler(FALSE);

		// Load config/version.php
		//$this->config->load('version');

		// Init: current_dts	
		$this->current_dts = date('Y-m-d H:i:s');
		
		// Init: The URI data as an assoc array.
		$this->uri_data = $this->uri->ruri_to_assoc();	
		
	}
	
	// --------------------------------------------------------------------
	
	/**
	 *	Method to load the "view" and add private template variables to the 
	 *	public template variables.
	 *
	 *	@author	Asmitha
	 *
	 *	@param	string	Path to the template file.
	 *	@param	array	Array of private template variables.
	 *	@param	bool	True or False to enable this template to be cached.
	 *	@param	int	The number of minutes to cache this template.
         *      @tpl for        Front end
	 */
	function _tpl($tpl_name, $private_tpl_data = array(), $cache_enabled = FALSE, $cache_time = 1)
	{
		if ($cache_enabled) {
			$this->output->cache((int) $cache_time);
		}
		
		$this->load->vars($this->tpl_data+$private_tpl_data);
		$this->load->view("common/app_header");	
                $this->load->view("common/app_sidebar");	
		$this->load->view($tpl_name);	
		$this->load->view("common/app_footer");	
	}
		
	// --------------------------------------------------------------------
}

/* End of file APP_Controller.php */
/* Location: ./app/core/APP_Controller.php */