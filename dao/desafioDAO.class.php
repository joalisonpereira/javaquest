<?php
	$raiz=$_SERVER['DOCUMENT_ROOT']."/javaquest"; 
	require($raiz.'/dao/database.class.php');

	class DesafioDAO extends DATABASE{

		public static function insertPergunta($pergunta,$dificuldade){
			$sql="INSERT INTO perguntas (pergunta,dificuldade) values(?,?)";
			$stmt=DATABASE::prepare($sql);

			$stmt->bindValue(1,$pergunta);
			$stmt->bindValue(2,$dificuldade);

			return $stmt->execute();
		}
		public static function getId($pergunta){
			$sql="SELECT id FROM perguntas WHERE pergunta=?";
			$stmt=DATABASE::prepare($sql);
			$stmt->bindValue(1,$pergunta);

			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);

		}
		public static function insertResposta($resposta,$correta,$pergunta_id){
			$sql="INSERT INTO respostas (resposta,correta,pergunta_id) VALUES (?,?,?)";
			$stmt=DATABASE::prepare($sql);

			$stmt->bindValue(1,$resposta);
			$stmt->bindValue(2,$correta);
			$stmt->bindValue(3,$pergunta_id);

			return $stmt->execute();
		}
		public static function getPerguntas(string $dificuldade){
			$sql="SELECT id,pergunta,dificuldade FROM perguntas WHERE dificuldade=?";
			$stmt=DATABASE::prepare($sql);

			$stmt->bindValue(1,$dificuldade);

			$stmt->execute();

			$lista = $stmt->fetchAll(PDO::FETCH_OBJ);

			return $lista;
		}
		public static function getRespostas($pergunta_id){
			$sql="SELECT resposta,correta FROM respostas WHERE pergunta_id=?";
			$stmt=DATABASE::prepare($sql);

			$stmt->bindValue(1,$pergunta_id);
			
			$stmt->execute();

			$lista = $stmt->fetchAll(PDO::FETCH_OBJ);

			return $lista;
		}
	}
?>