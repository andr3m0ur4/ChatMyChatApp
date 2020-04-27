<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Bem Vindo ao MyChatApp</title>
		<link rel="stylesheet" type="text/css" href="../css/signup.css">
		<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	</head>
	<body>

		<div id="signup-div">
			<form id="form2" method="post" action="./insert_user.php">
				<h2>Formulário de Cadastro</h2>
				<div>
					<label>
						<input type="text" name="user_name" placeholder="Digite Seu Nome" required>
					</label>

					<label>
						<input type="email" name="user_email" placeholder="Digite Seu Email" required>
					</label>

					<label>
						<input type="password" name="user_password" placeholder="Digite Sua Senha" required>
					</label>

					<button id="btn2" type="submit">Cadastrar</button>

					<div class="clear"></div>
					
					<?php if (isset($_GET['success'])) : ?>
						<div>
							<span>Usuário Inserido</span>
						</div>
					<?php endif	?>

				</div>
				<h4>
					<a href="../index.php">Já tem uma Conta!</a>
				</h4>
			</form>
		</div>

	</body>
</html>