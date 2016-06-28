<?php


/* Location: ./application/models/Customer_site_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-26 03:14:12 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_customer_site_model extends CI_Model
{

    public $table = 'user_customer_site';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

}

/* End of file Customer_site_model.php */