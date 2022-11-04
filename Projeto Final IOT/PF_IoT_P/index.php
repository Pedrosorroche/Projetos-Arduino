<style>
	form{
		background-color: #CCE5FF;
		padding: 10px;
		border-radius: 10px;
	}

</style>
<contentType="text/html; pageEncoding="UTF-8">
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<title>Controle de Estoque</title>
	</head>
	<!--
	 Aqui o java script atualiza a pagina de forma automatica a cada 30s
	-->
	<script type="text/javascript">
		function load()
		{
			setTimeout("window.open(self.location, '_self');", 3000);
		}
	</script>

	<body onload="load()"> <!-- Aqui chama a funcao que executa a cada 30s -->
		<div class="container">
			<div class="alert alert-primary" role="alert">
				<hr>
				<h4 class="alert-heading"> Controle de Estoque </h4>
				<p>Para contagem de estoque</p>
			</div>

			<div class="alert alert-primary" role="alert">
				<div class="row justify-content-center">
					<strong> ESTOQUE </strong>
				</div>
			</div>


				<div class="alert alert-primary" role="alert">
				<div class="row justify-content-center">
					<strong> Quantidade de Produtos em Estoque </strong>
				</div>
			</div>


			<div class="container">
				<form action="" method="post">
				<div class="form-grupo">
					<!-- Concatenando html com php -->
					<?php
						include "conexao.php";

						//Para produtos tipo1
						$query = "SELECT count(codigo) as total1 from produtos WHERE tipo=1";
						$result1 = mysqli_query($conexao, $query);
						$qtd1 = mysqli_fetch_assoc($result1);		

						//Para produtos tipo2
						$query = "SELECT count(codigo) as total2 from produtos WHERE tipo=2";
						$result2 = mysqli_query($conexao, $query);
						$qtd2 = mysqli_fetch_assoc($result2);
						
					?> 
					<table class="table table-striped table bordered">
					<!-- <caption>Acesso dos Funcionários ao Estoque</caption> -->
						<thead class='table-succes'>
							<tr>
								<th>Calculadoras</th>	
								<th>Réguas</th>						
							</tr>	
						</thead>

							<tbody>
								<tr>
									<td><?php echo $qtd1['total1']; ?></td>		
									<td><?php echo $qtd2['total2']; ?></td>		
								</tr>
								
							</tbody>
					</table>
	<div class="container">
		<form action="" method="post">
			<div class="form-grupo">

				<div class="alert alert-primary" role="alert">
				<div class="row justify-content-center">
					<strong> Produtos em Estoque </strong>
				</div>
			</div>

				<!-- Concatenando html com php -->
				<?php
					include "conexao.php";
				

					$sql = "SELECT * FROM produtos"; 
					$resultado = mysqli_query($conexao,$sql) or die (mysqli_error($conexao));
					
				?> 
				<table class="table table-striped table bordered">
				<!-- <caption>Acesso dos Funcionários ao Estoque</caption> -->
					<thead class='table-succes'>
						<tr>
							<th>Produto</th>							
							<th>Código</th>
						</tr>	
					</thead>

					<?php
					

					//Gravou o resultado no array linha e passou para as variaveis locais
						while ($linha=mysqli_fetch_array($resultado)){
							$tipo = $linha["tipo"];
							$codigo = $linha["codigo"];
							$produto = $linha["produto"];
							
						?>
						<tbody>
							<tr>
								<td><?php echo "$produto"; ?></td>
								<td><?php echo "$codigo"; ?></td>
							</tr>

				<?php
			}
						mysqli_close($conexao);
							?>
						
						</tbody>
				</table>


			</div>
		</div>
	<br>
	</form>
		</div>
	</body>
</html>