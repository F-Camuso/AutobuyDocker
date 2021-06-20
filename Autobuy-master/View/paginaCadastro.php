<!DOCTYPE html>

<html>
	<head>
		<title>Cadastro Autobuy</title>
		<?php include("includes/head.php"); ?>
		<link rel="stylesheet" type="text/css" href="View/css/estiloLogin.css">
	</head>
	<body>

		<?php include("includes/js.php"); ?>

		<?php include("includes/header.php"); ?>
		
		<div class="container">
			
			<div class="formularioDiv card col-md-8 float marginTop">
				<form class="formulario" action="index.php?action=realizar-cadastro" method="post">
					<h1>Cadastre-se</h1>	
					<div class="form-goup formEmement">
					    <label for="nomeCliente">Nome Completo</label>
					    <br>
					    <input class="form-control" type="text" placeholder="ex.: José Silva" id="nomeCliente" name="nomeCliente">
					</div>
					<div class="form-goup formEmement">
					    <label for="cpf">CPF</label>
					    <br>
					    <input class="form-control" type="text" placeholder="ex.: 123.456.789-00" id="cpf" name="cpf" pattern="\d{3}.\d{3}.\d{3}-\d{2}">
					</div>
					<div class="form-goup formEmement">
					    <label for="endereco">Endereço</label>
					    <br>
					    <input class="form-control" type="text" placeholder="ex.: Rua José Silva" id="endereco" name="endereco">
					</div>
					<div class="form-goup formEmement">
					    <label for="email">Email</label>
					    <br>
					    <input class="form-control" type="email" placeholder="ex.: josesilva@email.com" id="email" name="email">
					</div>
					<div class="form-goup formEmement">
					    <label for="telefone">Telefone</label>
					    <br>
					    <input class="form-control" type="telefone" placeholder="ex.: 67987654321" id="telefone" name="telefone">
					</div>
					<div class="form-goup formEmement">
					    <label for="senha">Senha</label>
					    <br>
					    <input class="form-control formEmement" type="password" placeholder="ex.: f438gf834" id="senha" name="senha">
					</div>
					<button class="btn btn-primary" type="submit">SUBMIT</button>
				</form>
			</div>
			<div class=" col-md-4 float marginTop">
	<!-- 		<img src="View/css/autobuy2semfundo.png" alt="logotipo"> -->
				
			</div>
		</div>


		
		
		
		<?php include("includes/footer.php"); ?>

	</body>
</html>
