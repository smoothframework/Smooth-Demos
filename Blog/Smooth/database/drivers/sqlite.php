<?php

	use Smooth\Database\Connector;

	class Sqlite
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		
		public static function connect(array $config)
		{
			extract($config);
			try
			{
				$dsn = new PDO('sqlite:' . $sqlite['path']);
				$dsn->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);

			}
			catch(\PDOException $e)
			{
				exit('Error: ' . $e->getMessage());
			}

			return $dsn;
		}
		
	}