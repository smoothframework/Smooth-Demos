<?php

	namespace Smooth\Routing;

	class Route
	{

		public static function get($url, $action)
		{
			$path = explode('/', $url);
			echo $_SERVER['REQUEST_URI'];

			$count = substr_count($url, '/');

			$route = array_diff($path, explode('/', URL));

			print_r($route);

			$newRoute = '/'. implode('/', $route);

			echo "<br>";
			var_dump($action);
			echo "<br>";
			print_r($action);
			echo "<br>";

			$a = func_get_args($action);

			print_r($a);

			if( $url === $newRoute )
			{
				if( func_num_args($action) >= 1 )
				{
					call_user_func($action, $path[3]);
				}
				else
				{
					call_user_func($action);
				}
			}
		}

	}