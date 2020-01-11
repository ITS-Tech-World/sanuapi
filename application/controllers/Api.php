<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Api extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('ApiModel');
		$this->load->model('UsersModel');
	}

	//Comment
	
	private function test(){
		echo "Hello";
	}


	public function users(){
		//$data = array();
		//Read url request and validate it
		if($this->input->get('publishablekey')){
			$publishablekey = $this->input->get('publishablekey');
			//Check if publishable key is empty or null
			if(!empty($publishablekey)){
				//Fetch api
				$api = $this->ApiModel->getApiSettingsByPublishableKey($publishablekey);
				//Check if api was returned with data
				if(!empty($api) || $api != false){
					//Get type of request
					$request_type = $this->input->get('type');
					if(!empty($request_type)){
						switch ($request_type) {
							case 'query':
								$id = $this->input->get('id');
								if(!empty($id)){
									$user = $this->UsersModel->getUserById($id);
									if(!empty($user)){
										$data = $user;
									}else{
										//Error code
										$data = array(
											"code" => "user_not_found",
											"message" => "Could not find the user you are looking for"
										);
									}
								}else{
									//Error code
									$data = array(
										"code" => "null_id",
										"message" => "Null id request"
									);
								}
								break;
							case 'insert':
								# code...
								break;
							case 'update':
								# code...
								break;
							case 'delete':
								# code...
								break;
							default:
								# code...
								break;
						}
					}else{
						//Error code
						$data = array(
							"code" => "null_request_type",
							"message" => "Null request type"
						);
					}
				}else{
					//Error code
					$data = array(
						"code" => "invalid_api",
						"message" => "Invalid api or not found"
					);
				}
			}else{
				//Error code
				$data = array(
					"code" => "empty_parameter",
					"message" => "Invalid url request"
				);
			}
		}else{
			//Error code
			$data = array(
				"code" => "invalid_parameter",
				"message" => "Invalid url request"
			);
		}
		//Output data
		header('Content-Type: application/json');
		echo json_encode($data);
	}


	function live_chat(){

	}
}