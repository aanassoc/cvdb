<?php
	//database_tables.php
	
	/*
	* Short cut codes
	*/
	//$user = $this->session->userdata('frontUserData')
	//$this->session->userdata('memberId')
	
	/*
	result() - returns an array of PHP objects.
	row() - returns a single PHP object for that row.
	result_array() - returns an array of arrays.
	row_array() - returns a single array for that row.
	row() and row_array() - optionally take a parameter which is the number of the row you'd like to return.
	*/
	
	/*
	* End short cut codes
	*/
	
	
	//define('TBL_','');
	
	define('TBL_USERS','cv_users');
	define('TBL_CONSULTANTS','cv_consultants');
    define('TBL_SECTORS','cv_sectors');
    define('TBL_SUBSECTOR','cv_subsectors');
    define('TBL_DEGREES','cv_degrees');
    define('TBL_ASSIGN_SUBSECTORS','cv_assign_subsectors');
    define('TBL_ASSIGN_DEGREETYPE','cv_assign_degreetype');
    define('TBL_GRADE','cv_grade');
    define('TBL_ASSIGN_SECTOR','cv_assign_sector');
    define('TBL_ASSIGN_THEME','cv_assign_theme');
	define('TBL_EXPERTISE','cv_functional_expertise');
	define('TBL_ASSIGN_EXPERTISE','cv_assign_expertise');
	
	//define('TBL_','');
	
	$CI = &get_instance();
	define('SITEBASEURL',($CI->config->config['base_url']));
	define('css',SITEBASEURL.'css/');
	define('js',SITEBASEURL.'js/');
	define('images',SITEBASEURL.'images/');
	define('CV',SITEBASEURL.'cv/');
?>