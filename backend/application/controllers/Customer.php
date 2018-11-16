<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public $PAGE;

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_product');
	}

	public function index()
	{

		$this->PAGE['product'] = $this->model_product->getproduct();
		$this->PAGE['product_category'] = $this->model_product->getcategory();

		// print_r($this->PAGE['product']); exit();
        $this->load->view('customer/v_customer', $this->PAGE);
	}


	public function add_product(){

		$pro_id = $this->input->post('pro_id');
		$pro_name = $this->input->post('pro_name');
		$pro_detail = $this->input->post('pro_detail');
		$pro_image = $this->input->post('pro_image');
		$pro_price = $this->input->post('pro_price');
		$pro_amount = $this->input->post('pro_amount');
		$pro_color = $this->input->post('pro_color');
		$pro_category = $this->input->post('pro_category');

		// print_r($pro_id); exit();

		$data = array(
                    'product_id' => $pro_id,
			        'product_name' => $pro_name,
			        'product_detail' => $pro_detail,
			        'product_image' => $pro_image,
			        'product_price' => $pro_price,
			        'product_amount' => $pro_amount,
			        'product_color' => $pro_color,
			        'product_category_id' => $pro_category
                );

		// print_r($data_product); exit();
		// $design_id = $this->model_design->save($data);

		$pro['product'] = $this->model_product->getproductbyid($pro_id);

		if (!empty($pro['product'])) {

			$data['status'] = 'nosave';
		}else{
			$design_id = $this->model_design->save($data);

			$data['status'] = 'save';
		}
		
        echo json_encode($data);
	}


	public function show_product(){

		$pro_id = $this->input->post('pro_id');

		$data['product'] = $this->model_product->getproductbyid($pro_id);

		echo json_encode($data);
	}


	 public function upload_file()
    {
        $upload_path = APPPATH . 'uploads';
        if(!file_exists($upload_path)) mkdir($upload_path);
        if(!$_FILES) redirect(base_url('upload'));
        $this->load->library('upload', [
            'upload_path' => $upload_path,
            'allowed_types' => 'jpg'
        ]);
        if($this->upload->do_upload('file')) 
        {
            return $this->load->view('upload', [
                'data' => $this->upload->data()
            ]);
        }
        return $this->load->view('upload', [
            'error' => $this->upload->display_errors()
        ]);
    }

	public function update(){
		$this->load->view('update_view');
	}
}