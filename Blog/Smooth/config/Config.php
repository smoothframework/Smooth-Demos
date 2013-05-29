<?php

	namespace Smooth\Config;

	use Smooth\Routing\Dispatcher;
	use Smooth\Config\App;
	use Smooth\Errors\Errors;
	use Smooth\Loader\Loader;
	use Smooth\Routing\Routes;

	class Config
	{

		public function __construct()
		{
			new App();
			new Loader();
			new Errors();
			new Routes();
		}
		
	}