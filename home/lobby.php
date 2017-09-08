<?php session_start(); 
	$raiz=$_SERVER['DOCUMENT_ROOT']."/javaquest"; 

	require($raiz.'/scripts/utils.php');
	require($raiz.'/dao/usuarioDAO.class.php');

	if(!isLogado()){
		header('Location:../index.php');
	}

	$_SESSION['vidas']=1;
	$_SESSION['pontos']=0;
	$_SESSION['nivelConquistado']=1;
	$_SESSION['perguntadas']=array();
	if(isset($_SESSION['octocat'])){
		unset($_SESSION['octocat']);
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Java Quest - Lobby</title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../css/lobby.css?version=12">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<h1><img src="../img/java-logo.jpeg" alt="Java logo"></h1>
				<nav>
					<div class="menu">
						<a href="#" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalNovaPergunta"><span class="glyphicon glyphicon-plus"></span> Perguntas</a>
						<a href="#" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-tower"></span> Recorde</a>
						<a href="logout.php" class="btn btn-danger"><span class="glyphicon glyphicon-home"></span> Sair</a>
					</div>
				</nav>
				<hr>
			</div>
		</header>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<h2>Escolha seu Personagem</h2>
						<hr>
						<form action="desafio.php?nivel=1" method="post">
							<div class="row">
								<?php for ($i=0; $i <= 2; $i++) :?> 
									<div class="col-md-4 col-xs-4">
										<img src="../img/personagens/cat<?= $i; ?>.jpg" alt="Octocat" class="img-responsive">
									<div class="text-center">
										<input type="radio" name="cat" value="cat<?= $i; ?>.jpg" required>
									</div>
									</div>
								<?php endfor; ?>
							</div>
							<br>
							<div class="row">
								<?php for ($i=3; $i <= 5; $i++) :?> 
									<div class="col-md-4 col-xs-4">
										<img src="../img/personagens/cat<?= $i; ?>.jpg" alt="Octocat" class="img-responsive">
									<div class="text-center">
										<input type="radio" name="cat" value="cat<?= $i; ?>.jpg" required>
									</div>
									</div>
								<?php endfor; ?>
							</div>
							<hr>
							<br>
							<div class="text-center">
								<button class="btn btn-danger btn-inicia btn-lg">Iniciar Partida</button>
							</div>
						</form>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-5 col-sm-6 col-xs-12">
						<div class="ranking-box">
							<h2 class="ranking">Ranking</h2>
							<hr>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Rank</th>
										<th>Usuário</th>
										<th>Recorde</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$lista=UsuarioDAO::getRanking();
										foreach ($lista as $key => $user){
											if($_SESSION['usuario']['login']==$user->login){
												echo "<tr class='bg-warning'>";
													echo "<td>".++$key."º</td>";
													echo '<td>'.$user->login.'</td>';
													echo '<td>'.$user->recorde.'</td>';
												echo '<tr>';
											}else{
												echo '<tr>';
													echo "<td>".++$key."º</td>";
													echo '<td>'.$user->login.'</td>';
													echo '<td>'.$user->recorde.'</td>';
												echo '<tr>';
											}
										}
									?>
								</tbody>
							</table>
							<br>
						</div>
					</div>
				</div>
			</div>
		</section>	
		<footer>
			
		</footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
<div class="modal fade" id="modalNovaPergunta">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="transform:translateY(2px);">
		          <span aria-hidden="true" style="font-size:130%;">&times;</span>
		        </button>
				<h3 class="modal-title">
					Nova Pergunta
				</h3>
			</div>
			<div class="modal-body">
				<form action="confirma-pergunta.php" method="post">
					<div class="form-group">
						<label for="pergunta">Pergunta</label>
						<input type="text" name="pergunta" class="form-control" placeholder="Nova Pergunta" required autofocus>
					</div>
					<div class="form-group">
						<label for="">Alternativa 1</label>
						<input type="text"  name="alternativa1" class="form-control" placeholder="Alternativa Falsa" required>
					</div>
					<div class="form-group">
						<label for="">Alternativa 2</label>
						<input type="text"  name="alternativa2" class="form-control" placeholder="Alternativa Falsa" required>
					</div>
					<div class="form-group">
						<label for="">Alternativa 3</label>
						<input type="text"  name="alternativa3" class="form-control" placeholder="Alternativa Falsa" required>
					</div>
					<div class="form-group">
						<label for=""><strong><span class="glyphicon glyphicon-asterisk"></span> Resposta Correta</strong></label>
						<input type="text" name="respostaCorreta" class="form-control bg-success" placeholder="Alternativa Verdadeira" required>
					</div>
					<div class="form-group">
						<label for="dificuldade">Dificuldade</label>
						<select class="form-control" id="dificuldade" name="dificuldade">
							<option value="Fácil">Fácil</option>
							<option value="Normal">Normal</option>
							<option value="Difícil">Difícil</option>
						</select>
					</div>
					<button class="btn btn-danger btn-block"><strong>Enviar</strong></button>
				</form>
			</div>
			<div class="modal-footer">
				<div class="text-center">
					<small>Adicione apenas perguntas sobre o <strong>Java</strong></small>
				</div>	
			</div>
		</div>
	</div>
</div>