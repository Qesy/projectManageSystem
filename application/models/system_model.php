<?php

class System_model extends CI_Model{
	
	private $_tblArr = array('pj_system');
	
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
}

