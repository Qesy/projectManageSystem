<?php
class Workgroup_model extends CI_Model{
	
	private $_tblArr = array('pj_workgroup');
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function select($whereArry = array(), $limit = 10, $offset = '')
	{
		$query = $this->db->get_where($this -> _tblArr[0], $whereArry, $limit, $offset);
		return $query;
	}
	
	function delete($whereArr = array())
	{
		$this->db->delete($this->_tblArr[0], $whereArr); 
		return $this->db->affected_rows();
	}
}