<?php session_start();

	if(!isset($_POST['nivel']) ||  !isset($_POST['resposta']) || !is_numeric($_POST['nivel'])){

		header("Location:lobby.php");

	}else if($_POST['resposta']=="1" && $_POST['nivel']=='15'){
		$_SESSION['pontos']+=10;
		header('Location:gameover.php');
	}else if($_POST['resposta']=="1"){

		$nivel=$_POST['nivel'];

		$nivel+=1;

		$_SESSION['pontos']+=10;

		$_SESSION['nivelConquistado']=$nivel; 

		$_SESSION['perguntadas'][]=$_POST['pergunta_id']; 

		header("Location:desafio.php?nivel={$nivel}");
	}else if($_POST['resposta']=="0" && $_SESSION['vidas']==1){

		$_SESSION['vidas']=0; 

		$nivel=$_POST['nivel'];

		header ("Location:desafio.php?nivel={$nivel}");
	}else if($_POST['resposta']=="0" && $_SESSION['vidas']==0){
		unset($_SESSION['perguntadas']);
		unset($_SESSION['vidas']);
		header ("Location:gameover.php");
	}
	// DADOS GUARDADOS NA SESSÃO:
	
	// $_SESSION['usuario']
	// $_SESSION['vidas']
	// $_SESSION['nivelConquistado']
	// $_SESSION['perguntadas']
	// $_SESSION['octocat'] (adicionado no nivel 1)

?>