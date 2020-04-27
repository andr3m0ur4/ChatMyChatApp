<?php

	include_once '../class/Conn.php';
	include_once "../class/User.php";

	$conn = new Conn();
	$user = new User($conn);

	if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_password'])) {

		$user->__set('user_name', $_POST['user_name']);
		$user->__set('user_email', $_POST['user_email']);
		$user->__set('user_password', sha1($_POST['user_password']));

		$user->insertUser();

		header("Location: ./signup.php?success=1");
	}
