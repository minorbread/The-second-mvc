<?php
	namespace core\lib;
	use core\lib\conf;
	/**
	* 模型类
	*/
	class model extends \PDO
	{
		
		function __construct() {
			// $dsn = 'mysql:host=localhost;dbname=imooccomment';
			// $username = 'root';
			// $passwd = '';
			$database = conf::all('database');
			extract($database);
			try {
				parent::__construct($dsn, $username, $passwd);
			} catch(\PDOException $e) {
				p($e->getMessage());				
			}
		}
	}




















?>