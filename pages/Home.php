<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Bem Vindo ao MyChatApp</title>
		<link rel="stylesheet" type="text/css" href="../css/home.css">
		<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
		<script src="../js/chat.js"></script>
	</head>
	<body>

		<h2>Bem Vindo <span><?= $_SESSION['user_name'] ?></span></h2>

		<div id="chat-big">
			<div id="chat-messages" class="scrollbar"></div>

			<textarea id="chat-text" name="ChatText" placeholder="Digite a Mensagem..."></textarea>
		</div>

	</body>
</html>