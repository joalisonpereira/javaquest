<?php session_start();
	$raiz=$_SERVER['DOCUMENT_ROOT']."/javaquest";
	 
	require($raiz.'/scripts/utils.php');
	require($raiz.'/dao/usuarioDAO.class.php');

	if(!isLogado()){
		header('Location:../index.php');
	}
	$id=$_SESSION['usuario']['id'];
	$pontos=$_SESSION['pontos']; 
	$recorde=UsuarioDAO::getRecorde($id)->recorde;

	if($recorde<$pontos){
		UsuarioDAO::atualizaRecorde($id,$pontos); //ATUALIZANDO RECORDE DO USUARIO
	}
?>
<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Java Quest - Game Over</title>
		<meta name="viewport" content="width=device-width">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<figure>
							<img src="../img/gameover.gif" alt="Game over" class="img-responsive gameover">
						</figure>
					</div>
				</div>
			</div>
		</header>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<img src="../img/java_mascote.png" alt="Java Mascote" class="img-responsive center-block mascote">
					</div>
				</div>
				<div class="pontos text-center">
					<p>Pontuação: <?= $_SESSION['pontos']; ?></p>
				</div>
				<br><br>
				<div class="text-center">
						<a href="lobby.php" class="btn btn-danger btn-lg"> <span class="glyphicon glyphicon-chevron-left" style="margin-right:5px;"></span>Lobby</a>
						<a href="https://www.github.com/joalisonpereira/javaquest" target="_blank" class="btn btn-danger btn-lg">Java Quest <span class="glyphicon glyphicon-folder-open" style="margin-left:5px;"></span></a>
					<div class="btn-group">
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
<style>
	.mascote{
		position:relative;
		top:-70px;
	}
	.pontos{
		font-size:150%;
		font-weight: bold;
	}
	.btn{
		border-radius:0 !important;
	}
</style>