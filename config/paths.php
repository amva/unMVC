<?php

namespace Config\Path;

define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(__FILE__)   . DS . '..' . DS);
define ('DIR_LIB', ROOT . 'library'. DS);
define ('DIR_CORE', DIR_LIB . 'core'. DS);
define ('DIR_APP', ROOT . 'application'. DS);
define ('DIR_CTL', DIR_APP . 'manager' . DS);
define ('DIR_MODEL', DIR_APP . 'model' . DS);
define ('DIR_VIEW', DIR_APP . 'html' . DS);
define ('DIR_LAYOUT', DIR_VIEW . '_layout'. DS);
define ('DIR_CONTENT', ROOT . 'content'. DS);
define ('DIR_CONTENT_MAIN', DIR_CONTENT . 'main'. DS);
define ('DIR_CONTENT_FORM', DIR_CONTENT . 'form'. DS);
define ('DIR_FORM', DIR_VIEW . '_forms'. DS);

define ('SCRIPT_EXT', '.php');

define ('DEF_CTL', 'index');
define ('DEF_ACT', 'index');
define ('DEF_CTLFILE', DIR_CTL .  DEF_CTL . SCRIPT_EXT);
define ('DEF_LAYOUT', 'default.phtml');

// change to your site address
define ('URL', 'http://localhost/wsGitHub/unMVC/');
