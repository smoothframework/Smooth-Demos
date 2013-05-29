<?php

	/**
	 * Smooth framework version 1.0.4 beta
	 * PHP framework based on PHP 5.3+
	 * Smooth is under MIT License
	 * @package Smooth
	 * @author Konstantin Rachev <konstantin.rachev.web@gmail.com>
	 * @link http://smoothphp.com
	 * @license http://opensource.org/licenses/MIT
	*/

	/**
	 * PHP version checker
	 * -------------------
	 * In order to run Smooth with all its features enabled we should check the 
	 * PHP version installed on your system.
	 * You need version greater than 5.3.0 to run our product. 
	 * Check latest version on http://php.net
	 */
	if (phpversion() < '5.3.0') {
		exit('Please update your PHP version with the latest on php.net');
	}

	$publicPath = 'Public';

	/**
	 * System path configuration
	 * -------------------------
	 * This one sets the proper directory of the Smooth's system files.
	 */
	
	$systemPath = 'Smooth';
	
	/**
	 * Application path configuration
	 * -------------------------
	 * This one sets the proper directory of the Smooth's application files.
	 * @var string $system_path
	 */
	
	$appPath = 'Application';

	/**
	 * Settings the REQUEST_URI server variable
	 * ---------------------------------------- 
	 */
	if (!isset($_SERVER['REQUEST_URI'])) {
		$_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 1);
		if (isset( $_SERVER['QUERY_STRING'] )) { 
			$_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING']; 
		}
	}

	/**
	 * Defining the Smooth variables
	 * -----------------------------
	 */

	define('BASEPATH', dirname(realpath(__FILE__)) . '/');

	/**
	 * Determing that the $systemPath is a real directory
	 * @var string $systemPath
	 */
	
	$systemPathSlash = str_replace('\\', '/', BASEPATH . $systemPath . '/');

	if (is_dir($systemPathSlash)) {
		if (realpath($systemPathSlash) !== false) {
			define('SYSPATH', $systemPathSlash);
		}
	} else {
		if (!is_dir($systemPathSlash)) {
			exit('The ' . $systemPathSlash . ' is not a valid directory');
		}
	}

	/**
	 * Determing that the $appPath is a real directory
	 * @var string $appPath
	 */	

	$appPathSlash = str_replace('\\', '/', BASEPATH . $appPath . '/');

	if (is_dir($appPathSlash)) {
		if (realpath($appPathSlash) !== false) {
			define('APPPATH', $appPathSlash);
		}
	} else {
		if (!is_dir($appPathSlash)) {
			exit('The ' . $appPathSlash . ' is not a valid directory');
		}
	}

	/**
	 * Loading our main kernel file
	 * ----------------------------
	 */
	require_once SYSPATH . '/core/Core.php';
	use Smooth\Core\Smooth;

	/**
	 * Initializing the configuration and running the Smooth framework
	 * ----------------------------
	 */
	$smooth = new Smooth();
	$smooth->run();