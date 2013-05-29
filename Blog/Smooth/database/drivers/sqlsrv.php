<?php

	use Smooth\Database\Connector;

	class Sqlsrv
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			extract($config);
			$dsn = "sqlsrv:Server=";

			if( isset( $sqlsrv['host'] ) )
				$dsn .= $sqlsrv['host'];
			else
				$dsn .= "localhost";

			if( isset( $sqlsrv['port'] ) )
				$dsn .= "," . $sqlsrv['port'];

			$dsn .= ";Database=";

			if( isset( $sqlsrv['database'] ) )
				$dsn .= $sqlsrv['database'];
			try
			{
				$connector = new PDO($dsn, $sqlsrv['username'], $sqlsrv['password']);
				$connector->exec("CREATE TABLE IF NOT EXISTS `test` (
				`id` INT AUTO_INCREMENT NOT NULL,
				`name` varchar(200) NOT NULL,
				`email` varchar(200),
				PRIMARY KEY (`id`)) 
				CHARACTER SET utf8 COLLATE utf8_general_ci");
				$connector->exec("INSERT INTO test (name, email) VALUES ('Gerry', 'gerry@koko.koko')");
			}
			catch(\PDOException $e)
			{
				exit($e->getMessage());
			}

			if( isset( $sqlsrv['charset'] ) )
				$connector->prepare("SET NAMES " . $sqlsrv['charset'])->execute();
				$connector->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $connector;
		}

	}