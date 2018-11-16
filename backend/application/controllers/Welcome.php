<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_product');
	}

	public function index()
	{
		$this->load->view('home_view');
	}


	public function update(){
		$this->load->view('update_view');
	}
}
