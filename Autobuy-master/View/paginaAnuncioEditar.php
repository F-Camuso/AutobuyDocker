<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php"); ?>
	<link rel="stylesheet" type="text/css" href="View/css/estiloAnuncioEditar.css">
	<link rel="stylesheet" type="text/css" href="View/css/estiloAnuncio.css">
	<title>Edite seu anuncio</title>
</head>
<body>
	
	<?php include("includes/js.php"); ?>
	<?php include("includes/header.php"); ?>
	
	<div id="boxTitulo" class="container">
		<?php 
		foreach ($carrosEspecificados as $row);
		$_SESSION['plaka'] = $_GET['placa'];
	 	echo "<h1>".$row['marca']." ".$row['modelo']."</h1>";?>

	</div>
	<!-- ------------- IMAGENS ------------- -->
	<div id="boxConteudo"  class="borda container">
		<div >
			<!-- ------------- Características do carro ------------- -->
				<!-- ------------- DETALHES DO CARRO ------------- -->
				<div class="detalhesCarro boxCarro card">
					<h3>Informações do carro</h3>
				<form class="formulario" action="index.php?action=alterarAnuncio" method="post">
		<!-- 		<div class="itensCarro container"><label>fotos: </label>
				  <input type='file' name='files[]' 
				  multiple />
				</div>
 -->
				<div class="form-goup formEmement">
					<label>placa: </label>
					<input class="form-control" type="text" placeholder="<?php echo $row['placa']; ?>" id="placa" name="placa">
				</div>
					<div class="form-goup formEmement">
					<label>marca: </label>
					<input class="form-control" type="text" placeholder="<?php echo $row['marca']; ?>" id="marca" name="marca">
				</div>
				<div class="form-goup formEmement">
					<label>Modelo: </label>
					<input class="form-control" type="text" placeholder="<?php echo $row['modelo']; ?>" id="modelo" name="modelo">
				</div>
				<div class="form-goup formEmement">
					<label>Ano: </label>
					<input class="form-control" type="text" placeholder="<?php echo $row['ano']; ?>" id="ano" name="ano">
				</div>
				    <div class="form-goup formEmement">
					<label>Cor: </label>
					<input class="form-control" type="text" placeholder="<?php echo $row['cor']; ?>" id="cor" name="cor">
		              
				</div>
				<div class="form-goup formEmement">
					<label>Quilometragem: </label>
					<input class="form-control" type="text" placeholder="<?php echo $row['quilometragem']; ?>" id="quilometragem" name="quilometragem">
				</div>

				<div class="form-goup formEmement">
					<label>Categoria: </label>
					<select name="tipo" id="tipo" class="custom-select" onchange="enviarTipo(this.value);">
		              	<option value="Usado" selected>Usado</option>
		              	<option value="Novo">Novo</option>
		              </select>
				</div>	

				<div class="form-goup formEmement">
					<label>Descricao: </label>
					<textarea name="descricao" rows='5' cols='95' placeholder="<?php echo $row['descricao']; ?>"></textarea>
				</div>

				<div class="form-goup formEmement">
					<label>Valor: </label>
					<input class="form-control" type="number" name="valor" placeholder="<?php echo $row['valor']; ?>">
				</div>	

				<br>
				<button class="btn btn-primary" type="submit">Alterar</button>
				<button class="btn " type="reset">Limpar</button>
				</form>
				</div>
					
				
				</div>
				

				<!-- ------------- DETALHES DO CARRO ------------- -->
				<div class="detalhesCarro boxCarro card">
					<form method="post" action="Index.php?action=removerAnuncio">
						<h3>Excluir anuncio</h3>
						<span>Deseja excluir esse anúncio?</span>
						<?php echo "<input type='hidden' id='placa' name='placa' value='".$row['placa']."'>" ?>
						<button type="submit" class="btn btn-danger">Excluir anúncio</button>
					</form>
				
				</div>   	
		</div>
	</div>

	<?php include("includes/footer.php"); ?>
</body>
</html>