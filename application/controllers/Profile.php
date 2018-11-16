<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public $PAGE;
	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
		$this->load->library('langlib');
		$this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{	
	// $url_lang = $this->uri->segment(1);
        if ($this->session->userdata('lang') == 'english') {
            $lang = 'english';
            $this->session->set_userdata('lang', $lang);
        }else{
        	$lang = 'thailand';
            $this->session->set_userdata('lang', $lang);
        }

        $data_user = $this->session->userdata('lang');

        $this->lang->load($data_user,$data_user);

		$this->load->view('member/profile_view',$this->PAGE);
	}

	public function change($type)
	{	
		// print_r($type); exit();
		$this->langlib->chooseLang($type); // ใช้สำหรับเปลี่ยนภาษาในทุก ๆ controller
	}

}
