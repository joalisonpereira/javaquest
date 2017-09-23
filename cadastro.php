<?php session_start(); 
	require('scripts/utils.php');
	if(isLogado()){
		header('Location:niveis.php');
	}
?>
<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Java Quest - Cadastro</title>
		<link rel="stylesheet" href="css/cadastro.css">
		<meta name="viewport" content="width=device-width">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<h1><img src="img/java-logo.jpeg" alt="Java logo"></h1>
				<nav>
					<a href="index.php" class="btn btn-danger btn-voltar">Página Inicial</a>
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
								<form action="confirma-cadastro.php" method="post" class="loginArea">
									<h2>Cadastro</h2>
									<hr>
									<div class="form-group has-feedback">
										<label for="login">Login</label>
										<input type="text" name="login" id="login" class="form-control input-lg" placeholder="Login" required>
										<i class="glyphicon glyphicon-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="senha">Senha</label>
										<input type="password" name="senha" id="senha" class="form-control input-lg" placeholder="Senha" required>
										<i class="glyphicon glyphicon-lock form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label for="confirmaSenha">Confirmar senha</label>
										<input type="password" name="confirmaSenha" id="confirmaSenha" class="form-control input-lg" placeholder="Confirmar" required>
										<i class="glyphicon glyphicon-lock form-control-feedback"></i>
									</div>
									<br>
									<button class="btn btn-danger btn-lg btn-block">Confirmar</button>
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
						if(isset($_SESSION['msgCadastro'])){
							echo $_SESSION['msgCadastro'];
							unset($_SESSION['msgCadastro']);
						}
					?>
				</p>
			</div>
		</section>
		<footer>
			
		</footer>
	</body>
</html>
