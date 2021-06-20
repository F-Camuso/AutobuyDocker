<!DOCTYPE html>


<html>
	<head>
		<title>Usuario</title>
		<?php include("includes/head.php"); ?>
		<link rel="stylesheet" type="text/css" href="View/css/estiloUsuario.css">
	</head>

	<body>
		<?php include("includes/js.php"); ?>
		<?php include("includes/header.php"); ?>

		<div class="container card contudoUsuario">
			<div class="row ">
				<div class="asideBorda col-sm-3">
					<a href="index.php?action=usuario">
						<h4>
							<?php echo $_SESSION['usuario']; ?>	
				        </h4>
					</a>
					<div>
						<a href="#">Gerenciar meus anuncios</a><br>
						<a href="index.php?action=usuarioEditar">Editar meus dados</a>
					</div>
				</div>

				<div class="dados col-sm-9">
					<div class="criarAnuncio">
						<h1>Criar novo anúncio</h1>
						<form method="post" action="index.php?action=vender">
							<label>Deseja criar novo anúncio?</label>
							<button type="submit" class="btn btn-danger">Criar novo anúncio</button>
						</form>
					</div>
					<br>
					<div class="meusAnuncios">
						<h1>Meus anúncios</h1>
						<?php include("anunciosBusca.php"); ?>
					</div>
			          
				</div>
			</div>

		</div>

		<?php include("includes/footer.php"); ?>
	
	</body>
	

</html>