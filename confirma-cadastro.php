<?php session_start(); 
	require('scripts/utils.php');
	if(isLogado()){
		header('Location:lobby.php');
	}
?>
<?php 
	require('dao/usuarioDAO.class.php');

	if(isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['confirmaSenha'])){
		$login=$_POST['login'];
		$senha=$_POST['senha'];
		$confirmaSenha=$_POST['confirmaSenha'];

		if($senha != $confirmaSenha){
			$_SESSION['msgCadastro']="Senhas não conferem.";
			header('Location:cadastro.php');
		}else if(UsuarioDAO::loginExiste($login)!=false){
			$_SESSION['msgCadastro']="Login já existente";
			header('Location:cadastro.php');
		}else{
			$user=new Usuario($login,$senha);
			UsuarioDAO::insert($user);
			header('Location:index.php');
		}
	}
?>