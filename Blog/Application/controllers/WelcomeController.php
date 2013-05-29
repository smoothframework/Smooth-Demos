<?php

	use Smooth\Libraries\Crypt;
	use Smooth\Libraries\Db;
	use Smooth\Libraries\MongoDBLib;
	use Smooth\Routing\Route;

	class WelcomeController extends Smooth\Controller
	{
		public function __construct()
		{
			Smooth\Model::load('Posts');
		}

		public function index()
		{
			$posts = new PostsModel;
			$data = ['content' => 'WelcomeSmoothView', 'blogName' => 'MyBlog', 
					'blogSlogan' => 'My cool blog slogan', 'blogPosts' => $posts->getAll()];
			$this->render('includes/template', compact('data'));
		}

	}