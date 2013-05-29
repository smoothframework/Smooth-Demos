<?php

	use Smooth\Database\Connector;

	class Pgsql
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			extract($config);
			$dsn = "pgsql:host=";

			if( isset( $pgsql['host'] ) )
				$dsn .= $pgsql['host'];
			else
				$dsn .= "localhost";

			if( isset( $pgsql['port'] ) )
				$dsn .= ";port=" . $pgsql['port'];

			$dsn .= ";dbname=";

			if( isset( $pgsql['database'] ) )
				$dsn .= $pgsql['database'];

			$dsn .= ";user=";

			if( isset( $pgsql['username'] ) )
				$dsn .= $pgsql['username'];

			$dsn .= ";password=";

			if( isset( $pgsql['password'] ) )
				$dsn .= $pgsql['password'];

			try
			{
				$connector = new PDO($dsn);
			}
			catch(\PDOException $e)
			{
				exit($e->getMessage());
			}

			if( isset( $config['charset'] ) )
				$connector->prepare("SET NAMES " . $config['charset'])->execute();
				$connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $connector;
		}

	}