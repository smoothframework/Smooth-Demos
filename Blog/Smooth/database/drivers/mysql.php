<?php

	use Smooth\Database\Connector;

	class Mysql
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			extract($config);
			$fetchModes = array('fetch_assoc', 'fetch_both', 'fetch_bound', 'fetch_class', 'fetch_into', 'fetch_lazy', 'fetch_num', 'fetch_obj');

			$dsn = "mysql:host=";

			if( isset( $mysql['host'] ) )
				$dsn .= $mysql['host'];
			else
				$dsn .= "localhost";

			if( isset( $mysql['port'] ) )
				$dsn .= ";port=" . $mysql['port'];

			if( isset( $mysql['unix_socket'] ) )
				$dsn .= ";unix_socket=" . $mysql['unix_socket'];

			$dsn .= ";dbname=";

			if( isset( $mysql['database'] ) )
				$dsn .= $mysql['database'];
			try
			{
				$connector = new PDO($dsn, $mysql['username'], $mysql['password'], array( PDO::ATTR_PERSISTENT => true ));
					
				if( isset( $config['charset'] ) )
					$connector->prepare("SET NAMES " . $config['charset'])->execute();
					$connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				if( in_array(strtolower($mysql['fetchMode']), $fetchModes) )
					$connector->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			}
			catch(\PDOException $e)
			{
				exit($e->getMessage());
			}
			return $connector;
		}

	}