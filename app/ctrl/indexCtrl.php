<?php
	namespace app\ctrl;
	/**
	* 主页控制器
	*/
/*	class indexCtrl {

		public function index() {
			p('it is ind');
			$model = new \core\lib\model();
			$sql = "SELECT * FROM comments";
			$mes = $model->query($sql);
			p($mes->fetchAll());
		}
	}*/

	/**
	* index控制器二
	*/
	class indexCtrl extends \core\Frame
	{
		
		public function index() {
			// $temp = \core\lib\conf::get('ctrl','route');
			// $temp = \core\lib\conf::get('action','route');
			$temp = new \core\lib\model();
			$title = "This is title";
			$data = "This is data";
			$this->assign('title',$title);
			$this->assign('data',$data);
			$this->display('index.php');
		}

	}

?>