<?php 
	
	/**
	 * Defining the namespace
	 */
	namespace Smooth;

	/**
	 * Using the already created namespaces
	 */
	use Smooth\Libraries\Session;
	use Smooth\Database\Connector;
	use Smooth\Config\Security;
	use Smooth\Config\App;
	use Smooth\Errors\Errors;
	use Smooth\Loader\Loader;
	use Smooth\Routing\Routes;

	require_once SYSPATH . 'database/Connector.php';
	require_once SYSPATH . 'action/Controller.php';
	require_once SYSPATH . 'action/Model.php';
	require_once SYSPATH . 'core/Router.php';
	require_once SYSPATH . 'core/Smooth.php';
	require_once SYSPATH . 'loader/Loader.php';
	require_once SYSPATH . 'errors/Handler.php';
	require_once SYSPATH . 'errors/Errors.php';
	require_once SYSPATH . 'config/Config.php';
	require_once SYSPATH . 'config/App.php';
	require_once SYSPATH . 'routing/Dispatcher.php';
	require_once SYSPATH . 'rest/Request.php';
	require_once SYSPATH . 'rest/Response.php';
	require_once SYSPATH . 'kernel/Kernel.php';
	require_once SYSPATH . 'config/Security.php';

	require_once SYSPATH . 'routing/Routes.php';

	require APPPATH . 'config/routes.php';

	require_once SYSPATH . 'routing/Route.php';

	require SYSPATH . 'websockets/ElephantIO/Client.php';

	new App();
	new Loader();
	new Errors();
	new Routes();
	new Connector();
	new Session();
	new Security();