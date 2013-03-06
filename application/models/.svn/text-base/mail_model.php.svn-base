<?php

class Mail_model extends CI_Model{
	
	private $_tblArr = array('pj_mail');
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function select(){
		$query = $this->db->get_where($this->_tblArr[0], array('id' => 1));
		return $query->result();
	}
	
	function update($dataArr = array()){
		return $this->db->update($this->_tblArr[0], $dataArr, array('id' => 1));
	}

	function send($to, $subject, $message){
		$this->load->library('email');
		$rs = self::select(array('id' => 1));
		$this->email->smtp_host = $rs[0]->smtp_host;
		$this->email->smtp_user = $rs[0]->smtp_user;
		$this->email->smtp_pass = $rs[0]->smtp_pass;
		$this->email->smtp_port = $rs[0]->smtp_port;
		$this->email->from($rs[0]->smtp_user, $this->siteInfoArr->project_name);
		$this->email->to($to); 
		$this->email->subject($subject);
		$this->email->message($message); 
		$this->email->send();
	}
}

