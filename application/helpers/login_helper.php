<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Danish
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Login Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Danish
 * @created		16-12-2012
 */

// ------------------------------------------------------------------------

/**
 * Is Logged In
 *
 * Opens the file specfied in the path and returns it as a string.
 *
 * @access	public
 * @param	string	path to file
 * @return	string
 */
if ( ! function_exists('is_admin_logged_in'))
{
	function is_admin_logged_in()
	{
		// Get current CodeIgniter instance
		$CI =& get_instance();
		// We need to use $CI->session instead of $this->session
		$user = $CI->session->userdata('UserData');
		if (!$user) { $CI->url->redirect($CI->url->login()); exit; } else { return true; }	
	}
}

// ------------------------------------------------------------------------

/**
 *  Session exists
 *
 * Opens the file specfied in the path and returns it as a string.
 *
 * @access	public
 * @param	string	path to file
 * @return	string
 */
if ( ! function_exists('session_exists'))
{
	function session_exists()
	{
		// Get current CodeIgniter instance
		$CI =& get_instance();
		// We need to use $CI->session instead of $this->session
		$user = $CI->session->userdata('frontUserData');
		if (!$user) { $CI->url->redirect($CI->url->login()); exit; } else { return true; }	
	}
}

// ------------------------------------------------------------------------

/* End of file login_helper.php */
/* Location: ./application/helpers/login_helper.php */