<?php

class Regional 
{
	protected static function getLocation()
	{
		require DIR_LIB . 'external' . DS . 'geo' . DS . 'geoipcity.inc';
		require DIR_LIB . 'external' . DS . 'geo' . DS . 'geoipregionvars.php';

		$gi = geoip_open(DIR_LIB . 'external' . DS . 'geo' . DS . 'GeoLiteCity.dat', GEOIP_STANDARD);
		$record = geoip_record_by_addr($gi, Regional::getIP());
		$cc = $record ? $record->country_code : '';
		geoip_close($gi);
		return $cc;
	}
	
	protected static function getIP()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
			return $_SERVER['HTTP_CLIENT_IP'];
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			return $_SERVER['REMOTE_ADDR'];
	}

	/**
	 * helpers, determining if english or german speaking
	 * @return bool
	 */
	public static function toLanguage()
	{
		switch (self::getLocation()) {
			case 'DE':
				return LANG_DE;
			case 'EN':
				return LANG_EN;
			default:
				return DEF_LANG;
		}
		
	}

}
