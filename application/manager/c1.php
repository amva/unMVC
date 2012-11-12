<?php

class C1 extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index($args=null)
	{
 		$this->render('c1', 'index');
	}
	

}