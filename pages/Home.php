<?php  
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bem Vindo ao MyChatApp</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<script type="text/javascript" src="jquery-2.1.0.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#ChatText").keyup(function(e){
				// Quando nós pressionamos enter faz
				if (e.keyCode == 13) {
					var ChatText = $("#ChatText").val();
					$.ajax({
						type:'POST',
						url:'InsertMessage.php',
						data:{ChatText:ChatText},
						success:function(){
							$("#ChatMessages").load("DisplayMessages.php");
							$("#ChatText").val("");
						}
					});
				}
			});

			setInterval(function(){
				// Atualiza após 1500ms
				$("#ChatMessages").load("DisplayMessages.php");
			},1500);

			$("#ChatMessages").load("DisplayMessages.php");
		});
		
	</script>
</head>
<body>
	<center><h2 style="color: orange; font-family: tahoma; font-size: 30px">Bem Vindo <span><?php echo $_SESSION['user_name']; ?></span></h2></center>
	<br><br>
	<div id="ChatBig">
		<div id="ChatMessages" class="scrollbar">
			
		</div>
		<textarea id="ChatText" name="ChatText" placeholder="Digite a Mensagem..."></textarea>
	</div>
	<script type="text/javascript">
		var textarea = document.getElementbyId('ChatText');
		textarea.scrollTop = textarea.scrollHeight;
	</script>
</body>
</html>