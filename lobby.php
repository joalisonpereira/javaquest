<?php session_start(); 
	require('scripts/utils.php');
	require('dao/usuarioDAO.class.php');
	require('modais.php');
	if(!isLogado()){
		header('Location:index.php');
	}
	$_SESSION['vidas']=1;
	$_SESSION['nivelConquistado']=1;
	$_SESSION['perguntadas']=array();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Java Quest - Lobby</title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/lobby.css?version=12">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<h1>Java Quest</h1>
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
					<div class="col-md-7 col-sm-6 col-xs-12">
						<h2>Começar Partida</h2>
						<hr>
						<figure>
							<div class="row">
								<br>
								<br>
								<div class="col-md-8 col-md-offset-2">
									<img src="img/cat<?php echo rand(0,4); ?>.jpg" alt="" class="img-responsive center-block">
								</div>
							</div>
						</figure>
						<div class="text-center">
							<a href="desafio.php?nivel=1" class="btn btn-danger btn-inicia btn-lg">Iniciar Partida</a>
						</div>
					</div>
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
