<!DOCTYPE html>
<html>
<head>
	<title>Bem Vindo ao MyChatApp</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<script type="text/javascript" src="jquery-2.1.0.min.js"></script>
</head>
<body>
	<center>
		<div id="SignUp Div">
			<form id="form2" method="POST" action="InsertUser.php">
				<h2>Formulário de Cadastro</h2>
				<table>
					<tr>
						<td><input type="text" name="user_name" placeholder="Digite Seu Nome" required></td>
					</tr>
					<tr>
						<td><input type="email" name="user_email" placeholder="Digite Seu Email" required></td>
					</tr>
					<tr>
						<td><input type="password" name="user_password" placeholder="Digite Sua Senha" required></td>
					</tr>
					<tr>
						<td><input id="btn2" type="submit" name="" value="Cadastrar"></td>
					</tr>
					<?php  
						if (isset($_GET['success'])){
					?>
					<tr>
						<td></td><td><span style="color: green;">UserInserted</span></td>
					</tr>
					<?php  
						}
					?>
				</table>
				<h4><a href="index.php" style="color: red; font-size: 18px;">Ja tem uma Conta!</a></h4>
			</form>
		</div>
	</center>
</body>
</html>