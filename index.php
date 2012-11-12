<?php
/**
 * @author Arman Vardanian <armanvn@gmail.com>
 */

require_once 'config/paths.php';
require_once 'config/defs.php';

require_once DIR_CORE . 'Autoload.php';





/* Get it to work! */
$res = Application::getApp()->dispatch();

if ($res !== SUCCESS)
	;





