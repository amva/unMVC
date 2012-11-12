<?php

// load content
class Content
{
	public static function loadContent($file)
	{
		$xml = simplexml_load_file($file, null, LIBXML_XINCLUDE);
		return $xml->children();
	}	
}