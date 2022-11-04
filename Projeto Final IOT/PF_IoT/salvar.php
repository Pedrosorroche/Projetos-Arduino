<?php

	require_once("conexao.php");
	require_once("banco-dados.php");

	$id_cartao = $_GET["id"];

	date_default_timezone_set('America/Sao_Paulo');
	$data_hora = date("Y-m-d H:i:s");

	//funcoes dentro do arquivo banco-dados.php
	$funcionario = buscaFuncionario($conexao, $id_cartao); 

	if($funcionario != NULL){
		echo "salvo_com_sucesso";
	}

	cadastraPonto($conexao,$id_cartao,$funcionario["nome"], $data_hora); //essa e a funcao de salvar na tabela ponto
		

?>