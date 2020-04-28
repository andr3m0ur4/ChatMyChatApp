<?php

	include_once '../class/Conn.php';
	include_once "../class/Chat.php";

	$conn = new Conn();

	$chat = new Chat($conn);
	
	echo json_encode($chat->displayMessage());
