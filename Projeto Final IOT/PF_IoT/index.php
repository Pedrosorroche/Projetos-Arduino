<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Estilo Css -->
		<link rel="stylesheet" href="css/estilo.css">
        
    <title>Sistema IoT Controle de Estoque</title>
  </head>
  <body onload="load()"> <!-- Aqui chama a funcao que executa a cada 30s -->
    <header><!--Inicio Cabeçalho-->
        <nav class="navbar navbar-expand-lg bg-color">
            <div class="container">
                <!--Logo-->   
                <h3 class="mx-auto mt-1 d-block">Sistema IoT Controle de Estoque</h3>                
            </div>
        </nav>
    </header><!--Fim Cabeçalho-->
    <main class="fundo">
        <div class="container sist mt-5">
		
			<div class="alert alert-dark mt-2" role="alert">
				<div class="row justify-content-center">
					<h2> Registro de Entrada e Saída</h2>>
				</div>
			</div>

			<div class="container">
		        <form action="" method="post">
                <div class="form-grupo">
                    <!-- Concatenando html com php -->
                    <?php
                        include "conexao.php";
                        $sql = "SELECT * FROM ponto"; 
                        $resultado = mysqli_query($conexao,$sql) or die (mysqli_error($conexao));
                    ?> 
                    <table class="table table-striped table bordered">
                    <!-- <caption>Acesso dos Funcionários ao Estoque</caption> -->
                        <thead class='table-succes'>
                            <tr>
                                <th>Matrícula</th>
                                <th>Funcionário</th>
                                <th>Data/Hora</th>
                            </tr>	
                        </thead>
                        <?php
                        //Gravou o resultado no array linha e passou para as variaveis locais
                            while ($linha=mysqli_fetch_array($resultado)){
                                $id_cartao = $linha["id_cartao"];
                                $data_hora = $linha["data_hora"];
                                $funcionario = $linha["funcionario"];
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo "$id_cartao"; ?></td>
                                    <td><?php echo "$funcionario"; ?></td>
                                    <td><?php echo "$data_hora"; ?></td>
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

        <div class="container sist mt-5">			
			<div class="alert alert-dark mt-2" role="alert">
				<div class="row justify-content-center">
					<h2> ESTOQUE </h2>>
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
								<th>Produto A</th>	
								<th>Produto B</th>						
							</tr>	
						</thead>

							<tbody>
								<tr>
									<td><?php echo $qtd1['total1']; ?></td>		
									<td><?php echo $qtd2['total2']; ?></td>		
								</tr>
								
							</tbody>
					</table>
	
	<br>
	</form>
		</div>

        
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
<!--
	 Aqui o java script atualiza a pagina de forma automatica a cada 30s
	-->
	<script type="text/javascript">
		function load()
		{
			setTimeout("window.open(self.location, '_self');", 3000);
		}
	</script>
    </body>
</html>