<?php 

function isLogado(){
	return isset($_SESSION['usuario']);
}
?>