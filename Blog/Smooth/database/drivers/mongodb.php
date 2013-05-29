<?php

	use Smooth\Database\Connector;

	class MongoDB
	{

		/**
		 * [connect description]
		 * @param  array  $config [description]
		 * @return [type]         [description]
		 */
		public static function connect(array $config)
		{
			extract($config);
			$username = $mongodb['username'];
			$password = $mongodb['password'];
			$host = $mongodb['host'];
			$database = $mongodb['database'];

			try
			{
				$connection = new MongoClient("moongodb://${username}:${password}@${host}/${database}");
			}
			catch(MongoCursorException $e)
			{
				exit('An error occured during connection: ' . $e->getMessage());
			}

			return $connection;
		}

	}