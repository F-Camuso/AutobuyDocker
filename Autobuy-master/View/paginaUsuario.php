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
						<a href="index.php?action=usuarioEditar">Editar meus dados</a>
					</div>
				</div>

				<div class="dados col-sm-9">
					<!--CÓDIGO PHP PRA PEGAR DADOS DO USUÁRIO-->
					
					<div class="boxDados">
						<h4>Seus dados</h4>
						<?php 
							
							if (isset($_SESSION['rowUsuario'])) {
								$usuario = $_SESSION['rowUsuario'];
								
							
						?>
						<div class="boxDadosCampo">
							Nome:
							<div>
								<?php
									echo $usuario['nome'];
								?>
							</div>
						</div>
						<div class="boxDadosCampo">
							Email: 
							<div>
								<?php
									echo $usuario['email'];
								?>
							</div>
						</div>
						<div class="boxDadosCampo">
							Endereço:
							<div>
								<?php
									echo $usuario['endereco'];
								?>
							</div>
						</div>
						<div class="boxDadosCampo">
							CPF:
							<div>
								<?php
									echo $usuario['cpf'];
								?>
							</div>
						</div>
						<div class="boxDadosCampo">
							Telefone:
							<div>
								<?php
									echo $usuario['telefone'];
								?>
							</div>
						</div>
						<div class="boxDadosCampo">
							Senha:
							<div>
								<?php
									echo $usuario['senha'];
								?>
							</div>
						</div>
						<?php 
							}
						?>
					</div>


				</div>
			</div>

		</div>

		<?php include("includes/footer.php"); ?>
	
	</body>
	

</html>