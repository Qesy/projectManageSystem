<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Common{
	
	private $_jsPath;
	private $_cssPath;
	
	function __construct(){
	 	$this->CI =& get_instance();
		$this->_cssPath = $this->CI->config->base_url().'static/css/';
		$this->_jsPath = $this->CI->config->base_url().'static/js/';
		
	}
	 
	public function load_js($str){
		if(is_array($str)){
			foreach($str as $key=>$val){
				echo '<script src="'.$this->_jsPath.$val.'.js?v='.V.'" type="text/javascript" charset="utf-8"></script>';echo "\n";
			}
		}else{
			echo '<script src="'.$this->_jsPath.$str.'.js?v='.V.'" type="text/javascript" charset="utf-8"></script>';echo "\n";
		}
	}
	
	public function load_css($str){
		if(is_array($str)){
			foreach($str as $key=>$val){
				echo '<link href="'.$this->_cssPath.$val.'.css?v='.V.'" rel="stylesheet" type="text/css" />';echo "\n";
			}
		}else{
			echo '<link href="'.$this->_cssPath.$str.'.css?v='.V.'" rel="stylesheet" type="text/css" />';echo "\n";
		}
	}

	public function set_index($arr, $key){
		$tempArr = array();
		foreach ($arr as $key => $value) {
			$tempArr[$value->$key] = $value;
		}
		return $tempArr;
	}
}