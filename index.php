<?php session_start();
	require('scripts/utils.php');
	require('dao/usuarioDAO.class.php');

	if(isLogado()){
		header('Location:home/lobby.php');
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Java Quest - Inicial</title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/index.css?version=12">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<h1><img src="img/java-logo.jpeg" alt="Java logo"></h1>
				<nav>
					<a href="cadastro.php" class="btn btn-danger btn-cadastro">Cadastrar</a>
				</nav>
				<hr>
			</div>
		</header>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<form action="login.php" method="post" class="loginArea">
									<div class="form-group has-feedback">
										<label for="login">Login</label>
										<input type="text" name="login" id="login" class="form-control input-lg" placeholder="Login" required autofocus>
										<i class="glyphicon glyphicon-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="senha">Senha</label>
										<input type="password" name="senha" id="senha" class="form-control input-lg" placeholder="Senha" required>
										<i class="glyphicon glyphicon-lock form-control-feedback"></i>
									</div>
									<br>
									<button class="btn btn-danger btn-lg btn-block">Iniciar Jogo</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="text-center">
				<p>
					<?php 
						if(isset($_SESSION['msgLogin'])){
							echo $_SESSION['msgLogin'];
							unset($_SESSION['msgLogin']);
						}
					?>
				</p>
			</div>
		</section>
		<footer>
			
		</footer>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
