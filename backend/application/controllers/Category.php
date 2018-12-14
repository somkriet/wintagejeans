<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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
		$this->PAGE['product_color'] = $this->model_product->getcolor();

		// print_r($this->PAGE['product']); exit();
        $this->load->view('product/v_category', $this->PAGE);

	}

	public function add_category(){

		// $pro_id = $this->input->post('pro_id');
		$category_name = $this->input->post('category_name');
		$user_update = '2222';
		$update_date = date('Y-m-d H:i:s');

		//ดึงเลข quotation_id
        $year_month = date('Ymd');
        $product_id = $this->model_product->productid_max($year_month);

        if(!empty($product_id)){
            $max =  $product_id[0]->product_id+1;
        }else{
            $max = 1;
        }
        $gen_max = $this->fillzero($max,4);

        $pro_id = 'wt'.$year_month.$gen_max;
        //ดึงเลข quotation_id wt201811220001
        // print_r($pro_id); exit();

        // SELECT SUBSTRING(product_id, 11,4) AS product_id FROM product WHERE SUBSTRING(product_id, 3,8) = '29112018' ORDER BY product_id DESC

		$data = array(
                    'product_id' => $pro_id,
			        'product_name' => $pro_name,
			        'product_detail' => $pro_detail,
			        'product_image' => $pro_image,
			        'product_price' => $pro_price,
			        'product_cost_price' => $pro_cost_price,
			        'product_amount' => $pro_amount,
			        'size_s' => $pro_size_s,
		            'size_m' => $pro_size_m,
		            'size_l' => $pro_size_l,
		            'size_xl' => $pro_size_xl,
		            'size_2xl' => $pro_size_2xl,
		            'size_3xl' => $pro_size_3xl,
		            'size_4xl' => $pro_size_4xl,
			        'product_color' => $pro_color,
			        'product_category_id' => $pro_category,
			        'user_update' => $user_update,
			        'update_date' => $update_date
                );

		// print_r($data_product); exit();
		$add_data = $this->model_product->save($data);

		// $pro['product'] = $this->model_product->getproductbyid($pro_name);

		// if (!empty($pro['product'])) {

		// 	$data['status'] = 'nosave';
		// }else{
			// $design_id = $this->model_design->save($data);

			$data['status'] = 'save';
		// }
		
        echo json_encode($data);
	}

	public function update_category(){

		$product_id = $this->input->post('product_id');
		$pro_name = $this->input->post('pro_name');
		$pro_detail = $this->input->post('pro_detail');
		$pro_image = $this->input->post('pro_image');
		$pro_price = $this->input->post('pro_price');
		$pro_cost_price = $this->input->post('pro_cost_price');//ราคาทุน
		$pro_size_s = $this->input->post('pro_size_s');
		$pro_size_m = $this->input->post('pro_size_m');
		$pro_size_l = $this->input->post('pro_size_l');
		$pro_size_xl = $this->input->post('pro_size_xl');
		$pro_size_2xl = $this->input->post('pro_size_2xl');
		$pro_size_3xl = $this->input->post('pro_size_3xl');
		$pro_size_4xl = $this->input->post('pro_size_4xl');
		$pro_color = $this->input->post('pro_color');
		$pro_category = $this->input->post('pro_category');
		$pro_amount = $pro_size_s + $pro_size_m + $pro_size_l + $pro_size_xl + $pro_size_2xl + $pro_size_3xl + $pro_size_4xl;
		$user_update = '2222';
		$update_date = date('Y-m-d H:i:s');


		$data = array(
                    'product_name' => $pro_name,
			        'product_detail' => $pro_detail,
			        'product_image' => $pro_image,
			        'product_price' => $pro_price,
			        'product_cost_price' => $pro_cost_price,
			        'product_amount' => $pro_amount,
			        'size_s' => $pro_size_s,
		            'size_m' => $pro_size_m,
		            'size_l' => $pro_size_l,
		            'size_xl' => $pro_size_xl,
		            'size_2xl' => $pro_size_2xl,
		            'size_3xl' => $pro_size_3xl,
		            'size_4xl' => $pro_size_4xl,
			        'product_color' => $pro_color,
			        'product_category_id' => $pro_category,
			        'user_update' => $user_update,
			        'update_date' => $update_date
                );
		print_r($data); exit();
		$pro_update = $this->model_product->updateproduct($product_id,$data);

		// $data['colorupdate'] = $this->model_product->getcolorbyid($color_id);

		$data['status'] = 'save';

		echo json_encode($data);

	}


	public function fillzero($string=null, $length=null){
        while(strlen($string) != $length){
            $string = '0'.$string;
        }
    return $string;
    }


	public function show_category(){

		$pro_id = $this->input->post('pro_id');

		$data['product'] = $this->model_product->getproductbyid($pro_id);

		echo json_encode($data);
	}
	
	public function delete_category(){
		$product_id = $this->input->post('product_id');
		$user_update = '2222';
		$update_date = date('Y-m-d H:i:s');

		$data = array(
                    'user_update' => $user_update,
			        'update_date' => $update_date,
			        'delete_flag' => 1
			   );

		$delete_pro = $this->model_product->deleteproductbyid($product_id,$data);

		$data['status'] = 'save';

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
	          
	                if(!$this->upload->do_upload('image_file'))  
	                {  
	                     echo $this->upload->display_errors();  
	                }  
	                else  
	                {  
	                     $data = $this->upload->data();  
	                     echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="150" height="250" class="img-thumbnail" />';  
	                }  
	        }  

    }


}