<!DOCTYPE html>
<html>
<head>
	<title>Bem Vindo ao MyChatApp</title>
</head>
<body>
	<center>
		<div id="LoginDiv">
			<form id="form1" method="POST" action="UserLogin.php">
				<link rel="stylesheet" type="text/css" href="login.css">
				<h2>Formulário de Login</h2>
				<table>
					<tr>
						<td><input type="email" name="user_email_login" placeholder="Digite Seu Email" required></td>
					</tr>
					<tr>
						<td><input type="password" name="user_password_login" placeholder="Digite Sua Senha" required></td>
					</tr>
					<tr>
						<td><input id="btn1" type="submit" name="" value="Login"></td>
					</tr>
					<?php  
						if (isset($_GET['error'])){
					?>
					<tr>
						<td></td><td><span style="color: red;">Verifique seu Email ou Senha</span></td>
					</tr>
					<?php  
						}
					?>
				</table>
				<h4><a href="signup.php" style="color: red; font-size: 18px;">Criar Conta!</a></h4>
			</form>
		</div>
	</center>
</body>
</html>