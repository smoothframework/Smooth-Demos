<?php
	
	return $config = array(

			'driver' => 'mysql',

			'charset' => 'utf8',

			'persistent' => true,

			'mysql' => array(
					
					'host' => 'localhost',
					'username' => 'root',
					'password' => 'ciprop1',
					'database' => 'blog',
					'db_col' => 'utf8_general_ci',
					'charset' => 'utf8',
					'prefix' => '',
					'port' => '',
					'fetchMode' => 'FETCH_ASSOC',
					'unix_socket' => ''

				),

			'sqlite' => array(
				
				'path' => ''
				
				),

			'pgsql' => array(

					'host' => 'localhost',
					'port' => '5432',
					'database' => 'test',
					'username' => 'postgres',
					'password' => ''

				),

			'mongodb' => array(

					'host' => 'localhost',
					'username' => 'root',
					'password' => '',
					'database' => 'test',
					'db_col' => 'utf8_general_ci',
					'charset' => 'utf8'

				),

			'sqlsrv' => array(
					'host' => 'localhost',
					'port' => '',
					'username' => '',
					'password' => '',
					'database' => 'test',
					'charset' => 'utf8'
				)

		);