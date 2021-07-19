<?php

	if($_SERVER["REQUEST_METHOD"] === "GET"){
		$codigoProd = $_GET["codProd"];
	}
		
	$codProdValido = 0;
	$patternCodProd = "/\d{3}-\d{2}/";

	if($codigoProd != "" && preg_match($patternCodProd, $codigoProd)){
		$codProdValido = 1;
	}

	if($codProdValido == 1){

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

		//Query
		$sql = "SELECT * FROM produtos WHERE codBarra = '$codigoProd' ";
		$result = $conn->query($sql);

		if($result->num_rows == 0){
			echo "Erro, esse cliente nao existe :(";
		}else{

			$jsonArray = array();
			while($linha = $result->fetch_assoc()){
				$jsonArray[] = $linha;
			}

			echo json_encode($jsonArray);
		}

	}
?>