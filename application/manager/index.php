<?php

class Index extends Controller
{
	public function __construct()
	{
		$this->_actions = array('index','test');
		parent::__construct();
	}
	
	public function index($args=null)
	{
 		$this->render('index', 'index');
	}
	

	/**
	 * Could be put in base controller class
	 * as an alternative to direct calls
	 * 
	 * @param string $method
	 * @param mixed $args
	 */
	public function __call($method, $args) 
	{
		if (isset($this->_actions[$action]))
			return $this->render('index', $method);
		// handle invalid action call
	}
	
}