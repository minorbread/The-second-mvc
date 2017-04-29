<?php
	namespace core\lib;
	use core\lib\conf;
	/**
	* 路由类
	*/
	class route {
		
		// private $ctrl;
		// private $action;

		public $ctrl;
		public $action;

		function __construct() {

			/**
			 * 1.隐藏index.php
			 * 2.获取URL 参数部分
			 * 3.返回对于的控制器和方法
			 */
			if($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI']!='/') {
				// /index/index
				$path = $_SERVER['REQUEST_URI'];
				$patharr = explode('/',trim($path,'/'));
				// 由于未使用服务器因此数组取下标1,2值
				if (isset($patharr[1])) {
					$this->ctrl = $patharr[1];
				}
				unset($patharr[0]);
				unset($patharr[1]);
				if (isset($patharr[2])) {
					$this->action = $patharr[2];
					unset($patharr[2]);
				} else {
					$this->action = conf::get('action','route');
				}

				// url多于部分转化成 GET
				// index/index /id/1
				$count = count($patharr) + 2;
				$i = 3;
				while ($i < $count) {
					if (isset($patharr[$i + 1])) {
						$_GET[$patharr[$i]] = $patharr[$i + 1];
					}
					$i = $i + 2;
				}
				// p($_GET);

			} else {
				$this->ctrl = conf::get('ctrl','route');;
				$this->action = conf::get('ctrl','route');;
			}
		}
	}
?>