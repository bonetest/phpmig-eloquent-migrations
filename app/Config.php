<?php 

class Config {

	private static $config = array();

	private function __construct(){}

	public static function load($path = null){
		$path = ($path) ?: BASE_PATH . '/config/*';
		foreach (glob($path) as $file) {
			$config = include $file;
			self::$config = array_merge(self::$config, $config);
		}
	}

	public static function get($key,$default = null){
		$result = self::$config;
		foreach (explode('.' , $key) as $segment) {
			if(isset($result[$segment]))
				$result = $result[$segment];
			else 
				$result = $default;  
		}
		return $result;
	}

}