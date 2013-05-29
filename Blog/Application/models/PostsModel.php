<?php

	use Smooth\Libraries\Db;

	class PostsModel extends Smooth\Model
	{

		public function getAll()
		{
			return Db::fetch('posts');
		}

		public function getOne(array $params)
		{
			return Db::fetchWhere('posts', $params, 1);
		}

		public function getComments(array $params)
		{
			return Db::fetchWhere('comments', $params);
		}

	}