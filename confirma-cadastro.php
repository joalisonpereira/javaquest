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
			$_SESSION['msgCadastro']="Senhas não conferem";
		}else if(UsuarioDAO::loginExiste($login)!=false){
			$_SESSION['msgCadastro']="Login já existente";
		}else{
			$user=new Usuario($login,$senha);
			$operacao=UsuarioDAO::insert($user);
			if($operacao){
				$_SESSION['msgCadastro']="Cadastrado com sucesso";
			}else{
				$_SESSION['msgCadastro']="Falha no cadastro";
			}
		}
		header('Location:cadastro.php');
	}
?>