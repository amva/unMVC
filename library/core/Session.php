<?php

//make user sessoin later
class Session
{
	public static function start($init_lang)
	{
		if (!isset($_SESSION) )
 			session_start();
		if (!isset($_SESSION['lang']))
			$_SESSION['lang']  = $init_lang;
	}
	
	public static function getLanguage()
	{
		return $_SESSION['lang'];
	}
	
	public static function setLanguage($lang)
	{
		if (in_array($lang, $GLOBALS['gLangs']))
			$_SESSION['lang'] = $lang;
	}

	public static function firstVisit()
	{
		return !isset($_SESSION['visited']);
	}
	public static function setVisited()
	{
		$_SESSION['visited'] = 1;
	}
	
}