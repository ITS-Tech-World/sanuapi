<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class ApiModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	/**************************************************
	 * Name:		getAllApi()
	 * Param:		null
	 * Description:	Fetches all records
	 * Return:		result set OR false
	 *************************************************/
	function getAllApi(){
		$sql = "SELECT * FROM api";

		$query = $this->db->query($sql)->result();
		//print_r($query);exit;
		if(!empty($query)){
			return $query;
		}else{
			return false;
		}
	}

	/**************************************************
	 * Name:		getApiSettingsByPublishableKey($key)
	 * Param:		$key [string] publishable key
	 * Description:	Fetches record by publishable key
	 * Return:		result set OR false
	 *************************************************/
	function getApiSettingsByPublishableKey($key){
		$sql = "SELECT * FROM api WHERE publishable_key = '" .$key. "'";

		$query = $this->db->query($sql)->result();
		//print_r($query);exit;
		if(!empty($query)){
			return $query;
		}else{
			return false;
		}
	}

	/**************************************************
	 * Name:		insert($data)
	 * Param:		$data [associative array] object data
	 * Description:	Inserts a record into api_settings
	 * Return:		true OR false
	 *************************************************/
	function insert($data){
		$this->db->insert("api", $data);

		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	/**************************************************
	 * Name:		deleteApiByID($id)
	 * Param:		$id [int] row identifier
	 * Description:	Deletes a record/row by id
	 * Return:		true OR false
	 *************************************************/
	function deleteApiByID($id){
		$sql = "DELETE FROM api WHERE id = " .$id;

		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}


	/**************************************************
	 * Name:		deleteApiByPublishableKey($key)
	 * Param:		$key [string] publishable key
	 * Description:	Deletes a record/row by punlishable key
	 * Return:		true OR false
	 *************************************************/
	function deleteApiByPublishableKey($key){
		$sql = "DELETE FROM api WHERE 	publishable_key = '" .$id. "'";

		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	/**************************************************
	 * Name:		updateApiById($id, $data)
	 * Param:		$id [int] api identifier
	 * Param:		$data [associative array] data to be updated
	 * Description:	Updates a row by id
	 * Return:		true OR false
	 *************************************************/
	function updateApiById($id, $data){
		$this->db->where('id', $id);
		$this->db->update('api', $data);

		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}

	/**************************************************
	 * Name:		updateApiByPublishableKey($key, $data)
	 * Param:		$key [string] publishable key
	 * Param:		$data [associative array] data to be updated
	 * Description:	Updates a row by punlishable key
	 * Return:		true OR false
	 *************************************************/
	function updateApiByPublishableKey($key, $data){
		$this->db->where('publishable_key', $key);
		$this->db->update('api', $data);

		if($this->db->affected_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}