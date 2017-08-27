<?php session_start(); 
	require('scripts/utils.php');
	require('dao/desafioDAO.class.php');
	if(!isLogado() || !isset($_GET['nivel']) || !is_numeric($_GET['nivel']) || $_SESSION['nivelConquistado']!=$_GET['nivel'] || !isset($_SESSION['vidas'])){
		header('Location:lobby.php');
	}
	if($_GET['nivel']==1){
		$_SESSION['pontos']=0;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Java Quest - Nível <?= $_GET['nivel']; ?></title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/index.css?version=12">
		<link rel="stylesheet" href="css/desafio.css?version=12">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div class="container-fluid">
				<h1>Nível <?= $_GET['nivel']; ?></h1>
				<nav>
					<a href="lobby.php" class="btn btn-danger btn-cadastro"><span class="glyphicon glyphicon-remove"></span> Desistir</a>
				</nav>
				<hr>
			</div>
		</header>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="quizBox">
							<div class="iconDificuldade text-right">
								<p>
									<strong>
										<?php 
											$perguntaSelecionada=selecionaPergunta();
											echo "Dificuldade: ".$perguntaSelecionada->dificuldade;
										?>
									</strong>
								</p>
							</div>	
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
												<td class="pull-left"><label for="resposta"><?php echo $row->resposta; ?></label></td>
												<td><input type="radio" name="resposta" class="pull-right" value="<?= $row->correta; ?>" required></td>
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
								<div class="vidas pull-right">
									<p><?= $_SESSION['vidas']; ?></p>
									<img src="img/coracao.png" alt="" style="width:40px; height:40px;">
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
<style>
	.table strong{
		border-radius:10px;
		background: #E03D3D ;
		padding:8px 12px;
		color:white;
	}
	.table td{
		padding:15px 0 !important;
	}
</style>
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
	if($_GET['nivel']>5 && $_GET['nivel']<=7){
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
}
function selecionaRespostas($id){
	$respostas=DesafioDAO::getRespostas($id);
	shuffle($respostas);
	return $respostas;
}
?>