  <!-- TRABALHAR AQUI ATÉ CONSEGUIR FAZER ACESSO DE USUÁRIO -->

    <link rel="stylesheet" type="text/css" href="View/css/estilo.css">
    <nav class="navbar navbar-default cabecalho ">
    
      <div class="container ">

        <div class="navbar-header ">
          <a href="index.php" class="navbar-brand"><img src="View/css/autobuy2semfundo.png" alt="logotipo" height="100" width="100"></a>
        </div>

        
        <ul class="nav ">
          <li>
            <a class="nav-link" href="index.php?action=comprar">Comprar</a>
          </li>
          <li>
            <a class="nav-link" href="index.php?action=vender">Vender</a>
          </li>
          <li>
            <a class="nav-link" href="index.php?action=financiamento">Financiamento</a>
          </li>
        <?php
          if (isset($_SESSION['usuario'])) {
            $user['nome'] = $_SESSION['usuario'];
        ?>
        <li>
          <a class="nav-link" href="index.php?action=usuario"><?php echo $user['nome']; ?></a>
        </li>
        <li>
          <a class="nav-link" href="index.php?action=sair">sair</a>
        </li>
        <?php 
          }else{ 
        ?>
          <li class="nav-link">|</li>

          <li>
            <a href="index.php?action=cadastrar" class="nav-link">Cadastrar</a>
          </li>
          <li>

          <a href="index.php?action=logar" class="nav-link">Logar</a>
        
        <?php }?>
          </li>
        </ul>
      </div>
    </nav>


