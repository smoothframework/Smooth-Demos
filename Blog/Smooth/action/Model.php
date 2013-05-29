<?php 

	namespace Smooth;

	class Model
	{
		public static function load($name)
		{
			$modelPath = APPPATH . 'models/' . ucfirst($name) . 'Model.php';
			
			if( file_exists($modelPath) )
				require_once $modelPath;
			else
				exit('I could not find the <b>' . $name . '</b> model at <b> ' . $modelPath . '</b>');

		}
	}