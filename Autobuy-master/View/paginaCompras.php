<!DOCTYPE html>
<html>
	
	<head>
		<?php include("includes/head.php"); ?>
		<title>Compras</title>
	</head>
	
	<body>
		
		<?php include("includes/js.php"); ?>
		<?php include("includes/header.php"); ?>

		<div class="container clear">

		<div class="col-md-9 floatLeft">
		<?php if ($_GET['type'] != 1){ ?>
				
			
				<?php include("anunciosPaginaPrincipal.php"); ?>				
			
		<?php }else{ ?>
				
					<?php include("anunciosBusca.php"); ?>		
						
				
		<?php } ?>
			</div>
			<div class="col-md-3 floatLeft">
				Busca
				<!----------------------- Marca ----------------------->
				<form method="POST" action="index.php?action=busca-completa">
		        <div class="container busca-rapida card">
		            <div class="form-group container">
		              <label for="modelo">Digite a marca:</label>
	                 	<input type="text" id="marca" name="marca" class="form-control" placeholder = 'Digite todasMarcas para todos...' onchange="submit()">
		            </div>
		        </div>
		        <!----------------------- Modelo ----------------------->
		        <div class="container busca-rapida card">
		            <div class="form-group container">
		              <label for="modelo">Digite o modelo:</label>
	                 	<input type="text" id="modelo" name="modelo" class="form-control" placeholder="Digite todosModelos para todos..." onchange="submit()">
		            </div>
		        </div>
		        <!----------------------- Ano ----------------------->
		        <div class="container busca-rapida card">
		        
		            <div class="form-group container">
		              <label for="ano">Ano:</label>
			           <input type="number" name="ano" id="ano" class="form-control" placeholder="2020" min="1950" max="2025" onchange="submit()">
			              
		            </div>

		        </div>
		      
		        <!----------------------- Preco ----------------------->
		        <div class="container busca-rapida card">
		            <div class="form-group container">
		              <label for="preco">Preço:</label>
		              <input type="number" id="preco" name="preco" class="form-control" placeholder="de" min="10000" onchange="submit()">
		            </div>
		        </div>
		        
		       	<!----------------------- Quilometragem -----------------------> 
		       	<div class="container busca-rapida card">
		            <div class="form-group container">
		              <label for="quilometragem">Quilometragem:</label>
		              <input type="number" id="quilometragem" name="quilometragem" class="form-control" placeholder="mínima" min="0" max="900000" onchange="submit()">
					</div>
		        </div>
		     
		        <!----------------------- Tipo ----------------------->
 	        <div class="container busca-rapida card">
		            <div class="form-group container">
                    <label for="tipo">Tipo:</label>
		              <select name="tipo" id="tipo" class="custom-select" onchange="submit()">
		              	<option value="" ></option>
		              	<option value="todos">Todos</option>
		              	<option value="Novo">novo</option>
		              	<option value="Usado">usado</option>
		              	
		              </select> 
					</div>
			</div>
			</form>
		    
			</div>
		</div>

		<?php include("includes/footer.php"); ?>

	</body>


</html>