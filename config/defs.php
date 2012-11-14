<?php

namespace Config\Def;

$gLangs = array ( 
	'en' => 1,
	'de' => 2 
);

define ('SITE_TITLE', 'A\'MVC');
define ('COPY', 'A.V Software &copy 2012');
define ('ADMIN_EMAIL', 'armanvn@gmail.com');

// Predefined
define ('LANG_EN', $gLangs['en']);
define ('LANG_DE', $gLangs['de']);
define ('DEF_LANG', LANG_EN);

// Error specific
define ('SUCCESS', 1);
define ('ERR_APP', -1);
define ('ERR_NOFILE', -2);
define ('ERR_NOMETHOD', -3);

// temp here
define ('MSG_NOTFOUND', 'Requested page not found');