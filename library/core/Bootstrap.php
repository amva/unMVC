<?php
/**
 * Bootstrap class
 * Handle request and init app
 *
 * @author Arman Vardanian <armanvn@gmail.com>
 *
 */

class Bootstrap 
{
	
	public static function init(&$data)
	{
		if (Session::firstVisit()) {
			Session::setLanguage(Regional::toLanguage());
			Session::setVisited();
		}
		
		// Get request url
		$url = isset($_GET['act']) ? trim($_GET['act']) : '';
		$url = explode('/', rtrim($url, '/'));
		$lang = null; 
		
		if (empty($url)) {
			$ctl = DEF_CTL;
			$data = array(
					'ctl' => new $ctl,
					'ctl_name'=> DEF_CTL,
					'action'  => DEF_ACT,
					'params' => array(),
					'lang' => null,
			);
			return SUCCESS;
		}
		
		
		// validate for case sensitive FS
		$url[0] = strtolower($url[0]);
		
		
		if (isset($_GET['lang'])) {
			$lang = trim($_GET['lang']);
		}
		
		if (!file_exists(DIR_CTL . $url[0].'.php'))
			header('Location: ' . URL . DEF_CTL);

		require_once DIR_CTL . $url[0] . '.php';
		$ctl = new $url[0];
		
		
		$action = isset($url[1]) ? $url[1] : DEF_ACT;
		if (!method_exists($ctl, $action) )
			header('Location: ' . URL . $url[0] . '/' . DEF_ACT);
				
		
		$params = array();
		if (isset($url[2]))
			$params = array_slice($url, 2);

		$data = array('ctl' => &$ctl, 'ctl_name' => $url[0], 
				'action' => $action, 'params' => $params, 'lang' => $lang);
		
		return SUCCESS;
	}
	
}