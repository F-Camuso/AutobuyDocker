<!DOCTYPE html>
<html>
	
	<head>
		<?php include("includes/head.php"); ?>
		<link rel="stylesheet" type="text/css" href="View/css/estiloFinanciamento.css">
		<title>financiamento</title>

	</head>
	
	<body>
		
	
		<?php include("includes/js.php"); ?>
		<?php include("includes/header.php"); ?>

		<div class="container">
			<div class="entrada container card">
				<h1>Simulador financeiro</h1>
				<h6>Faça aqui a simulação de seu financiamento</h6>
				<form method="POST" action="#" action="Simular()">
					<div class="form-group">
						<label for="rendaMensal">Qual a sua renda men:</label>
						<input type="number" name="rendaMensal" step="0.1">
					</div>
					<div class="form-group">
						<label for="valorCarro">Preço do carro:</label>
						<input type="number" name="valorCarro" step="0.1">
					</div>
					<div class="form-group">
						<label for="valorPeriodo">Período de financiamento (em meses):</label>
						<input type="number" name="valorPeriodo">
					</div>
					<div class="form-group">
						<label for="valorEntrada">Valor de entrada:</label>
						<input type="number" name="valorEntrada" onkeyup="" step="0.1">
						<div id="iof">Valor do IOF a 3,38% a. a.:<span id="iof"></span></div>
					</div>
					<div class="form-group">
						<label for="valorTxJuros">Taxade juros a. m.:</label>
						<input type="number" name="valorTxJuros" step="0.1">
					</div>
					<div class="form-group">
						<label for="valorTxCadastro">Taxa de Cadastro:</label>
						<input type="number" name="valorTxCadastro" step="0.1">
					</div>
					<button class="btn btn-primary" type="submit">Simular</button>
				</form>
			</div>
			<?php
					if (isset($_POST['valorCarro'],$_POST['valorTxJuros'],$_POST['valorPeriodo'],$_POST['rendaMensal'])) {
						# code...
						$valorTotal = $_POST['valorCarro'] + $_POST['valorCarro']*($_POST['valorTxJuros']/100)*$_POST['valorPeriodo'];
						$valorParcela = $valorTotal/$_POST['valorPeriodo'];
						$comprometimento = ($valorParcela/$_POST['rendaMensal'])*100;
						}
					?> 

			<div class="saida card">
				<h1>Resultados</h1>
				<?php if (isset($_POST['valorCarro'])): ?>
				<div id="comprometimentoRenda">Comprometimento de Renda: <?php echo $comprometimento; ?></div>
				<div id="valorTotal">Valor Total Pago: <?php echo $valorTotal; ?></div>
				<div id="valorParcela">Valor de Parcela Mensal: <?php echo $valorParcela; ?></div>
				<?php endif ?>
			</div>
		</div>







		<?php include("includes/footer.php"); ?>

	</body>


</html>