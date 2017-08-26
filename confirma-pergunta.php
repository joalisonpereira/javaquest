<?php 
	require('dao/desafioDAO.class.php');
	if(isset($_POST['pergunta']) && isset($_POST['alternativa1']) && isset($_POST['alternativa2']) && isset($_POST['alternativa3']) && isset($_POST['respostaCorreta'])){
		if(strlen($_POST['pergunta'])<3){
			header('Location:lobby.php');
		}else{
			DesafioDAO::insertPergunta($_POST['pergunta'],$_POST['dificuldade']);
			$row=DesafioDAO::getId($_POST['pergunta']);
			echo $row->id;
			DesafioDAO::insertResposta($_POST['alternativa1'],0,$row->id);
			DesafioDAO::insertResposta($_POST['alternativa2'],0,$row->id);
			DesafioDAO::insertResposta($_POST['alternativa3'],0,$row->id);
			DesafioDAO::insertResposta($_POST['respostaCorreta'],1,$row->id);

			header('Location:lobby.php');
		}
	}else{
		header('Location:lobby.php');
	}
?>