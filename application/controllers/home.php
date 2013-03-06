<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('ticket_model');
		$this->load->model('user_model');
		$this->load->library('pagination');
		$this->isUser();
	}

	public function index($p = 1){	
		
		$Pagecount=$this->ticket_model->getStatistics(array('ticket_id'=>0)) -> result();
		$config['total_rows'] = $Pagecount[0]->count;
		$config['per_page'] = 20;
		$offset=$config['per_page'] * ($p-1);
		//var_dump($p);exit;
		$config['use_page_numbers'] = TRUE;
		$config['base_url']=site_url(array('home', 'index'));
		$this->pagination->initialize($config);
		
		$data['data'] = $this->ticket_model->selectTickets(array('ticket_id' => 0), $config['per_page'], $offset, 'post_time', 'desc');
		$data['statusArr']=array('1'=>'未解决','2' => '进行中','3' => '已完成', '4' => '已关闭' , '5' => '已取消');
		
	
			
		$userRS= $this->user_model->selectUser()->result();
		$tmpArr=array();
		foreach($userRS as $value)
		{
			$tmpArr[$value->id] = $value;
		}
		$data['userRS'] = $tmpArr;
 		$this->load->view('home/index',$data);		
	}
	
	public function details($id)
	{
	
			$data['post_id']=$id;
			$data['topicdata'] = $this->ticket_model->selectTickets(array('id' => $id), 30, '', 'post_time', 'desc');
			$data['data'] = $this->ticket_model->selectTickets(array('ticket_id' => $id), 30, '', 'post_time', 'asc');
			$userRS= $this->user_model->selectUser()->result();
			$tmpArr = array();
			foreach($userRS as $value)
			{
				$tmpArr[$value->id] = $value;
			}
			$data['userRS'] = $tmpArr;
			$this->load->view('home/details',$data);
		
	}
	
	public function postReply(){
		if(!empty($_POST))
		{
			if(empty($_POST['title']))
			{
				exec_script('alert("标题不能为空。");history.back();');exit;
			}
			if(empty($_POST['content']))
			{
				exec_script('alert("内容不能为空。");history.back();');exit;
			}
				$postdetails = array(
									'title' => $_POST['title'] ,
									'content' => htmlspecialchars($_POST['content']) ,
									'status' => $_POST['status'] ,
									'ticket_id' =>$_POST['postid'],
									'post_time' => strtotime( date("Y-m-d H:i:s",time() ) ),
									'post_user_id' => $this->userId,
									'process_user_id' => $_POST['processorid'],
									'priority' =>$_POST['priority']					
						 			); 
				$addresult = $this->ticket_model->addTicket($postdetails);
				$this->ticket_model->updateTicket(array(
									'status' => $_POST['status'] ,
									'process_user_id' => $_POST['processorid'],
									'priority' =>$_POST['priority']					
						 			),
												  array('id'=>$_POST['postid'],'ticket_id'=>0));
				if($addresult > 0){
					exec_script('alert("提交成功。");window.location.href="'.site_url(array('home','details',$_POST['postid'])).'";');exit;
					
				}
				else{
					exec_script('alert("提交失败。");history.back();');exit;
				}
		}
	}
	
	public function newPost(){
		if(!empty($_POST['title']))
		{
			$postdetails = array(
					'title' => $_POST['title'] ,
					'content' => htmlspecialchars($_POST['content']) ,
					'status' => $_POST['status'] ,
					'ticket_id' =>0,
					'priority' => $_POST['priority'],
					'post_user_id' => $this->userId ,
					'process_user_id' => $_POST['processorid'] ,
					'post_time' =>  strtotime( date("Y-m-d H:i:s",time() ) ),
					'priority' =>$_POST['priority']
			);
			$addresult=$this->ticket_model->addTicket($postdetails);
			if($addresult>0){
				exec_script('alert("提交成功。");window.location.href="'.site_url().'";');exit;
			}
			else{
				exec_script('alert("提交失败。");history.back();');exit;
			}
		}
		$data['userdata']=$this->user_model->selectUser()->result();
		$this->load->view('home/newpost',$data);
	}
	
	public function search(){
		$userRS= $this->user_model->selectUser()->result();
		$tmpArr=array();
		foreach($userRS as $value)
		{
			$tmpArr[$value->id] = $value;
		}
		$data['userRS'] = $tmpArr;
		$data['data'] = $this->ticket_model->selectTickets(array('id' => $_POST['searchId']), 10, '', 'post_time', 'asc');
		$this->load->view('home/search',$data);
				
	}
	
	public function php(){
		phpinfo();
	}
	
	

	public function logout(){
		$this->session->unset_userdata(array(
					'userid' 	=> '', 
					'username' 	=> '', 
					'workgroup' => '',
					'email'		=> ''	
				));
		exec_script('window.location.href="'.site_url(array('welcome', 'login')).'";');exit;
	}

	public function upload(){
		$dir = 'static/uploads/'.date('Ym', time()).'/';
		if(!file_exists(FCPATH.$dir)){
			mkdir($dir);
		}
		$config['upload_path'] = FCPATH.$dir;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['file_name'] = 'pm'.uniqid(rand(100,999));
		$this->load->library('upload', $config);
		$result = $this->upload->do_upload('filedata');
		$rs = $this->upload->data();
		if($result){
			echo json_encode(array('url' => '/'.$dir.$rs['file_name'], 'error' => 0));
		}else{
			echo json_encode(array('message' => 'upload err', 'error' => 1));
		}
	}
	
	function changepass(){
		if(!empty($_POST)){
			if(empty($_POST['add_password'])){
				exec_script('alert("密码不能为空。");history.back();');exit;
			}
			if($_POST['add_password'] != $_POST['add_repassword']){
				exec_script('alert("密码输入不一致. ");history.back();');exit;
			}
			$result = $this->user_model->updateUser(array('password' => md5($_POST['add_password'])), array('id' => $this->userId));
			if($result){
				exec_script('alert("密码修改成功！");window.location.href="'.site_url(array()).'";');exit;
			}else{
				exec_script('alert("密码修改失败，请重新尝试。");history.back();');exit;
			}
			exit;
		}
		$this->load->view('home/changepass');
	}
	
	public function tobedone($p = 1){
		$Pagecount=$this->ticket_model->getStatistics(array('ticket_id' => 0,'status' => 1))-> result();
		$config['total_rows'] = $Pagecount[0]->count;
		$config['per_page'] = 20;
		$offset=$config['per_page'] * ($p-1);
		//var_dump($p);exit;
		$config['use_page_numbers'] = TRUE;
		$config['base_url']=site_url(array('home', 'tobedone'));
		$this->pagination->initialize($config);
		$data['data'] = $this->ticket_model->selectTickets(array('ticket_id' => 0, 'status' => 1), $config['per_page'], $offset, 'post_time', 'desc');
		$data['statusArr']=array('1'=>'未解决','2' => '进行中','3' => '已完成', '4' => '已关闭' , '5' => '已取消');
		$userRS= $this->user_model->selectUser()->result();
		$tmpArr=array();
		foreach($userRS as $value)
		{
			$tmpArr[$value->id] = $value;
		}
		$data['userRS'] = $tmpArr;
		$this->load->view('home/index',$data);
	}
	
	public function doing($p = 1){
		$Pagecount=$this->ticket_model->getStatistics(array('ticket_id'=>0,'status' => 2))-> result();
		$config['total_rows'] = $Pagecount[0]->count;
		$config['per_page'] = 20;
		$offset=$config['per_page'] * ($p-1);
		//var_dump($p);exit;
		$config['use_page_numbers'] = TRUE;
		$config['base_url']=site_url(array('home', 'doing'));
		$this->pagination->initialize($config);
		$data['data'] = $this->ticket_model->selectTickets(array('ticket_id' => 0, 'status' => 2), $config['per_page'], $offset, 'post_time', 'desc');
		$data['statusArr']=array('1'=>'未解决','2' => '进行中','3' => '已完成', '4' => '已关闭' , '5' => '已取消');
		$userRS= $this->user_model->selectUser()->result();
		$tmpArr=array();
		foreach($userRS as $value)
		{
			$tmpArr[$value->id] = $value;
		}
		$data['userRS'] = $tmpArr;
		$this->load->view('home/index',$data);
	}
	
	public function finish($p = 1){
		$Pagecount=$this->ticket_model->getStatistics(array('ticket_id'=>0,'status' => 3))-> result();
		$config['total_rows'] = $Pagecount[0]->count;
		$config['per_page'] = 20;
		$offset=$config['per_page'] * ($p-1);
		//var_dump($p);exit;
		$config['use_page_numbers'] = TRUE;
		$config['base_url']=site_url(array('home', 'finish'));
		$this->pagination->initialize($config);
		$data['data'] = $this->ticket_model->selectTickets(array('ticket_id' => 0, 'status' => 3), $config['per_page'], $offset, 'post_time', 'desc');
		$data['statusArr']=array('1'=>'未解决','2' => '进行中','3' => '已完成', '4' => '已关闭' , '5' => '已取消');
		$userRS= $this->user_model->selectUser()->result();
		$tmpArr=array();
		foreach($userRS as $value)
		{
			$tmpArr[$value->id] = $value;
		}
		$data['userRS'] = $tmpArr;
		$this->load->view('home/index',$data);
	}
	
	public function close($p = 1){
		$Pagecount=$this->ticket_model->getStatistics(array('ticket_id'=>0,'status' => 4))-> result();
		$config['total_rows'] = $Pagecount[0]->count;
		$config['per_page'] = 20;
		$offset=$config['per_page'] * ($p-1);
		//var_dump($p);exit;
		$config['use_page_numbers'] = TRUE;
		$config['base_url']=site_url(array('home', 'close'));
		$this->pagination->initialize($config);
		$data['data'] = $this->ticket_model->selectTickets(array('ticket_id' => 0, 'status' => 4), $config['per_page'], $offset, 'post_time', 'desc');
		$data['statusArr']=array('1'=>'未解决','2' => '进行中','3' => '已完成', '4' => '已关闭' , '5' => '已取消');
		$userRS= $this->user_model->selectUser()->result();
		$tmpArr=array();
		foreach($userRS as $value)
		{
			$tmpArr[$value->id] = $value;
		}
		$data['userRS'] = $tmpArr;
		$this->load->view('home/index',$data);
	}
	
	public function cancel($p = 1){
		$Pagecount=$this->ticket_model->getStatistics(array('ticket_id'=>0,'status' => 5))-> result();
		$config['total_rows'] = $Pagecount[0]->count;
		$config['per_page'] = 20;
		$offset=$config['per_page'] * ($p-1);
		//var_dump($p);exit;
		$config['use_page_numbers'] = TRUE;
		$config['base_url']=site_url(array('home', 'cancel'));
		$this->pagination->initialize($config);
		$data['data'] = $this->ticket_model->selectTickets(array('ticket_id' => 0, 'status' => 5), $config['per_page'], $offset, 'post_time', 'desc');
		$data['statusArr']=array('1'=>'未解决','2' => '进行中','3' => '已完成', '4' => '已关闭' , '5' => '已取消');
		$userRS= $this->user_model->selectUser()->result();
		$tmpArr = array();
		foreach($userRS as $value)
		{
			$tmpArr[$value->id] = $value;
		}
		$data['userRS'] = $tmpArr;
		$this->load->view('home/index',$data);
	}
}

