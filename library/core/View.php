<?php

class View 
{
	public $flayout = DEF_LAYOUT;
	
	public function __construct()
	{
	}
	
	public function display($view, $sub)
	{
		$this->renderedFile = $view . DS . $sub . '.phtml';
 		require DIR_LAYOUT . $this->flayout;
	}
	
	/**
	 * Assign loaded text objects 
	 * 
	 * @param XML Object $main
	 * @param XML Object $static
	 * @param XML Object $form
	 */
	public function setTexts(&$main, &$static, &$form=null)
	{
		$this->menu_items	= &$static;
		$this->texts 		= &$main;
		$this->form_txt 	= &$form;
	}
	
	/**
	 * @param array $key_val -array of name=>obj
	 */
	public function setTextsEx($key_val)
	{
		foreach ($key_val as $var_name => $var_obj )
			$this->{$var_name} = &$var_obj;
	}
	
	public function setLayoutFile($flayout)
	{
		if (file_exists(DIR_LAYOUT . $flayout))
			$this->flayout = $flayout;
	}
}
