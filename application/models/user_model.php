<?php

class User_model extends CI_Model{
	
	private $_tblArr = array('pj_user');
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function selectUser($whereArr = array(), $limit = 50, $offset = '')
	{
		$query = $this->db->get_where($this->_tblArr[0], $whereArr, $limit, $offset);
		return $query;
	}
	
	function selectUserIn($whereArr = array())
	{
		$this->db->where_in('id', $whereArr);
		$query=$this->db->get($this->_tblArr[0]);
		return $query;
	}
	
	function updateUser($dataArr = array(), $whereArr = array())
	{
		$this->db->update($this->_tblArr[0], $dataArr, $whereArr);
		return $this->db->affected_rows();
	}
	
	function insertUser($insertArr = array())
	{
		$this->db->insert($this->_tblArr[0], $insertArr);
		return $this->db->affected_rows();
	}
	
	function delUser($whereArr = array())
	{
		$this->db->delete($this->_tblArr[0], $whereArr); 
		return $this->db->affected_rows();
	}
	
	function getUserInfo($username, $password, $type = 0)
	{
		$condArr = empty($type) ? array('username' => $username, 'password' => $password) : array('email' => $username, 'password' => $password);
		$query=$this->user_model->selectUser($condArr);
		return $query->result();
	}
}

