<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function login(){
		if(!empty($_POST))
		{
			$this->load->model('user_model');
			$_email = $_POST['inputEmail'].'@9yuejiu.com';
			$_password = $_POST['inputPassword'];
			$userRs = $this->user_model->getUserInfo($_email,md5($_password),1);
			if(!empty($userRs))
			{
				$this->session->set_userdata(array(
					'userid' 	=> $userRs[0]->id, 
					'username' 	=> $userRs[0]->username, 
					'workgroup' => $userRs[0]->workgroup_id,
					'email'		=> $userRs[0]->email	
				));

				exec_script('window.location.href="'.site_url(array()).'";');
				return;

			}
		}
		$this->load->view('home/login');
	}
	
	
	public function reg(){
		if(empty($this->siteInfoArr->is_open_reg)){
			exec_script('window.location.href="'.site_url(array('welcome', 'login')).'"');exit;
		}
		if(!empty($_POST)){
			if(empty($_POST['add_username'])){
				exec_script('alert("用户名不能为空。");history.back();');exit;
			}
			if(empty($_POST['add_password'])){
				exec_script('alert("密码不能为空。");history.back();');exit;
			}
			if($_POST['add_password'] != $_POST['add_repassword']){
				exec_script('alert("密码不一致. ");history.back();');exit;
			}
			if(empty($_POST['add_email'])){
				exec_script('alert("电子邮件不能为空。");history.back();');exit;
			}
			$result = $this->user_model->insertUser(array(
					'username' 	        => 	$_POST['add_username'],
					'password' 			=> 	md5($_POST['add_password']),
					'email' 			=> 	$_POST['add_email'],
					'workgroup_id' 	    => 	'1',
					'status'	        =>	'1',
					'is_no_process'     =>	'1',
					'is_processing'     =>	'1',
					'is_finished'       =>	'1',
					'is_cancled'        =>	'1',
					'is_closed'         =>	'1',
					'reg_time'          =>  strtotime( date("Y-m-d H:i:s",time() ) )) ) ;
			if($result){
				exec_script('alert("注册用户成功！");window.location.href="'.site_url(array('welcome', 'login')).'";');exit;
			}else{
				exec_script('alert("注册用户失败，请重新尝试。");history.back();');exit;
			}
			exit;
		}
		$this->load->view('home/reg');
	}
}