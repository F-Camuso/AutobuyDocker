<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php"); ?>
	<link rel="stylesheet" type="text/css" href="View/css/estiloAnuncio.css">
	<?php 
	foreach ($carrosEspecificados as $row);
	echo "<title>".$row['marca']." ".$row['modelo']."</title>";?>
</head>
<body>
	
	<?php include("includes/js.php"); ?>
	<?php include("includes/header.php"); ?>
	
	<div id="boxTitulo" class="container">
		<?php echo "<h1>".$row['marca']." ".$row['modelo']."</h1>";?>
	</div>
	<!-- ------------- IMAGENS ------------- -->
	<div id="boxImagens" class="container card">
		<div id="carouselExampleControls" class="carousel slides" data-ride="carousel">
	        <div class="carousel-inner">

				 <?php for($i = 0 ;$i < $contarImagens[0]["contar"];$i++){ 
					 if($i == 0){
						echo "<div class='carousel-item active'>";
					}else{
						echo "<div class='carousel-item'>";
						
					 }
					 	// mudar o src 
						echo "<img class='img-fluid d-block w-30 mx-auto size' alt='Responsive image 1' src='../Model/upload/".$carrosEspecificados[$i]['foto']."'>";
						echo "</div>";
					 
				}?>
				
	      	</div>
	      	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	          <span class="sr-only">Anterior</span>
	        </a>
	        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	          <span class="carousel-control-next-icon" aria-hidden="true"></span>
	          <span class="sr-only">Próximo</span>
	        </a>
	    </div>
	</div>
	<div id="boxConteudo"  class="container">
		<div class="row">
			<!-- ------------- PRINCIPAL ------------- -->
			<div id="boxConteudoPrincipal"  class="col-sm-8">
				
				<!-- ------------- DETALHES DO CARRO ------------- -->
				<div class="detalhesCarro card">
					<h3>Detalhes do carro</h3>
					<div class="itensDetalhes">
						<table class="table table-borderless">
							<tr>
								<td>
									<span class="itemTitulo">Ano</span>
									<br/>
									<?php echo "<span class='itemDescricao'>".$row['ano']."</span>"; ?>
									
								</td>
								<td>
									<span class="itemTitulo">Quilometragem</span>
									<br/>
									<?php echo "<span class='itemDescricao'>".$row['quilometragem']."</span>"; ?>
								</td>
								<td>
									<span class="itemTitulo">Modelo</span>
									<br/>
									<?php echo "<span class='itemDescricao'>".$row['modelo']."</span>"; ?>
								</td>
								<td>
									<span class="itemTitulo">Cor</span>
									<br/>
									<?php echo "<span class='itemDescricao'>".$row['cor']."</span>"; ?>
								</td>
								<td>
									<span class="itemTitulo">Marca</span>
									<br/>
									<?php echo "<span class='itemDescricao'>".$row['marca']."</span>"; ?>
								</td>
							</tr>
						</table>
					</div>
					<div class="DescricaoCarro">
						<h6>Sobre este carro</h6>
						<p>
						<?php echo "<p>".$row['descricao']."</p>"; ?>
						</p>
					</div>
				</div>
				<!-- ------------- DETALHES DO VENDEDOR ------------- -->
		<!-- 		<div class="avaliacao card">
					<h3>Avaliacao sobre o carro</h3>
					<div>
						<table class="table table-borderless">
							<tr>
								<td>
									<span class="itemTitulo">Conforto</span>
									<br/>
									<span class="itemDescricao">7,5</span>
								</td>
								<td>
									<span class="itemTitulo">Consumo</span>
									<br/>
									<span class="itemDescricao">14km/l</span>
								</td>
								<td>
									<span class="itemTitulo">Custo Benefício</span>
									<br/>
									<span class="itemDescricao">6,0</span>
								</td>
								<td>
									<span class="itemTitulo">Design</span>
									<br/>
									<span class="itemDescricao">Moderno, e aerodinâmico. Chama bastante atenção.</span>
								</td>
							</tr>
							<tr>
								<td>
									<span class="itemTitulo">Dirigibilidade</span>
									<br/>
									<span class="itemDescricao">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									</span>
								</td>
								<td>
									<span class="itemTitulo">Manutenção</span>
									<br/>
									<span class="itemDescricao">Nos dois anos de uso o carro precisou apenas de duas manutenções simples.</span>
								</td>
								<td>
									<span class="itemTitulo">Opinião do vendedor</span>
									<br/>
									<span class="itemDescricao">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>
								</td>
							</tr>
						</table>
					</div>
				</div> -->
				<!-- ------------- OUTROS CARROS PARECIDOS ------------- -->
				<div class="outrosCarros card">
					<h3>Outros carros parecidos</h3>
					<?php include("anunciosParecidos.php"); ?>	
					


					
				</div>
			</div>
				<!-- ------------- ASIDE ------------- -->
				<div id="boxConteudoAside"  class="col-sm-4">
					<div class="asideConteudo card">
						<div class="container">
							<div class="header">
								<?php 
	foreach ($carrosEspecificados as $row);
								echo "<span class='preco'> R$".$row['valor']."</span><br>
								" ?>
							</div>
							<div class="mensagemComprador">
							<br>
							<style>
								#myDIV{
									display: none;
									text-align: center;
								}
							</style>
							<script type="text/javascript">
								function myFunction() {
								  	var x = document.getElementById("myDIV");
										if (x.style.display === "block") {
									    	x.style.display = "none";
									  	} else {
									    	x.style.display = "block";
									  	}
									}
							</script>
							<button class='btn btn-primary btn-block'  onclick="myFunction()">Entre em contato</button>
							<div	id="myDIV">
								<?php
									foreach ($telefoneEmail as $key);
								 echo "TELEFONE: ".$key['telefone']."<br>";
									  echo "EMAIL: ".$key['email']."<br>";
								?>
							</div>
							</div>
						</div>	
					</div>
				</div>
		</div>
	</div>

	<?php include("includes/footer.php"); ?>
</body>
</html>