<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userlist extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('workgroup_model');
		parent::isAdmin();
	}
	
	public function index(){
		$userObj = $this->user_model->selectUser();
		$data['userRs'] = $userObj->result();
		$groupRs = $this->workgroup_model->select()->result();
		$tempArr = array();
		foreach ($groupRs as $key => $value) {
			$tempArr[$value->id] = $value;
		}
		$data['groupRs'] = $tempArr;
		$this->load->view('admin/userlist/index',$data);
	}
	
	public function edit($id){
		if(!empty($_POST)){
			if(empty($_POST['edit_username'])){
				exec_script('alert("用户名不能为空。");history.back();');exit;
			}
			if(empty($_POST['edit_workgroup'])){
				exec_script('alert("工作组不能为空。");history.back();');exit;
			}
			$userRs = array(
					'username' 	        => 	$_POST['edit_username'], 
					'email' 			=> 	$_POST['edit_email'],
					'workgroup_id' 	    => 	$_POST['edit_workgroup'],
					'status'	        =>	empty($_POST['edit_status']) ? 0 : 1);
			if(!empty($_POST['edit_password'])){
				$userRs['password'] = md5($_POST['edit_password']);
			}
			$result = $this->user_model->updateUser($userRs, array('id' => $id));
			if($result){
				exec_script('window.location.href="'.site_url(array('admin', 'userlist')).'";');exit;
			}else{
				exec_script('alert("修改失败。");history.back();');exit;
			}
			exit;
		}
		$data['query'] = $this->user_model->selectUser(array('id' => $id));
		$data['query2'] = $this->workgroup_model->select();
		$this->load->view('admin/userlist/edit',$data);
	}
	
	public function add(){
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
			if(empty($_POST['add_workgroup'])){
				exec_script('alert("工作组不能为空。");history.back();');exit;
			}
			$result = $this->user_model->insertUser(array(
					'username' 	        => 	$_POST['add_username'],
					'password' 			=> 	md5($_POST['add_password']),
					'email' 			=> 	$_POST['add_email'],
					'workgroup_id' 	    => 	$_POST['add_workgroup'],
					'status'	        =>	empty($_POST['add_status']) ? 0 : 1,
					'reg_time'          =>  strtotime( date("Y-m-d H:i:s",time() ) )) ) ;
			if($result){
				exec_script('window.location.href="'.site_url(array('admin', 'userlist')).'";');exit;
			}else{
				exec_script('alert("添加失败。");history.back();');exit;
			}
			exit;
		}
		$data['query'] = $this->workgroup_model->select();
		$this->load->view('admin/userlist/add',$data);
	}
	
	public function limit($id){
		if(!empty($_POST)){
			$result = $this->user_model->updateUser(array(
					'is_no_process' 	        => 	empty($_POST['is_no_process']) ? 0 : 1,
					'is_processing' 			=> 	empty($_POST['is_processing']) ? 0 : 1,
					'is_finished' 			=> 	empty($_POST['is_finished']) ? 0 : 1,
					'is_cancled' 	    => 	empty($_POST['is_cancled']) ? 0 : 1,
					'is_closed'	        =>	empty($_POST['is_closed']) ? 0 : 1), array('id' => $id) );
			if($result){
				exec_script('window.location.href="'.site_url(array('admin', 'userlist')).'";');exit;
			}else{
				exec_script('alert("修改失败。");history.back();');exit;
			}
			exit;
		}
		$data['query'] = $this->user_model->selectUser(array('id' => $id));
		$this->load->view('admin/userlist/limit',$data);
	}
	
	public function del($id){
		$result = $this->user_model->delUser(array('id' => $id));
			if($result){
				exec_script('window.location.href="'.site_url(array('admin', 'userlist')).'";');exit;
			}else{
				exec_script('alert("删除失败。");history.back();');exit;
			}
			exit;
	}
}