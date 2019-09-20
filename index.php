<!DOCTYPE html>

<head>
<meta content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="./css/main.css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />

<style type="text/css">
	.auto-style1 {
		font-family: "Josefin Sans";
	}
</style>
</head>

<body>
	<script language="JavaScript" type="text/javascript">
		function form(showhide){
		if(showhide == "show"){
		    document.getElementById('popupbox').style.visibility="visible";
		}else if(showhide == "hide"){
		    document.getElementById('popupbox').style.visibility="hidden"; 
		}
		}
	</script>
	<div id='header'> 
		<img id='banner' src="./img/banner.png">
		<img id='logoif' src="./img/logo_urutai.png">
	</div>
	<div id="esquerda">
		<img id='ligue' src="./img/ligue.png">
	</div>

	<div id="direita">
		<div id="dir-centro">
			<div id='fundo'>
			<h1 class="text-style">Olá, tudo bem?</h1>
			<p class="text-style1">Este mural online foi feito para compartilhar mensagens de apoio e motivação. Desperte o sentimento de solidariedade e contribua com o amadurecimento emocional e os relacionamentos interpessoais difundindo a aceitação, a compreensão e o respeito a todo ser humano e sua essência, buscando atingir a missão de valorizar a vida e prevenir o suicídio.<b> Seja solidário.</b> Nós nunca sabemos o que cada pessoa enfrenta.</p>
				<br>
			</div>
			<div id='FormMensagens' >
				<div id='titleForm'>
					<h1 class='text-style2'> Mensagens Postadas</h1>
				</div>
				<div id='mensagens' style="overflow-y: scroll;">
				<?php
					require_once "ConexaoBD.php";
					session_start();
					$query = mysqli_query($CON, "SELECT nome, msg, concat(day(data),'/',month(data),'/',year(data)) As d FROM Mensagem ORDER BY data desc") or die ("Erro ao verificar mensagens");
					while ($DADOS = mysqli_fetch_object($query)){
						$NOME = $DADOS->nome;
						$MSG = $DADOS->msg;
						$DATA = $DADOS->d;
						echo "<div id='NOME'><br><u>$NOME</u></div>";
						echo "<div id='DATA'>$DATA</b></div>";
						echo "";
						echo ("\n");
						echo "<div id='MSG'><br>$MSG</div>";
						echo ("\n");
						echo "<hr>";
					}
					try{ //TRATAMENTO BD SEM MENSAGENS
						if($mensagens = mysqli_num_rows($query)){} //Mensagens encontradas 
						else{echo "Nenhuma mensagem :(";}		//Mensagens nao encontradas
					}
					catch( Exception $e){
						echo $e->getMessage();
					}
				?>
			</div>
		</div>
			<div id="formDiv">
				<h1 class='text-style2'>Deixe uma mensagem</h1>
				<form id='form' action="EnviarMensagem.php" method="POST" style="left: 0px; top: 0px; width: 400px">
					
					<p>
						<center><input type="text" id="nome" name="nome" required="required" placeholder="Nome" maxlength="30"/></center>
					</p>
					<p>
						<center><textarea type="text" id="msg" name="msg" required="required" placeholder="Mensagem" maxlength="1499" style="resize: none"></textarea></center>
					</p>
					<p>
						<center><input type="submit" value="Enviar"/></center>
					</p>		
				</form>
		</div>		
	</div>
	<div id="dir-direita">
		<img id='gentileza' src="./img/gentileza.png">
	</div>
</div>
	<div id="footer">
		<img id='gentilezaft' src="./img/footer.png">
	</div>
</body>
</html>
