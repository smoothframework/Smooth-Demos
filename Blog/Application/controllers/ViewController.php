<?php 

	class ViewController extends Smooth\Controller 
	{

		private $post;

		public function __construct()
		{
			Smooth\Model::load('Posts');
			$this->post = new PostsModel;
		}

		public function p()
		{
			$id = Smooth\Libraries\Url::component(6);
			$data = ['content' => 'PostView', 'postContent' => $this->post->getOne(['id' => $id]), 
					'postComments' => $this->post->getComments(['postId' => $id])];
			$this->render('includes/template', compact('data'));
		}

	}