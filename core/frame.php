<?php 
	namespace core;

	class Frame {

		public static $classMap = array();

		public $assign;

		public static function run() {
			\core\lib\log::init();
			\core\lib\log::log($_SERVER,'server');
			$route = new \core\lib\route();
			$ctrlClass = $route->ctrl;
			$action = $route->action;
			$ctrlfile = APP.'\\ctrl\\'.$ctrlClass.'Ctrl.php';
			if (is_file($ctrlfile)) {
				include $ctrlfile;
				$mod = MODULE.'\\ctrl\\'.$ctrlClass.'ctrl';
				$ctrl = new $mod();
				$ctrl->$action();
				\core\lib\log::log('ctrl:'.$ctrlClass.'     '.'action:'.$action);
			} else {
				echo "未选择控制器";
				// throw new Exception('找不到控制器'.$ctrlClass);
			}
		}

		public static function load($class) {
			// 自动加载类库
			// enw \core\route();
			// $class = '\core\route';
			// IMOOC.'/core/route.php';
			if (isset($classMap[$class])) {
				echo "isset";
				return true;
			} else {
				// $class = str_replace('\\', '/', $class);
				$file = CORE.'\\lib\\'.$class.'.php';
				// var_dump($file);
				if (is_file($file)) {
					include $file;
					self::$classMap[$class] = $class;
				} else {
					return false;
				}
			}
		}

		public function assign($name,$value) {
			$this->assign[$name] = $value;
		}

		public function display($file) {
			$file = APP.'\\views\\'.$file;
			if (is_file($file)) {
				extract($this->assign);
				// var_dump($this->assign);
				include $file;
			} else {
				echo "string";
			}
		}


	}

?>






























































































































