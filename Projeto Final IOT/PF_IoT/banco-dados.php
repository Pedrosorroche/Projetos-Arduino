
<?php

	require_once("conexao.php");
	require_once("salvar.php");

	function cadastraPonto($conexao,$id_cartao,$funcionario, $data_hora){
		$query = "INSERT INTO ponto (id_cartao, funcionario, data_hora) VALUES ('{$id_cartao}','{$funcionario}', NOW())";
		$resultado = mysqli_query($conexao, $query);
		return $resultado;
	}


	function buscaFuncionario($conexao, $id_cartao){
		$query = "SELECT nome FROM funcionarios WHERE id_cartao = '{$id_cartao}' LIMIT 1";
		$resultado = mysqli_query($conexao, $query);
		$funcionario = mysqli_fetch_assoc($resultado);
		return $funcionario;
	}


?>