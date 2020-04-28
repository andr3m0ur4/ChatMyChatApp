<?php

	session_start();

	include_once '../class/Conn.php';
	include_once "../class/User.php";

	$conn = new Conn();

	if (isset($_POST['user_email_login']) && isset($_POST['user_password_login'])) {

		$user = new User($conn);
		$user->__set('user_email', $_POST['user_email_login']);
		$user->__set('user_password', sha1($_POST['user_password_login']));

		if ($user->userLogin()) {
			$_SESSION['user_id'] = $user->__get('user_id');
			$_SESSION['user_name'] = $user->__get('user_name');
			$_SESSION['user_email'] = $user->__get('user_email');

			header("Location: ./home.php");
		}
	}
