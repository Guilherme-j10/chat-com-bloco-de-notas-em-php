<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>teste db em bloco de notas</title>
		<style>
			*{margin: 0px; padding: 0px; box-sizing: border-box; font-family:Arial; font-weight: normal;}
			body{
				display: flex;
				justify-content: center;
				align-items: flex-start;
				flex-direction: row;
			}

			.box-msg, form{
				width: 50vw;
				margin: 15px;
			}

			.box-msg{
				height: 600px;
				padding: 1%;
				border-radius: 5px;
				overflow: scroll;
				overflow-x: hidden;
				border: solid 1px #ccc;
			}

			.box-msg .msg{
				max-width: 500px;
				background-color: #b5f58e;
				border: solid 1px #389400;
				padding: 1%;
				border-radius: 5px;
				margin-bottom: 10px;
			}

			.box-msg .msg h1{
				color: #111;
				font-weight: bold;
				margin-bottom: 10px;
				font-size: 1.1em;
			}
			
			form{
				display: flex;
				justify-content: center;
				align-items: center;
				flex-direction: column;
			}

			form label, textarea, input{
				width: 100%;
			}

			form label{
				margin-bottom: 5px;
				color: #333;
				text-transform: uppercase;
			}

			form input, textarea{
				padding: 6px;
				border-radius: 3px;
				border: none;
				border: solid 1px #ccc;
			}

			form textarea{
				height: 200px;
				resize: none;
			}

			form #env{
				background-color: #007deb;
				color: #fff;
				margin-top: 15px;
				border: none;
				font-size: 1.1em;
				text-transform: uppercase;
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<form method="POST" id="form">
			<label>Nome: </label>
			<input type="text" name="nome"><br>
			<label>Mensagem: </label>
			<textarea name="msg"></textarea>
			<input type="submit" id="env" value="enviar">
		</form>
		<div class="box-msg" id="box-msg"></div>
		<div id="info"></div>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#box-msg").load("mensagens.txt");
				setInterval(() => {
					$("#box-msg").load("mensagens.txt");
					$("#box-msg").animate({
						scrollTop: $(this).height()
					}, 100);
				}, 3000);

				$("#form").submit(function(){	
					var dados = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "envia.php",
						data: dados,
						success: function(data){
							$("#info").html(data);
							document.getElementById("form").reset();
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>