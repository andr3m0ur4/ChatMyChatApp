<?php  
	session_start();
	include "classes.php";

	if (isset($_POST['user_email_login']) && isset($_POST['user_password_login'])) {
		$user = new user();
		$user->setUserEmail($_POST['user_email_login']);
		$user->setUserPassword(sha1($_POST['user_password_login']));
		if ($user->UserLogin() == true) {
			$_SESSION['user_id'] = $user->getUserId();
			$_SESSION['user_name'] = $user->getUserName();
			$_SESSION['user_email'] = $user->getUserEmail();
		}
	}
?>