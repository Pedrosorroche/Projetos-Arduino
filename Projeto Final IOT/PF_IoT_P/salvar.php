<?php

	require_once("conexao.php");
	require_once("banco-dados.php");
	
	$codigo = $_GET["id"];

	$produto = buscaProduto($conexao, $codigo);

	if($produto != NULL){
		echo "excluido_com_sucesso";
	}
	else{
		echo "produto_inexistente";
	}

	excluiProduto($conexao, $codigo);

?>