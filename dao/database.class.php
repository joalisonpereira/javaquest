<?php 
	$raiz=$_SERVER['DOCUMENT_ROOT']."/javaquest";
	 
	require($raiz."/scripts/init.php");

	class DATABASE{
		private static $conexao;

		private static function getConexao(){
			try {
				if(!isset(self::$conexao))
				self::$conexao=new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); //ARRAY SETA CONFIGURAÇÕES UTF-8
			} catch (PDOException $e) {
				$e -> getMessage();
			}
			return self::$conexao;
		}
		public static function prepare($sql){
			return self::getConexao()->prepare($sql);
		}
	}
 ?>