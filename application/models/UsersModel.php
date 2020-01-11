<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class UsersModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**************************************************
	 * Name:		getApiSettingsByPublishableKey($key)
	 * Param:		$key [string] publishable key
	 * Description:	Fetches all records by publishable key
	 * Return:		result set OR false
	 *************************************************/
	function getUserById($id){
		$sql = "SELECT * FROM users WHERE id = " .$id;

		$query = $this->db->query($sql)->result();
		//print_r($query);exit;
		if(!empty($query)){
			return $query;
		}else{
			return false;
		}
	}
}