<?php

	namespace Smooth\Config;

	use Smooth\Errors\Handler;

	class App
	{

		/**
		 * [__construct description]
		 */
		public function __construct()
		{
			$this->configure();
		}

		/**
		 * [configure description]
		 * @param  array  $params [description]
		 * @return void
		 */
		public function configure()
		{
			require_once APPPATH . 'config/app.php';
			extract($config);

			/**
			 * Defining the base project url
			 * @var string $url Containing the base url in order to set a const
			 */
			define('URL', $url);

			/**
			 * Defining the web path of the project
			 * @var string $webPath Containting the web path string in order to set the const
			 */
			define('WEBPATH', ( isset( $_SERVER['HTTPS'] ) ? 'https://' : 'http://' ) . getenv('HTTP_HOST') . '/' . $webPath. '/');

			/**
			 * Setting the default timezone for the project
			 * @var string $timezone Containing the default
			 */
			date_default_timezone_set( $timezone );

			/**
			 * Setting the default charset encoding
			 * @var string $charset Containing the default charset
			 */
			mb_internal_encoding($charset);
			ini_set('default_charset', $charset);
		}

	}