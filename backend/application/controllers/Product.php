<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public $PAGE;

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_product');

		$this->load->library('upload');
	}

	public function index()
	{

		$this->PAGE['product'] = $this->model_product->getproduct();
		$this->PAGE['product_category'] = $this->model_product->getcategory();

		// print_r($this->PAGE['product']); exit();
        $this->load->view('product/v_product', $this->PAGE);

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
		$design_id = $this->model_product->save($data);

		$pro['product'] = $this->model_product->getproductbyid($pro_id);

		if (!empty($pro['product'])) {

			$data['status'] = 'nosave';
		}else{
			// $design_id = $this->model_design->save($data);

			$data['status'] = 'save';
		}
		
        echo json_encode($data);
	}


	public function show_product(){

		$pro_id = $this->input->post('pro_id');

		$data['product'] = $this->model_product->getproductbyid($pro_id);

		echo json_encode($data);
	}

	function image_upload(){  
           $data['title'] = "Upload Image using Ajax JQuery in CodeIgniter";  
           $this->load->view('product/v_product', $data);  
      }  

	public function upload_file(){
	  	
	  	// print_r($_FILES); exit();
	  	if(isset($_FILES["image_file"]["name"]))  
	        {  
	                $config['upload_path'] = './upload/';  
	                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 

		 			$this->upload->initialize($config);
	                // $this->load->library('upload', $config);  
	                if(!$this->upload->do_upload('image_file'))  
	                {  
	                     echo $this->upload->display_errors();  
	                }  
	                else  
	                {  
	                     $data = $this->upload->data();  
	                     echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';  
	                }  
	        }  

    }

	public function update(){
		$this->load->view('update_view');
	}
}