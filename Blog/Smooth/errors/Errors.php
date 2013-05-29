<?php
	
	namespace Smooth\Errors;

	class Errors
	{
		public function __construct()
		{
			$this->configure();
		}

		public function configure()
		{
			require APPPATH . 'config/errors.php';
			extract($config);

			define('ENVIRONMENT', $environment);

			if( defined('ENVIRONMENT') )
			{
				switch (ENVIRONMENT) 
				{
					case 'development':
						ini_set('log_errors', 1);
						ini_set('display_errors', 1);
						error_reporting(E_ALL | E_STRICT);
						break;
					case 'test':
						ini_set('log_errors', 0);
						ini_set('display_errors', 1);
						error_reporting(E_ALL);
						break;
					case 'usage':
						ini_set('log_errors', 0);
						ini_set('display_errors', 0);
						error_reporting(0);
						break;
				}
			}

		}
	}