<?php

	namespace Smooth\Libraries;

	use Smooth\Database\Connector;

	class MongoDBLib
	{

		/**
		 * [insert description]
		 * @param  [type] $databaseName   [description]
		 * @param  [type] $collectionName [description]
		 * @param  array  $params         [description]
		 * @return [type]                 [description]
		 */
		public static function insert($databaseName, $collectionName, array $params)
		{
			$connection = Connector::getConnection();
			$database = $connection->databaseName;
			$collection = $db->collectionName;

			try
			{
				$collection->insert($params);
			}
			catch(MongoCursorException $e)
			{
				exit('The following error occured: ' . $e->getMessage());
			}
		}

	}