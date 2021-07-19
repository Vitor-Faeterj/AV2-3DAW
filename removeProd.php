<?php

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		$codBarraRemover = $_GET["codBarra"];
		$ativo = 0;
	}

	$codProdValido = 0;
	$patternCodProd = "/\d{3}-\d{2}/";

	if($codBarraRemover != "" && preg_match($patternCodProd, $codBarraRemover)){
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
		$sql = "UPDATE produtos SET ativo= '$ativo' WHERE codBarra= '$codBarraRemover' ";
		$result = $conn->query($sql);

		if($result){
			echo "Remoção Confirmada!";
		}else{
			echo "Opa!, algo deu errado :(";
		}
	}
?>