<?php 

// weak impl


// Let's autoload class includes from (core) library dir
spl_autoload_register(function($class) {
	
	if (file_exists(DIR_CORE . $class . '.php')) { 
		require_once DIR_CORE . $class . '.php';
	}
	else if (file_exists(DIR_LIB . $class . '.php')) {
		require_once DIR_LIB . $class . '.php';
	}
	
});
