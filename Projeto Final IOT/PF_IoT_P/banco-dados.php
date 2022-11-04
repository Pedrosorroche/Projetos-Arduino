<?php

	require_once("conexao.php");
	require_once("salvar.php");

	function buscaProduto($conexao, $codigo){
		$query = "SELECT produto FROM produtos WHERE codigo = '{$codigo}' LIMIT 1";
		$resultado = mysqli_query($conexao, $query);
		$produto = mysqli_fetch_assoc($resultado);
		return $produto;
	}


	function excluiProduto($conexao, $codigo){
		$query = "DELETE FROM produtos WHERE codigo = '{$codigo}'";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}

	//funcoes para contar os produtos, uma para cada tipo
	//function contaTipo1($conexao){
		//$query = "SELECT count(codigo) as total from produtos WHERE tipo=1";
		//$resultado = mysqli_query($conexao, $query);
		//$qtd = mysqli_fetch_assoc($resultado);
		//return $qtd['total'];
	//}

?>