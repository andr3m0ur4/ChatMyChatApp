<?php  
	
	try {
		$dbc = new PDO("mysql:host=localhost;dbname=chat", "root", "",
			array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            )
		);
	} catch (Exception $e) {
		die("ERROR: " . $e->getMessage());
	}
?>