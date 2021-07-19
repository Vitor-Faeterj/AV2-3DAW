<?php

	if($_SERVER["REQUEST_METHOD"] == "GET"){

		$status = $_GET["status"];

		//Login no banco
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$nomeBanco = "ximbole";

		//Conexão
		$conn = new mysqli($servidor, $usuario, $senha, $nomeBanco);
		if ($conn->connect_error) {
			die("Conexao falhou: " . $conn->connect_error);
		}

		//Requisicao baseada no valor do button
		if($status == 3){
			$sql = "SELECT * FROM produtos";
			$result = $conn->query($sql);
		}else{

			$sql = "SELECT * FROM produtos WHERE ATIVO= '$status' ";
			$result = $conn->query($sql);
		}

		//Resultado
		if($result->num_rows > 0){

			$jsonArray = array();
			while($linha = $result->fetch_assoc()){

				$jsonArray[] = $linha;
			}

			echo json_encode($jsonArray);
		}else{
			echo "Erro!";
		}
	}
?>