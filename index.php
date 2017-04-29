<?php
	
	/**
	 * 入口文件
	 * 1.定义常量
	 * 2.加载数据库
	 * 3.启动框架
	 */
	define('FRAME', realpath('.'));
	define('CORE', FRAME.'\core');
	define('LIB', CORE.'\lib');
	define('MODULE', '\app');
	define('APP', FRAME.'\app');
	define('DEBUG', true);
	if (DEBUG) {
		ini_set('display_error','On');
	} else {
		ini_set('display_error','Off');
	}

	include CORE.'\common\function.php';
	include CORE.'\frame.php';
	spl_autoload_register('\core\Frame::load');
	\core\Frame::load('route');
	\core\Frame::load('model');
	\core\Frame::load('conf');
	\core\Frame::load('log');
	\core\Frame::run();
	// p(FRAME);
?>