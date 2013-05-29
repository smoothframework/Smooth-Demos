<?php
	
	use Smooth\Database\Connector;
	use Smooth\Libraries\Db;

	require_once 'Phactory/lib/Phactory.php';

	class DatabaseTest extends PHPUnit_Framework_TestCase
	{

		public static function setUpBeforeClass()
		{
			$pdo = Connector::getConnection();
			Phactory::setConnection($pdo);

			$pdo->exec("CREATE TABLE  IF NOT EXISTS `users`( id INTEGER PRIMARY KEY, name TEXT, age INTEGER )");

			Phactory::reset();
			Phactory::define('user', array('name' => 'Test User $n', 'age' => 18));
		}

		public static function tearDownAfterClass()
		{
			Phactory::reset();
 
     		Phactory::getConnection()->exec("TRUNCATE TABLE `users`");
		}

		public function testAddingTableRows()
		{
			$users = array();
			for ($i=0; $i < 20; $i++)
			{
				$users[] = Phactory::create('user', array('age' => $i));
			}
		}

		public function testGetDatabaseInformation()
		{
			$value = array();
			$response = Db::fetchWhere('users', array('age' => '18'));
			foreach ($response as $key => $value) 
			{
				$value = array($key => $value);
				foreach ($value as $k => $v) 
				{
					$this->assertStringMatchesFormat('%i', $v['age']);
				}
			}
		}

	}