<?php session_start(); 
	$raiz=$_SERVER['DOCUMENT_ROOT']."/javaquest";

	require($raiz.'/scripts/utils.php');
	require($raiz.'/dao/desafioDAO.class.php');

	if(!isLogado() || !isset($_GET['nivel']) || !is_numeric($_GET['nivel']) || !isset($_SESSION['vidas']) || $_SESSION['nivelConquistado']!=$_GET['nivel']){
		header('Location:lobby.php');
	}
	if($_GET['nivel']==1 && !isset($_SESSION['octocat'])){
		$_SESSION['octocat']=$_POST['cat'];
	}

	?>
	<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<title>Java Quest - Nível <?= $_GET['nivel']; ?></title>
			<meta name="viewport" content="width=device-width">
			<link rel="stylesheet" href="../css/desafio.css?version=12">
			<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		</head>
		<body>
			<header>
				<div class="container-fluid">
					<h1>Batalha <?= $_GET['nivel']; ?></h1>
					<nav>
						<a href="lobby.php" class="btn btn-danger btn-desistir"><span class="glyphicon glyphicon-remove" style="transform:translateY(1px);"></span> Desistir</a>
					</nav>
					<hr>
				</div>
			</header>
			<section>
				<?php 
					$perguntaSelecionada=selecionaPergunta();
				?>
				<div class="container">
					<div class="row">
						<div class="col-md-4 hidden-xs hidden-sm">
							<div class="row">
								<div class="col-md-12 col-sm-5">
									<figure class="personagem">
										<div class="row">
											<div class="col-md-10 col-md-offset-1">
												<img src="../img/personagens/<?= $_SESSION['octocat']; ?>" alt="Octocat" class="img-responsive octocat">
											</div>
										</div>
									</figure>
								</div>
								<div class="col-md-12 col-sm-2">
									<figure>
										<img src="../img/vs.png" alt="VS" class="center-block vs">
									</figure> 
								</div>
								<div class="col-md-12 col-sm-5">
									<figure>
										<img src="../img/personagens/<?php echo selecionaOponente($perguntaSelecionada->dificuldade); ?>" alt="Oponente" class="ghost center-block img-responsive">
									</figure>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-md-offset-1">
							<div class="quizBox">
								<form action="controlador.php" method="post">
									<h2>
										<?php 
											echo $perguntaSelecionada->pergunta;
										?>
									</h2>
									<table class="table">
										<tbody>
											<?php
												$alternativa=array("A","B","C","D"); 
												$array=selecionaRespostas($perguntaSelecionada->id);
												foreach ($array as $key => $row): ?>
												
												<tr>
													<td><strong><?= $alternativa[$key]; ?></strong></td>
													<td><label for="resposta"><?php echo $row->resposta; ?></label></td>
													<td><input type="radio" name="resposta" value="<?= $row->correta; ?>" required></td>
												</tr>
												
											<?php endforeach ?>
										</tbody>
									</table>
									<input type="hidden" name="pergunta_id" value="<?= $perguntaSelecionada->id; ?>">
									<input type="hidden" name="nivel" value="<?= $_GET['nivel']; ?>">
									<br>
									<br>
									<div class="pull-left">
										<button class="btn btn-danger">Responder</button>
									</div>
									<div class="vidas pull-right" title="Vidas">
										<p><?= $_SESSION['vidas']; ?></p>
										<img src="../img/coracao.png" alt="Vidas" style="width:40px; height:40px;">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<footer>
				
			</footer>
		</body>
	</html>
	<?php 
	function selecionaPergunta(){
		if($_GET['nivel']<=5){
			$listaPerguntas=DesafioDAO::getPerguntas('Fácil');
			$idPerguntadas=$_SESSION['perguntadas'] ?? array();
			foreach ($listaPerguntas as $key => &$row) {
				if(in_array($row->id, $idPerguntadas)){
					unset($row);
				}else{
					return $row;
				}
			}
		}
		if($_GET['nivel']>5 && $_GET['nivel']<=10){
			$listaPerguntas=DesafioDAO::getPerguntas('Normal');
			$idPerguntadas=$_SESSION['perguntadas'] ?? array();
			foreach ($listaPerguntas as $key => &$row) {
				if(in_array($row->id, $idPerguntadas)){
					unset($row);
				}else{
					return $row;
				}
			}
		}
		if($_GET['nivel']>10 && $_GET['nivel']<=15){
			$listaPerguntas=DesafioDAO::getPerguntas('Difícil');
			$idPerguntadas=$_SESSION['perguntadas'] ?? array();
			foreach ($listaPerguntas as $key => &$row) {
				if(in_array($row->id, $idPerguntadas)){
					unset($row);
				}else{
					return $row;
				}
			}
		}
	}
	function selecionaRespostas($id){
		$respostas=DesafioDAO::getRespostas($id);
		shuffle($respostas);
		return $respostas;
	}
	function selecionaOponente(string $dificuldade){
		if($dificuldade=="Fácil"){
			return "ghost0.jpg";
		}else if($dificuldade=="Normal"){
			return "ghost1.png";
		}else if($dificuldade=="Difícil"){
			return "ghost2.png";
		}
	}
?>