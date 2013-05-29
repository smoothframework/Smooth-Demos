<?php
	
	namespace Smooth\Database;

	class Connector
	{

		/**
		 * [connect description]
		 * @return [type] [description]
		 */
		public function __construct()
		{
			require APPPATH . 'config/database.php';
			extract($config);
			$dbDrivers = array('mysql', 'pgsql', 'sqlsrv', 'sqlite', 'mongodb');

			try
			{
				if( in_array( strtolower( $driver ), $dbDrivers) )
				{
					require_once SYSPATH . 'database/drivers/' . $driver . '.php';
					$driver::connect( $config );
				}
			}
			catch(\PDOException $e)
			{
				exit('PDO connection error ' . $e->getMessage());
			}
		}

		public static function getConnection()
		{
			require 'Application/config/database.php';
			extract($config);
			require_once SYSPATH . 'database/drivers/' . $driver . '.php';
			return $driver::connect($config);
		}

	}