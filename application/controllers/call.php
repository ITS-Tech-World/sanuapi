<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

    function index(){
    	echo "Hello Home";
    }
}
