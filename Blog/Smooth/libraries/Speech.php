<?php
		
	namespace Smooth\Libraries;

	class Speech
	{

		/**
		 * [$text description]
		 * @var string
		 */
		private $text;

		/**
		 * [$language description]
		 * @var string
		 */
		private $language;

		/**
		 * [$fileName description]
		 * @var string
		 */
		private $fileName;

		/**
		 * [$playFile description]
		 * @var string
		 */
		private $playFile;

		/**
		 * [$filePath description]
		 * @var string
		 */
		private $filePath;

		/**
		 * [$ext description]
		 * @var string
		 */
		private $ext;

		/**
		 * [$save description]
		 * @var string
		 */
		private $save;

		/**
		 * [$saveFile description]
		 * @var string
		 */
		private $saveFile;

		/**
		 * [__construct description]
		 * @param [type]  $path [description]
		 * @param integer $save [description]
		 * @param [type]  $ext  [description]
		 */
		public function __construct($path = null, $save = 1, $ext = null)
		{
			if( $path === null )
				$this->filePath = BASEPATH . 'Public/audio/';
			else
				$this->filePath = $path;

			$this->saveFile = $save;
		}

		/**
		 * [textToSpeech description]
		 * @param  [type] $text     [description]
		 * @param  [type] $language [description]
		 * @return [type]           [description]
		 */
		public function textToSpeech($text = null, $language = null)
		{
			$this->language = $language;

			$this->textPrepare( $text );

			$this->createFileName();

			$this->setPlayFile();			

			$this->saveSpeech();

			return $this->play();

		}

		/**
		 * [speechToText description]
		 * @return [type] [description]
		 */
		public function speechToText()
		{
			
		}

		/**
		 * [getFileName description]
		 * @return [type] [description]
		 */
		public function getFileName()
		{
			return $this->fileName;
		}

		/**
		 * [play description]
		 * @return [type] [description]
		 */
		public function play()
		{
			return '<audio src="' . $this->playFile . '" autobuffer="true" controls="true" autoplay><source src="' . $this->playFile . '"  type="audio/mp3" />Your browser do not support HTML5 audio.</audio>';
		}

		/**
		 * [setPlayFile description]
		 */
		public function setPlayFile()
		{
			$this->playFile = WEBPATH . 'Public/audio/' . $this->getFileName() . '.mp3';
		}

		/**
		 * [textPrepare description]
		 * @param  [type] $text [description]
		 * @return [type]       [description]
		 */
		public function textPrepare($text)
		{

			if( is_string( $text ) )
			{
				$preparedText = substr($text, 0, 100);
				$this->text = urlencode($preparedText);
			}
			else
			{
				throw new \Exception("The text is not of string type", 1);
			}
		
		}

		/**
		 * [createFileName description]
		 * @return [type] [description]
		 */
		public function createFileName()
		{
			$this->fileName = md5( $this->text . time() );
		}

		/**
		 * [getFilePath description]
		 * @return [type] [description]
		 */
		public function getFilePath()
		{
			return $this->filePath . $this->getFileName() . '.mp3';
		}

		/**
		 * [saveSpeech description]
		 * @return [type] [description]
		 */
		public function saveSpeech()
		{
			if( $this->saveFile === 1 )
			{
				if( ! file_exists( $this->getFilePath() ) )
				{
					$audioFile = file_get_contents('http://translate.google.com/translate_tts?tl=' . $this->language . '&q=' . $this->text);
					file_put_contents($this->getFilePath(), $audioFile);
				}
			}
		}

		/**
		 * [cleanSpeech description]
		 * @return [type] [description]
		 */
		public function cleanSpeech()
		{
			$allFiles = glob($this->filePath . '*');

			foreach ($allFiles as $file) 
			{
				if( is_file( $file ) )
				{
					unlink( $file );
				}
			}
		}

	}