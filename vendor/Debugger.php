<?php

namespace Vendor;

class Debugger
{
	public static $instance;

	private $_message = [];
	private $_messageJs = [];
	private $_nameLog;
	private $_path;
	private $_debugger;

	private function __construct() {
		$this->_debugger = env('APP_DEBUG',false);
		$this->_path = base_path('storage/logs');
		$this->_nameLog = date('d-m-Y').'.log';
		self::$instance = $this;
		register_shutdown_function(function() {
			$debug = Debugger::getInstance();
			$debug->writeLog();
		});
	}

	public static function getInstance() {
		if (!self::$instance instanceof self)
			self::$instance = new self;

		return self::$instance;
	}

	public function setLogName($name) {
		$this->_nameLog = $name;
	}

	public function setLogPath($path) {
		$this->_path = $path;
	}

	public function debug($namespace,$object,$options=[]) {
		$debug = date('d-m-y H:i:s').' - ['.$namespace.']';

		if (!isset($options['use']))
			$options['use'] = 'file';

		if (!isset($options['print']))
			$options['print'] = 'json';

		if ($options['use'] != 'console') {
			switch($options['print']) {
				case 'json':
					$debug .= json_encode($object);
					break;
				case 'print':
					$debug .= print_r($object,true);
					break;
			}

			switch($options['use']) {
				case 'file':
					array_push($this->_message,$debug);
					break;
				case 'log':
					error_log($debug);
					break;
			}
		}else {
			array_push($this->_messageJs,['debug'=>$debug,'object'=>$this->fixObject($object)]);
		}
 	}

 	public function getConsoleMssg() {
 		return '<script>window.onload = function() { var mssg=JSON.parse(\''.json_encode($this->_messageJs).'\'); for(i=0;i<mssg.length; i++) {console.log(mssg[i].debug,mssg[i].object)}}</script>';
 	}

 	public function writeLog() {
 		if (!file_exists($this->_path))
			mkdir($this->_path,0755);

 		if (count($this->_message) > 0)
 			file_put_contents($this->_path.'/'.$this->_nameLog, implode(PHP_EOL,$this->_message), FILE_APPEND);
 	}

 	private function fixObject($object) {
 		$newObject = array();

 		foreach($object as $item) {
 			if (!is_array($item)) {
 				array_push($newObject,addslashes($item));
 			}else
 				array_push($newObject,$this->fixObject($item));
 		}

 		return $newObject;
 	}
}