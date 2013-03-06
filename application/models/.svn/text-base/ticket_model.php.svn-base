<?php

class Ticket_model extends CI_Model{

	private $_tblArr = array('pj_ticket');
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function selectTickets($whereArr = array(), $limit = '', $offset = '', $orderField = 'id', $order = 'desc')
	{	
		    $this->db->order_by($orderField,$order);
			$query = $this->db->get_where($this->_tblArr[0],$whereArr,$limit,$offset);			
			return $query->result();									
	}
	
	
	function addTicket($arrValues = array())
	{		
			$query = $this->db->insert($this->_tblArr[0], $arrValues);
			return  $this->db->affected_rows();
	}
	
	function deleteTicket($arrWhere = array())
	{
			$query = $this->db->delete($this->_tblArr[0],$arrWhere);
			return $this->db->affected_rows();
	}
	
	function updateTicket($arrValues = array(),$arrWhere = array())
	{		
			$query = $this->db->update($this->_tblArr[0],$arrValues,$arrWhere);
			return $this->db->affected_rows();
	}
	
	function getStatistics($arrWhere = array())
	{
			$this->db->select('count(*) as count');
			$query = $this->db->get_where($this->_tblArr[0], $arrWhere);
			return $query;
	}
}

?>