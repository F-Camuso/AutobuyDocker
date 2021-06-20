<!DOCTYPE html>


<html>
	<head>
		<title>Autobuy</title>
		<?php include("includes/head.php"); ?>
	</head>
	<body class="borda">

		<?php include("includes/js.php"); ?>
	
		<?php include("includes/header.php"); ?>

		<div class="container">
      <div>
        <!--Mecanismo de buscas-->
        <div class="container busca-rapida card">
          <form method="POST" action="index.php?action=busca-principal">
            <div class="form-group container">
              <label for="busca-rapida">Digite a marca e o modelo:</label>
              <input type="text" name="busca-rapida" class="form-control" id="busca-rapida"><br>
              <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
          </form>
        </div>

        <?php include("anunciosPaginaPrincipal.php") ?>
        
      </div>
    </div>

		<?php include("includes/footer.php"); ?>

	</body>


</html>