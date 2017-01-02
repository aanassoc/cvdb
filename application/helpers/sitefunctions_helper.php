<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter Site Functions Helper
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Danish
 * @created		13-04-2013
 */

// ------------------------------------------------------------------------

/**
 * Convert date from mysql to user format
 *
 * Opens the file specfied in the path and returns it as a string.
 *
 * @access	public
 * @param	mysqldate
 * @return	string
 */
if ( ! function_exists('mysql2userformat')){
	function mysql2userformat($mysql_date){
		
		$date_exp = explode("-",$mysql_date);
		$date_arr = $date_exp[1] . "/" .  $date_exp[2] . "/" . $date_exp[0] ;
		return $date_arr;
	}
}

/**
 * Convert date from user format to mysql
 *
 * Opens the file specfied in the path and returns it as a string.
 *
 * @access	public
 * @param	userdate
 * @return	string
 */
if ( ! function_exists('user2mysqlformat')){
	function user2mysqlformat($user_date){
		
		$date_exp = explode("/",$user_date);
		$mysql_date = $date_exp[2] . "-" . $date_exp[0] . "-" .  $date_exp[1]; 
		return $mysql_date;
	}
}//

if ( ! function_exists('convert12hoursto24')){
	function convert12hoursto24($time){
		$mysqlTime = "";
		$t = substr($time,0,5);
		$amOrPm = substr($time,-2);
		$xplode = explode(".",$t);
		
		if($amOrPm == 'AM'){
			$mysqlTime = $xplode[0] . ":" . $xplode[1] . ":" . "00";
		}else{
			$hours = $xplode[0] + 12;
			$mysqlTime = $hours . ":" . $xplode[1] . ":" . "00";
		}
		return $mysqlTime;
	}//
}//

if ( ! function_exists('convertMysqlTimeToUser')){
	function convertMysqlTimeToUser($mysqlTime){
		$userTime = "";
		$xplode = explode(":",$mysqlTime);
		if($xplode[0] >= 12){
			$hours = $xplode[0] - 12;
			$userTime = $hours . "." . $xplode[1] . " " . 'PM';
		}else{
			$userTime = $xplode[0] . "." . $xplode[1] . " " . 'AM';
		}
		
		return $userTime;
	}//
}//


if ( ! function_exists('mysql2userformat_datetime')){
    function mysql2userformat_datetime($user_date){
        $date_exp = explode(" ",$user_date);
        $mysql_date = mysql2userformat($date_exp[0]) . " " .  $date_exp[1];
        return $mysql_date;
    }
}//


?>