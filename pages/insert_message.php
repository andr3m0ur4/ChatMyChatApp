<?php

	session_start();

	include_once '../class/Conn.php';
	include_once "../class/Chat.php";

	$conn = new Conn();

	if (isset($_POST['chat_text'])) {

		$chat = new Chat($conn);
		$chat->__set('chat_user_id', $_SESSION['user_id']);
		$chat->__set('chat_text', $_POST['chat_text']);
		$chat->insertChatMessage();
	}
