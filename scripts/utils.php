<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
function isLogado(){
	return isset($_SESSION['usuario']);
}
?>