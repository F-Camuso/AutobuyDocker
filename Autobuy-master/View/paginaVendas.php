<!DOCTYPE html>


<html>

<head>
	<title>Vender</title>
	<?php include("includes/head.php"); ?>
	<link rel="stylesheet" type="text/css" href="View/css/estiloLogin.css">
</head>

<body>

	<?php include("includes/js.php"); ?>
	<?php include("includes/header.php"); ?>



	<div class="container">
		<div class="formularioDiv card col-md-8 float marginTop">
			<form action="index.php?action=criar-anuncio" method="post" class="formulario" enctype='multipart/form-data'>
				<h1>Anuncie seu carro</h1>
				<div class="form-goup formEmement">
				
				<label>fotos: </label>
				  <input type='file' name='files[]' 
				  multiple />
				</div>

				<div class="form-goup formEmement">
					<label>placa: </label>
					<input class="form-control" type="text" name="placa" placeholder="ABC-1234">
				</div>
					<div class="form-goup formEmement">
					<label>marca: </label>
					<input class="form-control" type="text" name="marca" placeholder="Ex: BMW, PEGOUT">
				</div>
				<div class="form-goup formEmement">
					<label>Modelo: </label>
					<input class="form-control" type="text" name="modelo" placeholder="ex: Argo, Uno, etc">
				</div>
				<div class="form-goup formEmement">
					<label>Ano: </label>
					<input class="form-control" type="number" name="ano" placeholder="ex: 2015, 2018"  min="1900" max="2025" pattern="\d{4}">
				</div>
				    <div class="form-goup formEmement">
					<label>Cor: </label>
					
		            <input type="radio" name="cor" value="branco">
		            <label  for="branco">Branco</label>
		              
		            <input type="radio" name="cor" value="azul">
		            <label  for="azul">Azul</label>
		              
		            <input type="radio" name="cor" value="Amarelo">
		            <label  for="amarelo">Amarelo</label>
		              
		            <input type="radio" name="cor" value="preto">
		            <label  for="preto">Preto</label>
		              
		            <input type="radio" name="cor" value="verde">
		            <label  for="verde">Verde</label>
		              
				</div>
				<div class="form-goup formEmement">
					<label>Quilometragem: </label>
					<input class="form-control" type="number" name="quilometragem" placeholder="ex: 0, 50.000" min="0" max="900000">
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
					<textarea name='descricao' rows='5' cols='95'></textarea>
					<!-- < class="form-control" type="text" name="descricao" placeholder="bla bla bla"> -->
				</div>

				<div class="form-goup formEmement">
					<label>Valor: </label>
					<input class="form-control" type="number" name="valor" placeholder="ex: 100000,00" min="10000">
				</div>	

				<br>
				<button class="btn btn-primary" type="submit">Anuncie agora!</button>
				<button class="btn btn-primary" type="reset">Limpar</button>
			</form>
		</div>
	</div>

	<!--* <select name="Marca">
						<option value="BMW">Formulários</option>
						<option value="GM/Chevrolet">JAVA</option>
						<option value="Dodge">VRML</option>
						<option value="Fiat">CHAT</option>
						<option value="Honda">Onde colocar</option>
						<option value="Hyundai">Onde Divulgar</option>
						<option value="Mercedes-Benz">Organizando às informações</option>
						<option value="Mitsubishi">Organizando às informações</option>
						<option value="Nissan">Organizando às informações</option>
						<option value="Peugeot">Organizando às informações</option>
						<option value="Toyota">Organizando às informações</option>
						<option value="Volkswagen">Organizando às informações</option>
						<option value="Volvo">Organizando às informações</option>
					</select>
-->

</body>

<?php include("includes/footer.php"); ?>

</html>