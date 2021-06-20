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
			<div class="row">
				<div class=" asideBorda col-sm-3">
					<a href="index.php?action=usuario">
						<h4>
							<?php echo $_SESSION['usuario']; ?>	
				        </h4>
					</a>
					
					<div>
						<a href="index.php?action=gerenciarAnuncio">Gerenciar meus anuncios</a><br>
						<a href="#">Editar meus dados</a>
					</div>
				</div>

				<div class=" dados col-sm-9">
					<form class="formulario" action="index.php?action=alterar" method="post">
						<h1>Editar</h1>	
						<div class="form-goup formEmement">
						    <label for="nomeCliente">Nome Completo</label>
						    <br>
						    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['rowUsuario']['nome']; ?>" id="nome" name="nome">
						</div>
						<div class="form-goup formEmement">
						    <label for="cpf">CPF</label>
						    <br>
						    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['rowUsuario']['cpf']; ?>" id="cpf" name="cpf" pattern="\d{3}.\d{3}.\d{3}-\d{2}">
						</div>
						<div class="form-goup formEmement">
						    <label for="endereco">Endereço</label>
						    <br>
						    <input class="form-control" type="text" placeholder="<?php echo $_SESSION['rowUsuario']['endereco']; ?>" id="endereco" name="endereco">
						</div>
						<div class="form-goup formEmement">
						    <label for="email">Email</label>
						    <br>
						    <input class="form-control" type="email" placeholder="<?php echo $_SESSION['rowUsuario']['email']; ?>" id="email" name="email">
						</div>
						<div class="form-goup formEmement">
						    <label for="telefone">Telefone</label>
						    <br>
						    <input class="form-control formEmement" type="text" placeholder="<?php echo $_SESSION['rowUsuario']['telefone']; ?>" id="telefone" name="telefone">
						</div>
						<div class="form-goup formEmement">
						    <label for="senha">Senha</label>
						    <br>
						    <input class="form-control formEmement" type="password" placeholder="<?php echo $_SESSION['rowUsuario']['senha']; ?>" id="senha" name="senha">
						</div>
						<br>
						<button class="btn btn-primary" type="submit">Editar</button>
					</form>
					<div class="boxExcluir">
						<hr>
						<h1>Excluir conta</h1>
						<form method="post" action="index.php?action=remover">
							<label>Deseja excluir sua conta?</label>
							<button type="submit" class="btn btn-danger" >Excluir conta</button>
						</form>
					</div>
				</div>
			</div>

		</div>

		<?php include("includes/footer.php"); ?>
	
	</body>
	

</html>