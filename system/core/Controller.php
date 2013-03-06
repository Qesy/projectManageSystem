<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;
	public $imgPath;
	public $siteInfoArr;
	public $userId;
	public $userName;
	public $workgroup;
	public $email;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		$this->imgPath = $this->config->base_url().'static/img/';
		$this->load->model('system_model');
		$siteInfo = $this->system_model->select(array('id' => 1));
		$this->siteInfoArr = $siteInfo[0];
		
		log_message('debug', "Controller Class Initialized");
	}

	public static function &get_instance()
	{
		return self::$instance;
	}

	public function isAdmin(){
		$rs = $this->session->all_userdata();
		if($rs['workgroup'] == 2){
			$this->userId 		= $rs['userid'];
			$this->userName 	= $rs['username'];
			$this->email 		= $rs['email'];
			$this->workgroup 	= $rs['workgroup'];
			return;
		}
		exec_script('window.location.href="'.site_url(array('welcome', 'login')).'";');exit;
	}

	public function isUser(){
		$rs = $this->session->all_userdata();
		if(!empty($rs['workgroup'])){
			$this->userId 		= $rs['userid'];
			$this->userName 	= $rs['username'];
			$this->email 		= $rs['email'];
			$this->workgroup 	= $rs['workgroup'];
			return;
		}
		exec_script('window.location.href="'.site_url(array('welcome', 'login')).'";');exit;
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */