<?php

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		$codBarra = $_GET["codProd"];
		$nomeProd = $_GET["nomeProd"];
		$fabricante = $_GET["fabricante"];
		$categoria = $_GET["categoriaProd"];
		$tipoProd = $_GET["tipoProd"];
		$precoProd = $_GET["precoProd"];
		$qtdEstoque = $_GET["qtdEstoque"];
		$pesoProd = $_GET["pesoProd"];
		$dataInclusao = $_GET["dataInclusao"];
		$ativo = 1;
	}

	$checker = 0;
	$patternCodProd = "/[0-9]{3}-[0-9]{2}/";
	$patternPreco = "/^\d*(\.\d{0,2})?$/";
	$patternPeso = "/^\d*(\.\d{0,4})?$/";

	if($codBarra != "" && preg_match($patternCodProd, $codBarra)){
		$checker += 1;
	}
	if($nomeProd != "" && ctype_alpha($nomeProd)){
		$checker += 1;
	}
	if($fabricante != "" && ctype_alpha($fabricante)){
		$checker += 1;
	}
	if($categoria != ""){
		$checker += 1;
	}
	if($tipoProd != "" && ctype_alpha($tipoProd)){
		$checker += 1;
	}
	if($qtdEstoque != "" && ctype_digit($qtdEstoque)){
		$checker += 1;
	}
	if($pesoProd != "" && preg_match($patternPeso, $pesoProd)){
		$checker += 1;
	}else{
		echo "erro no peso";
	}
	if($dataInclusao != ""){
		$checker += 1;
	}
	if($precoProd != "" && preg_match($patternPreco, $precoProd)){
		$checker += 1;
	}else{
		echo "erro no preco";
	}

	if($checker == 9){

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
		$sql = "INSERT INTO produtos (codBarra, nome, fabricante, categoria, tipoProd, precoVenda, qtdEstoque, pesoGramas, dataInclusao, ATIVO) 
    	VALUES ('$codBarra','$nomeProd','$fabricante','$categoria','$tipoProd','$precoProd', '$qtdEstoque', '$pesoProd', '$dataInclusao', '$ativo')";

        $result = $conn->query($sql);

        if($result){
            echo "Insert bem sucedido";
        }else{
            echo "Erro!";
        } 
	}

?>