<?php
/**
 * Application class
 * main request entry point 
 * 
 * @author Arman Vardanian <armanvn@gmail.com>
 *
 */

class Application
{
	private static $_instance = null;
	private $_data = null;
	
	/**
	 * Private constructor to ensure singleton
	 */
	private function __construct() 
	{ 
 		Session::start(DEF_LANG);
		// temp shorthand
		class_alias('Application', 'App');
	}

	/**
	 * Create and/or get single class object
	 */
	public static function getApp()
	{
		if (!self::$_instance)
			self::$_instance = new Application;
		return self::$_instance;
	}
	
	/**
	 * Main function, bootstrap and run action
	 * @return integer -result from predefined constants
	 */
	public function dispatch()
	{
		// Developer Mode
// 		$ts = round(microtime(true) * 1000);

		$res = Bootstrap::init($this->_data);
		if ($res === SUCCESS) {
			if($this->_data['lang'])
				$this->setLanguage($this->_data['lang']);

			$this->_data['ctl']->{$this->_data['action']}($this->_data['params']);
		
		}
		
		// Developer Mode
// 		$tdiff = round(microtime(true) * 1000) - $ts;
// 		echo $tdiff . ' ms';
		
		return $res;
	}
	
	public function reset()
	{
		$this->_data = null;
	}
	
	public function getAction() 
	{
		return $this->_data['action'];
	}

	public function getCtl() 
	{
		return $this->_data['ctl'];
	}
	
	public function getCtlName()
	{
		return $this->_data['ctl_name'];
	}
	
	public function getParams() 
	{
		return $this->_data['params'];
	}
	
	public function getURL($addlang=false, $addparam=true)
	{	
		$url = URL . $this->_data['ctl_name'] . '/' . $this->_data['action'];
		if ($addparam)
			foreach ($this->_data['params'] as $param)
				$url .= '/' . $param;
		return $addlang ? $url . '/?lang=' . App::getLanguage() : $url;
	}	

	public function linkTo($relurl, $addlang=true)
	{	
		return $addlang ? URL . $relurl . '/?lang=' . App::getLanguage() : URL . $relurl;
	}
	
	public static function getLanguage()
	{
		return Session::getLanguage();
	}
	
	public static function setLanguage($lang)
	{
		Session::setLanguage($lang);
	}	
}

