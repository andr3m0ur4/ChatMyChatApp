<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Bem Vindo ao MyChatApp</title>
		<link rel="stylesheet" type="text/css" href="./css/login.css">
	</head>
	<body>

		<div id="login-div">
			<form id="form1" method="post" action="./pages/user_login.php">
				<h2>Formulário de Login</h2>

				<div>
					<label>
						<input type="email" name="user_email_login" placeholder="Digite Seu Email" required>
					</label>

					<label>
						<input type="password" name="user_password_login" placeholder="Digite Sua Senha" required>
					</label>

					<button id="btn1" type="submit">Login</button>

					<div class="clear"></div>
					
					<?php if (isset($_GET['error'])) : ?>
						<div>
							<span>Verifique seu Email ou Senha</span>
						</div>
					<?php endif	?>

				</div>

				<h4>
					<a href="./pages/signup.php">Criar Conta!</a>
				</h4>
			</form>
		</div>

	</body>
</html>