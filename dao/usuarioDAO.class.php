<?php
	$raiz=__DIR__."/../";
	require_once($raiz.'/dao/database.class.php');
	require_once($raiz.'/class/usuario.class.php');

	class UsuarioDAO extends DATABASE{

		public static function insert(Usuario $user){
			$sql="INSERT INTO usuarios (login,senha) values(?,?)";
			$stmt=DATABASE::prepare($sql);

			$stmt->bindValue(1,$user->getLogin());
			$stmt->bindValue(2,$user->getSenha());


			return $stmt->execute();
		}
		public static function login($login,$senha){
			$sql="SELECT * FROM usuarios WHERE login=? AND senha=?";
			$stmt=DATABASE::prepare($sql);

			$stmt->bindValue(1,$login);
			$stmt->bindValue(2,$senha);

			$stmt->execute();

			return $stmt->fetch();

		}
		public static function loginExiste($login){
			$sql="SELECT * FROM usuarios WHERE login=?";
			$stmt=DATABASE::prepare($sql);

			$stmt->bindValue(1,$login);

			$stmt->execute();

			return $stmt->fetch();
		}
		public static function getRanking(){
			$sql="SELECT login,recorde FROM usuarios ORDER BY recorde DESC LIMIT 10";
			$stmt=DATABASE::prepare($sql);

			$stmt->execute();

			$lista = $stmt->fetchAll(PDO::FETCH_OBJ);

			return $lista;
		}
		public static function getRecorde($usuario_id){
			$sql="SELECT login,recorde FROM usuarios WHERE id=?";
			$stmt=DATABASE::prepare($sql);
			$stmt->bindValue(1,$usuario_id);
			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_OBJ);

			return $row;
		}
		public static function atualizaRecorde($usuario_id,$recorde){
			$sql="UPDATE usuarios SET recorde=? WHERE id=?";
			$stmt=DATABASE::prepare($sql);
			$stmt->bindValue(1,$recorde);
			$stmt->bindValue(2,$usuario_id);

			return $stmt->execute();
		}
	}
?>