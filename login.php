<?php session_start();
ini_set('display_errors', true);
	error_reporting(E_ALL);
	$raiz=__DIR__;
	require ($raiz.'/dao/usuarioDAO.class.php');

	if(isset($_POST['login']) && isset($_POST['senha'])){
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		$busca=UsuarioDAO::login($login,$senha);
		if($busca!=false){
			$_SESSION['usuario']=$busca;
			header('Location:home/lobby.php');
		}else{
			$_SESSION['msgLogin']='Login ou senha incorretos.';
			header('Location:index.php');
		}
	}else{
		header('Location:index.php');
	}
?>
