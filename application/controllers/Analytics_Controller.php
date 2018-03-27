<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Analytics_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Analytics_Model', 'am');
	}

	public function index(){
		$infoinversor = $this->am->consultaInfoinversor();
		var_dump($infoinversor);
		exit();
	}

}