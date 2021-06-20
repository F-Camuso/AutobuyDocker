<div class="secaoAnuncio">
  
  <h1 class="red">Melhores Ofertas</h1>
  <?php 
    if ($carros == NULL) {
      echo "por enquanto nada aqui :(";
    }else{
    foreach ($carros as $row) { ?>
      <!-- ANUNCIO: -->
      <div class="anuncio col-sm-6 col-md-4 col-lg-3 ">  
        <div class="card anuncio_borda">
          <?php 
          $placa = $row['placa'];
          echo "<a href='index.php?action=anuncioEspecificacao&placa=$placa'>";
        // mudar o src
         echo "<img class='img-fluid' alt='Fiat Argo' src='../Model/upload/".$row['foto']."'>";
          ?>          
            <div class="container">
            <span class="modelo-anuncio"><?php echo $row['marca']." ".$row['modelo']; ?> </span>
            <br>
            <div class="preco-anuncio"><?php echo "R$". $row['valor']; ?></div>
            </div>
          </a>
        </div>
      </div> 
<?php } }?>
</div>