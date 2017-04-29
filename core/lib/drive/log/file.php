<?php
	namespace core\lib\drive\log;
	use core\lib\conf;
	// 日志
	/**
	* 日志文件
	*/
	class file
	{	
		// 日志存储位置
		public $path;

		public function __construct() {
			$conf = conf::get('option','log');
			$this->path = $conf['path'];
		}

		public function log($message,$file='log') {
			/**
			 * 1.确定文件是否存在
			 *   新建目录
			 * 2.写入日志
			 */
			if (!is_dir($this->path.date('YmdH'))) {
				mkdir($this->path.date('YmdH'),'0777',true);
			}
			return file_put_contents($this->path.date('YmdH').'/'.$file.'.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
		}
	}



?>