<?php

class Text_Model extends Model
{
// 	private $_xml = null;
// 	private $_xml = null;
	
	public function __construct()
	{
	
	}
	
	public function loadTexts($view, $sub)
	{
		/**
		 * model must know how to map requiest view/sub
		 * to appropriate physical path and pass it to Content
		 */
		$dir_lang = App::getApp()->getLanguage() == LANG_EN
							? 'en' . DS : 'de' . DS;
		$file = DIR_CONTENT . $dir_lang . $view . DS . $sub . '.xml';
		if (!file_exists($file)) {
			//handle error
			return false;
		}
		
		return Content::loadContent($file);
	}
	
	public function loadNaviTexts()
	{
		
		$dir_lang = App::getApp()->getLanguage() == LANG_EN 
							? 'en/' : 'de/';
		$file = DIR_CONTENT . $dir_lang . 'navi.xml';
		if (!file_exists($file)) {
			//handle error
			return false;
		}
		
		return Content::loadContent($file);
	}	
	
}