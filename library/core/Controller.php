<?php

abstract class Controller 
{
	
	protected $_model= null;
	protected $_view = null;
	protected $_hasForm = false;
	protected $_loadedTexts = false;
	
	 
	
	public function __construct()
	{
		$this->_view = new View();
		$this->_view->site_title = SITE_TITLE;
	}

	public function render($view, $sub)
	{
		// if already loaded by a child controller skip text loading
		// loadTexts will automatically set preload property to true when called
		if (!$this->_loadedTexts)
			$this->loadTexts($view, $sub, $this->_hasForm);
		$this->_view->display($view, $sub);
	}
	
	public function initModel($model_name) 
	{
		require_once DIR_MODEL .  $model_name . '_model.php';
		$model_name = ucfirst($model_name) . '_Model';
		$this->_model = new $model_name; 
	}
	
	protected function loadTexts($view, $sub, $hasForm=false)
	{
		
		$this->_loadedTexts = true;
		
		require_once DIR_MODEL . 'text_model.php';
		$textModel = new Text_Model();
		
		$main_txt = $textModel->loadTexts($view, $sub);
		$navi_txt = $textModel->loadNaviTexts()->navi->items->item;

		
		$this->_view->setTexts($main_txt, $navi_txt, $form_txt);
	}
	
}