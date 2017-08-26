<?php session_start();
	require ('dao/usuarioDAO.class.php');
	
	if(isset($_POST['login']) && isset($_POST['senha'])){
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		$busca=UsuarioDAO::login($login,$senha);
		if($busca!=false){
			$_SESSION['usuario']=$busca;
			header('Location:lobby.php');
		}else{
			$_SESSION['msgLogin']='Login ou senha incorretos.';
			header('Location:index.php');
		}
	}
?>