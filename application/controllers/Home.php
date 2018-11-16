<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $PAGE;
	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
		$this->load->library('langlib');
		$this->load->helper(array('form', 'url'));
		$this->load->model('all_model');

		if ($this->session->userdata('lang') == 'english') {
            $lang = 'english';
            $this->session->set_userdata('lang', $lang);
        }else{
        	$lang = 'thailand';
            $this->session->set_userdata('lang', $lang);
        }

        $data_user = $this->session->userdata('lang');

        $this->lang->load($data_user,$data_user);
	}
	
	public function index()
	{	
	// $url_lang = $this->uri->segment(1);
        

        $sql="SELECT * FROM product WHERE delete_flag = 0";
    	$data["product"]=$this->all_model->call_all($sql);


		$this->load->view('home_view',$data);
	}

	public function change($type)
	{	
		// print_r($type); exit();
		$this->langlib->chooseLang($type); // ใช้สำหรับเปลี่ยนภาษาในทุก ๆ controller
	}

}
