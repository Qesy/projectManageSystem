<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		parent::isAdmin();
		
	}
	
	public function index(){
		if(!empty($_POST)){
			if(empty($_POST['project_name'])){
				exec_script('alert("项目名称不能为空。");history.back();');exit;
			}
			$isOpenReg = empty($_POST['is_open_reg']) ? 0 : 1;
			$result = $this->system_model->update(array(
					'project_name' 	=> 	$_POST['project_name'], 
					'logo' 			=> 	$_POST['logo'], 
					'copyright' 	=> 	$_POST['copyright'],
					'is_open_reg'	=>	$isOpenReg
			));
			if($result){
				exec_script('window.location.href="'.site_url(array('admin', 'system')).'";');exit;
			}else{
				exec_script('alert("修改失败。");history.back();');exit;
			}
			exit;
		}
		$this->load->view('admin/system/index');
	}
}