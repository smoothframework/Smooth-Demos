<?php

	namespace Smooth\Routing;

	class Routes
	{

		public $response = array();

		static $routes;

		public function __construct()
		{
			$this->configure();
		}

		public function setCustomRoutes($params = array())
		{
			foreach ($params as $key => $value) 
			{
				if( strpos($key, '/') !== false )
				{
					$parts = explode('/', $key);
					$controller = $parts[0];
					$method = $parts[1];
				}
				else
				{
					$controller = $key;
					$method = 'index';
				}
				// $this->response[$key] = $value;
				$this->response = array('controller' => $controller, 'method' => $method, 'redirect' => $value);
				self::$routes = $this->response;
			}
		}

		public static function getRoutes()
		{
			return self::$routes;
		}

		public function configure()
		{
			require APPPATH . 'config/routes.php';
			extract($config);

			$this->setCustomRoutes($redirect);

			$controllerPath = APPPATH . 'controllers/' . ucfirst( $baseController ) . 'Controller.php';
			
			if( file_exists( $controllerPath ) )
			{
				if ( is_readable( $controllerPath ) )
				{
					define('BASECONTROLLER', ucfirst( $baseController ));
				}
				else
				{
					throw new \Exception("Error Processing Request", 1);
				}
			} 
			else
			{
				throw new \Exception("Error Processing Request", 1);
			}

			$notFound = APPPATH . 'views/' . $missingView . '.php';

			if( file_exists( $notFound ) )
			{
				if( is_readable( $notFound ) )
				{
					define('NOTFOUND', $missingView);
				}
				else
				{
					throw new \Exception("Error Processing Request", 1);
				}
			}
			else
			{
				throw new \Exception("Error Processing Request", 1);
			}
		}

	}