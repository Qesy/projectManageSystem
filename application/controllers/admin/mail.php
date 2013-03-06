<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		parent::isAdmin();
		$this->load->model('mail_model');
	}
	
	public function index(){
		if(!empty($_POST)){
			$result = $this->mail_model->update(array(
					'smtp_host' 	=> 	$_POST['smtp_host'], 
					'smtp_user' 	=> 	$_POST['smtp_user'], 
					'smtp_pass' 	=> 	$_POST['smtp_pass'],
					'smtp_port'		=>	$_POST['smtp_port']
			));
			if($result){
				exec_script('window.location.href="'.site_url(array('admin', 'mail')).'";');exit;
			}else{
				exec_script('alert("修改失败。");history.back();');exit;
			}
			exit;
		}
		
		$rs = $this->mail_model->select(array('id' => 1));
		$temp['rs'] = $rs[0];
		$this->load->view('admin/mail/index', $temp);
	}

	public function test(){
		if(!empty($_POST)){
			$this->mail_model->send($_POST['mail'], '这是一封测试邮件', '这是一封测试邮件，测试邮件服务器配置是否正确，仅此而已，你无需回复本邮件.');
			echo 1;
			return;
		}
		echo 0;return;
	}
}