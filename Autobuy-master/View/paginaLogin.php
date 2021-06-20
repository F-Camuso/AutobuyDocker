<!DOCTYPE html>

<html>
	<head>
		<title>Login Autobuy</title>
		<?php include("includes/head.php"); ?>
		<link rel="stylesheet" type="text/css" href="View/css/estiloLogin.css">
	</head>
	<body>

		<?php include("includes/js.php"); ?>

		<?php include("includes/header.php"); ?>
		
		<div class="container">
			<div class=" col-md-8 float marginTop">
				<!-- <img src="View/css/autobuy2semfundo.png" alt="logotipo"> -->
			</div>
			<div class="formularioDiv card col-md-4 float marginTop">
				<form class="formulario" action="index.php?action=realizar-login" method="POST">
					<h1>Login</h1>	
					<div class="form-goup formEmement">
					    <label for="email">Email</label>
					    <br>
					    <input class="form-control" type="email" placeholder="ex.: josesilva@email.com" id="email" name="email">
					</div>
					<div class="form-goup formEmement">
					    <label for="senha">Senha</label>
					    <br>
					    <input class="form-control formEmement" type="password" placeholder="ex.: f438gf834" id="senha" name="senha">
					</div>
					<button class="btn btn-primary" type="submit">SUBMIT</button>
				</form>
			</div>
		</div>


		
		
		
		<?php include("includes/footer.php"); ?>

	</body>
</html>
