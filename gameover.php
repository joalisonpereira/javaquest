<?php session_start(); 
	require('scripts/utils.php');
	if(!isLogado()){
		header('Location:lobby.php');
	}
?>
<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Java Quest - Game Over</title>
		<meta name="viewport" content="width=device-width">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
	</body>
</html>
