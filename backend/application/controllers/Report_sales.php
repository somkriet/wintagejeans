<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_sales extends CI_Controller {

	public $PAGE;

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_report');

		// $this->load->library('upload');
	}

	public function index()
	{

		// $this->PAGE['product'] = $this->model_product->getproduct();
		// $this->PAGE['product_category'] = $this->model_product->getcategory();
		// $this->PAGE['product_color'] = $this->model_product->getcolor();

		// print_r($this->PAGE['product']); exit();
        $this->load->view('report/v_report_sales', $this->PAGE);

	}
}