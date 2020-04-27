<?php  
	include "classes.php";
	$user = new user();

	if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password'])) {
		$user->setUserName($_POST['user_name']);
		$user->setUserEmail($_POST['user_email']);
		$user->setUserPassword(sha1($_POST['user_password']));

		$user->InsertUser();

		header("Location:index.php?success=1");
	}
?>