<?php
	
	class Conn
	{
		private $dsn = 'localhost';
		private $dbname = 'chat';
		private $user = 'root';
		private $pass = '';

		public function connect()
		{
			try {
				$dbc = new PDO(
					"mysql:host={$this->dsn};dbname={$this->dbname}", "{$this->user}", "{$this->pass}",
					[
		                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                PDO::ATTR_PERSISTENT => false,
		                PDO::ATTR_EMULATE_PREPARES => false,
		                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	            	]
	            );
			} catch (PDOException $e) {
				die("ERROR: " . $e->getMessage());
			}

			return $dbc;
		}
	}
