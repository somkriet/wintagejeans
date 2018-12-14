<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public $PAGE;

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('model_product');
		$this->load->model('model_customer');
		$this->load->model('model_order');

		$this->load->library('form_validation');    
		$this->form_validation->set_error_delimiters('<div class="bg-danger" style="padding:3px 10px;">', '</div>');    
		$this->load->library('upload'); 
	}

	public function index()
	{
		$this->PAGE['order'] = $this->model_order->getorder();
		$this->PAGE['product_category'] = $this->model_product->getcategory();

		// print_r($this->PAGE['product']); exit();
        $this->load->view('order/v_order', $this->PAGE);
	}

	public function create(){    

	 $config['upload_path'] = './upload/';  //โฟลเดอร์ ตําแหน่งเดียวกับ root ของโปรเจ็ค   
	 $config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์     
	 $config['max_size']     = '0';  // ขนาดไฟล์(kb)0 คือไม่จํากัดขึนกับกําหนดใน php.iniปกติไม่เกิน 2MB    
	 $config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน    
	 $config['max_height'] = '768'; // ความสูงรูปไม่เกิน   
	 $config['file_name'] = 'mypicture';  // ชือไฟล์ ถ้าไม่กําหนดจะเป็นตามชือเพิม

     $this->upload->initialize($config);    // เรียกใช้การตังค่า     
     $this->upload->do_upload('service_image'); // ทําการอัพโหลดไฟล์จาก inputfile ชือservice_image         
     $file_upload=$this->upload->data('file_name');  // ถ้าอัพโหลดได้ เราสามารถเรียกดูข้อมูลไฟล์ทีอัพได้  
       if($this->upload->display_errors()){ // ถ้าเกิดข้อมผิดพลาดในการอัพโหลดไฟล์       
        	return;    
       }else{  // หากไม่มีข้อผิดพลาดใดๆ เกิดข้อ ก็บันทึกข้อมูลส่วนอืนตามปกติ     
          $newdata = array('service_id' => NULL, 
          				   'service_title' => $this->input->post('service_title'),            
          				   'service_detail' => $this->input->post('service_detail'),            
          				   'service_img' => $file_upload,            
          				   'service_update' => date("Y-m-d H:i:s")
 						  );        
          	return $this->db->insert('tbl_service', $newdata);                
      } 
  }


	public function add_product(){

		$customer_id = $this->input->post('pro_id');
		$customer_name = $this->input->post('pro_name');
		$customer_detail = $this->input->post('pro_detail');
		$customer_image = $this->input->post('pro_image');
		$customer_price = $this->input->post('pro_price');
		$customer_amount = $this->input->post('pro_amount');
		$customer_color = $this->input->post('pro_color');
		$customer_category = $this->input->post('pro_category');

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