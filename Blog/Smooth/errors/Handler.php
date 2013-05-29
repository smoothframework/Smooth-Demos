<?php

	namespace Smooth\Errors;

	use Smooth\Controller;

	class Handler
	{

		public static function handler($errorMessage, $errorCode = null, $errorFile = null, $errorLine = null)
		{

			if( $errorCode == null )
				$errorCode = "203";

			if( $errorFile == null )
				$errorFile = "Undefined file";

			if( $errorLine == null )
				$errorLine = "Undefined line";

			$data = array(

					'errorMessage' => $errorMessage,
					'errorCode' => $errorCode,
					'errorFile' => $errorFile,
					'errorLine' => $errorLine,
					'content' => 'ErrorView'

				);

			Controller::render('includes/template', compact('data'));
			exit();
		}

	}