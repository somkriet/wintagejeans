<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $PAGE;
	public function __construct() {
		
		parent::__construct();
		$this->load->library('session');
		$this->load->library('langlib');
		$this->load->helper('url');
		$this->load->model('model_login');

		$url_lang = $this->uri->segment(1);
        if ($url_lang == '') {
            $lang = 'thailand';
            $this->session->set_userdata('lang', $lang);
        }

        $data_user = $this->session->userdata('lang');
        $this->lang->load($data_user,$data_user);

	}
	
	public function index()
	{	
		
		$this->load->view('login_view',$this->PAGE);
	}

	public function user_login()
	{	
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $member = $this->model_login->getMemberDetail($email, $password);
        if (count($member) > 0) {
                foreach ($member as $row) {
                    $member_id = $row->id;
                    $fname = $row->username;
                    $lname = $row->lastname;
                }
            $member_id_sess = $this->session->userdata("member_id");

           	$this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $fname, 'lname' => $lname, 'member_id' => $member_id);
            $this->session->set_userdata($this->userdata);
           	$data['status'] = 'pass';
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
	}


	public function register(){
		$email = $this->input->post('email');
        $password = $this->input->post('password');
        $mobile = '';
        $company = '';

        $email = $this->input->post('email');
        //$password = $this->utils->getCode();
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $password = $this->input->post('password');
        $fbuid = $this->input->post('fbuid');
        $name = $firstname . " " . $lastname;
        $member = $this->model_login->getMemberDetail($email, $password);
	}


	public function checking()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $remember_me = $this->input->post('remember_me');
        $isCarting = $this->input->post('isCarting');


        if ($this->model_login->validateHasMember($email)) {
            if ($remember_me == 'remember_me') {
                $this->session->sess_expiration = '32140800'; //~ one year
                $this->session->sess_expire_on_close = 'false';
            } else {
                $this->session->sess_expiration = '1800'; //30 Minutes
                $this->session->sess_expire_on_close = 'true';
            }

            $member_id_sess = $this->session->userdata("member_id");
            $member = $this->model_login->getMemberDetail($email, $password);
            //echo $email;
            //echo $this->db->escape($password).;
            //exit();
            if (count($member) > 0) {
                foreach ($member as $row) {
                    $member_id = $row->member_id;
                    $fname = $row->fname;
                    $lname = $row->lname;
                }

                if (isset($isCarting) && $isCarting == 1) {
                    $data = array(
                        'member_id' => $member_id
                    );

                    $design_data_sess = $this->model_cart->getCartByMemberID($member_id_sess);
                    foreach ($design_data_sess as $row) {
                        $design_id = $row->design_id;
                        $this->model_design->update($design_id, $data); // อัพเดทดีไซน์ให้เป็นของคนที่สมัครสมาชิก
                    }
                    $this->model_cart->update($data, $member_id_sess); // อัพเดทดีไซน์ในตะกร้าให้เป็นของคนที่สมัครสมาชิก

                    //$this->model_cart->update($data,$this->session->userdata("member_id"));
                    $this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $fname, 'lname' => $lname, 'member_id' => $member_id);
                    $this->session->set_userdata($this->userdata);
                    redirect("cart/cartlogin", "refresh");
                } else {
                    $this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $fname, 'lname' => $lname, 'member_id' => $member_id);
                    $this->session->set_userdata($this->userdata);
                    $this->utils->setActiveAccountTab("mydesign");
                    redirect("account", "refresh");
                }
            } else {
                $this->PAGE['message'] = 'Invalid username or password !';
                if (isset($isCarting) && $isCarting == 1) {
                    redirect("cart/cartlogin", "refresh");
                } else {
                    $this->load->view('member/login_view', $this->PAGE);
                }
            }
            //echo $this->session->userdata("logged_in");

        } else {
            $this->PAGE['message'] = 'You are not a member';
            if (isset($isCarting) && $isCarting == 1) {
                redirect("cart/cartlogin", "refresh");
            } else {
                $this->load->view('member/login_view', $this->PAGE);
            }
        }
    }

    public function register5555()
    {
        $design_code = $this->input->post('design_code');
        $design_id = $this->input->post('design_id');

        $isFacebook = $this->input->post('isFacebook');
        $isCarting = $this->input->post('isCarting');

        // $mobile = $this->input->post('mobile');
        // $company = $this->input->post('company');

        $mobile = '';
        $company = '';

        $email = $this->input->post('email');
        //$password = $this->utils->getCode();
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $password = $this->input->post('password');
        $fbuid = $this->input->post('fbuid');
        $name = $firstname . " " . $lastname;

        if (!$isFacebook) {
            if (!isset($password) || $password == "") {
                $this->PAGE['message'] = 'Your Password is incorrect';
                $this->load->view('member/login_view', $this->PAGE);
                exit();
            }
        }
        if (!isset($fbuid)) {
            $fbuid = "";
        }

        $member_id_sess = $this->session->userdata("member_id");
        $member_data = $this->session->userdata();

        // print_r($member_id_sess); exit();

        if ($this->model_login->validateHasMember($email)) {//check email ว่า มีหรือไม่มี
            $member = $this->model_login->getMemberDetailByEmail($email);// ดึง application_member
            if (count($member) > 0) {
                foreach ($member as $row) {
                    $member_id = $row->member_id;
                }
            }

            // เพิ่มเบอร์และบริษัท
            $this->addaddress($member_id, $firstname, $lastname, $email, $mobile, $company);
            // จบเพิ่มเบอร์และบริษัท

            if ($isFacebook) {// check login facebook

                if (isset($isCarting) && $isCarting == 1) {
                    $data = array(
                        'member_id' => $member_id
                    );
                    $design_data_sess = $this->model_cart->getCartByMemberID($member_id_sess);
                    foreach ($design_data_sess as $row) {
                        $design_id = $row->design_id;
                        $this->model_design->update($design_id, $data); // อัพเดทดีไซน์ให้เป็นของคนที่สมัครสมาชิก
                    }
                    $this->model_cart->update($data, $member_id_sess); // อัพเดทดีไซน์ในตะกร้าให้เป็นของคนที่สมัครสมาชิก

                    $this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $firstname, 'lname' => $lastname, 'member_id' => $member_id);
                    $this->autoLogin($this->userdata);
                    redirect("cart", "refresh");

                } else {

                    if (isset($design_code) && $design_code != "") {
                        $data = array(
                            'member_id' => $member_id
                        );
                        $this->model_design->update($design_id, $data);
                        $this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $firstname, 'lname' => $lastname, 'member_id' => $member_id);
                        $this->autoLogin($this->userdata);
                        redirect("apps/create/" . $design_code, "refresh");
                    } else {
                        $this->utils->setActiveAccountTab("mydesign");
                        $this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $firstname, 'lname' => $lastname, 'member_id' => $member_id);
                        $this->autoLogin($this->userdata);
                        redirect("account", "refresh");
                    }
                }
            } else {
                if (isset($design_code) && $design_code != "") {
                    redirect("apps/create/" . $design_code, "refresh");
                } else {
                    $this->PAGE['message'] = 'This account already exist.</br>Please select a different email account.';
                    $this->load->view('member/login_view', $this->PAGE);
                }
            }
           
        } else {

                  $design_data_sess = $this->model_cart->getCartByMemberID($member_id_sess);
                // print_r($member_data); exit();
                 // [member_id] => 9083120 [design_id] => 4661 [design_code] => 6zfffcyyiz9d9eakhuvp [cart_id] => 0 )

            //$password = $this->utils->sendmail($email,$name,$password,"สมัครสมาชิก 12tees.com");
            //$this->PAGE['message'] = 'Register successfully. Please verify your email and then login to be continue.';

            if (isset($design_code) && $design_code != "") {
                $member_id = $this->model_login->register($email, $password, $firstname, $lastname, $fbuid);
                $this->utils->sendmail($email, $name, $password, "สมัครสมาชิก 12tees.com");
                $data = array(
                    'member_id' => $member_id
                );

                // เพิ่มเบอร์และบริษัท
                $this->addaddress($member_id, $firstname, $lastname, $email, $mobile, $company);
                // จบเพิ่มเบอร์และบริษัท

                $this->model_design->update($design_id, $data);
                $this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $firstname, 'lname' => $lastname, 'member_id' => $member_id);
                $this->autoLogin($this->userdata);
                $this->utils->setActiveAccountTab("mydesign");
                redirect("account", "refresh");
                // redirect("apps/create/".$design_code,"refresh");
            } else {
                $this->utils->sendmail($email, $name, $password, "สมัครสมาชิก 12tees.com");
                $member_id = $this->model_login->register($email, $password, $firstname, $lastname, $fbuid);
                $data = array(
                    'member_id' => $member_id
                );

                // เพิ่มเบอร์และบริษัท
                //$this->addaddress($member_id,$firstname,$lastname,$email,$mobile,$company);
                // จบเพิ่มเบอร์และบริษัท

                $design_data_sess = $this->model_cart->getCartByMemberID($member_id_sess);
                // print_r($design_data_sess);
                foreach ($design_data_sess as $row) {
                    $design_id = $row->design_id;
                    $this->model_design->update($design_id, $data); // อัพเดทดีไซน์ให้เป็นของคนที่สมัครสมาชิก
                }
                $this->model_cart->update($data, $member_id_sess); // อัพเดทดีไซน์ในตะกร้าให้เป็นของคนที่สมัครสมาชิก


                $this->userdata = array('logged_in' => TRUE, 'email' => $email, 'fname' => $firstname, 'lname' => $lastname, 'member_id' => $member_id);
                $this->autoLogin($this->userdata);
                if (isset($isCarting) && $isCarting == 1) {
                    redirect("cart", "refresh");
                } else {
                    $this->utils->setActiveAccountTab("mydesign");
                    redirect("account", "refresh");
                }
            }

        }
    }

	public function change($type)
	{
		$this->langlib->chooseLang($type); // ใช้สำหรับเปลี่ยนภาษาในทุก ๆ controller
	}

}
