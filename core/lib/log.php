<?php
	namespace core\lib;
	use core\lib\conf;
	/**
	* 日志类
	*/
	class log {
		
		public static $class;

		/**
		 * 1.确定日志存储方式
		 * 2.写日志
		 */

		public static function init() {
			// 确定存储方式
			$drive = conf::get('drive','log');
			$class = '\core\lib\drive\log\\'.$drive;
			require_once('drive/log/file.php');
			self::$class = new $class;
		}

		public static function log($name,$file='log') {
			self::$class->log($name,$file);
		}
	}
?>