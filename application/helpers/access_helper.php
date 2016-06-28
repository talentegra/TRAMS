<?php
if ( ! function_exists('check_access'))
{
	/**
	 * Elements
	 *
	 * Returns only the array items specified. Will return a default value if
	 * it is not set.
	 *
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function check_access($user_id,$page)
	{
		$arr_page_admin = array('branch','branch_admin','faculty','faculty_admin','student','courses_catalog');
		$arr_page_branch_admin = array('faculty','faculty_admin','student','courses_catalog');
		$arr_page_faculty_admin = array('faculty','student','courses_catalog');
		$CI = &get_instance();
		$grp_arr =array();
		$grp_arr_details = $CI->ion_auth->get_users_groups($user_id)->result();
		foreach ($grp_arr_details as $key=>$val){
		$grp_arr[] = $val->name;
		}
		$flag = 0;
		if(in_array("admin", $grp_arr)){
			if(in_array($page, $arr_page_admin)){
				$flag = 1;
			}
		}
		if(in_array("branch_admin", $grp_arr)){
			if(in_array($page, $arr_page_branch_admin)){
				$flag = 1;
			}
		}
		if(in_array("faculty_admin", $grp_arr)){
			if(in_array($page, $arr_page_faculty_admin)){
				$flag = 1;
			}
		}
		return $flag;
	}
	
	
}

if ( ! function_exists('get_default_page'))
{
	/**
	 * get_default_page
	 *
	 * Returns only the array items specified. Will return a default value if
	 * it is not set.
	 *
	 * @param	array
	 * @param	array
	 * @param	mixed
	 * @return	mixed	depends on what the array contains
	 */
	function get_default_page($user_id)
	{
		$CI = &get_instance();
		$grp_arr_details = $CI->ion_auth->get_users_groups($user_id)->result();
		$grp_arr =array();
		foreach ($grp_arr_details as $key=>$val){
		$grp_arr[] = $val->name;
		}
		if(in_array("admin", $grp_arr)){
			return 'branch';
		}
		if(in_array("branch_admin", $grp_arr)){
			return 'faculty';
		}
		if(in_array("faculty_admin", $grp_arr)){
			return 'faculty';
		}
		return 'auth/login';
	}
}
