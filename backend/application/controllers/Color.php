<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color extends CI_Controller {

	public $PAGE;

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_product');

		// $this->load->library('upload');
	}

	public function index()
	{

		$this->PAGE['color'] = $this->model_product->getcolor();
		// $this->PAGE['product_category'] = $this->model_product->getcategory();

		// print_r($this->PAGE['product']); exit();
        $this->load->view('product/v_color', $this->PAGE);

	}

	public function add_color(){

		$color_name = $this->input->post('color_name');
		$user_update = '2222';
		$update_date = date('Y-m-d H:i:s');

		$data = array(
                    'color_name' => $color_name,
			        'user_update' => $user_update,
			        'update_date' => $update_date
                );

		// print_r($data_product); exit();
		$color_save = $this->model_product->savecolor($data);

			$data['status'] = 'save';
		
        echo json_encode($data);
	}

	public function show_color(){

		$color_id = $this->input->post('color_id');

		$data['color'] = $this->model_product->getcolorbyid($color_id);

		echo json_encode($data);
	}

	public function update_color(){
		$color_id = $this->input->post('color_id');
		$color_name = $this->input->post('color_name');
		$user_update = '2222';
		$update_date = date('Y-m-d H:i:s');

		$data = array(
                    'color_name' => $color_name,
			        'user_update' => $user_update,
			        'update_date' => $update_date
                );

		$color_update = $this->model_product->updatecolorname($color_id,$data);

		$data['colorupdate'] = $this->model_product->getcolorbyid($color_id);

		$data['status'] = 'save';

		echo json_encode($data);
	}
}