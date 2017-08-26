<?php session_start();

if(!isset($_POST['nivel']) ||  !isset($_POST['resposta']) || !is_numeric($_POST['nivel'])){

	header("Location:lobby.php");

}else if($_POST['resposta']=="1"){

	$nivel=$_POST['nivel'];

	$nivel+=1;

	$_SESSION['nivelConquistado']=$nivel; // PASSOU DE NIVEL

	$_SESSION['perguntadas'][]=$_POST['pergunta_id']; // ADICIONA ID DA PERGUNTA NO ARRAY

	header("Location:desafio.php?nivel={$nivel}");
}else if($_POST['resposta']=="0" && $_SESSION['vidas']==1){

	$_SESSION['vidas']=0; //PERDEU UMA VIDA

	$nivel=$_POST['nivel'];

	header ("Location:desafio.php?nivel={$nivel}");
}else if($_POST['resposta']=="0" && $_SESSION['vidas']==0){
	unset($_SESSION['perguntadas']);
	unset($_SESSION['vidas']);
	header ("Location:gameover.php");
}
?>