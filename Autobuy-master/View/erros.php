<?php
switch ($_SESSION['status']) {
    case 0:
        ?><script> alert("Usuario cadastrado com sucesso\nRealize seu Login");
        window.location="index.php?action=logar";</script><?php
        
        break;
    case 10:
            ?><script> alert("Anuncio cadastrado com sucesso\n");
        window.location="index.php?action=gerenciarAnuncio";</script><?php
        break;
    case 20:
            ?><script> alert("Tu nao ta logado\n");
        window.location="index.php?action=logar";</script><?php
        break;
    case 21:
            ?><script> alert("Tem que criar um login\n");
        window.location="index.php?action=cadastrar";</script><?php
        break;
    case 30:
            ?><script> alert("Anuncio deletado \n");
        window.location="index.php?action=index";</script><?php
        break;
    case 40:
            ?><script> alert("Informacoes de usuario alteradas\n");
        window.location="index.php?action=usuario";</script><?php
        break;
    case 45:
            ?><script> alert("Informacoes do Anuncio alteradas\n");
        window.location="index.php?action=gerenciarAnuncio.php";</script><?php
        die;
        break;
    case 1:
        ?><script> alert("Preencha os campos em branco");
        history.back()</script><?php
        break;
    case 2:
        ?><script> alert("Erro de SQL");
        history.back()</script><?php
        break;
    case 3:
        ?><script> alert("Usuario ja cadastrado");
        window.location="index.php?action=cadastrar";</script><?php
        break;
    case 4:
        ?><script> alert("Usuario removido com sucesso");
        window.location="index.php";</script><?php
        break;
    case 5:
        ?><script> alert("Nome alterado com sucesso");
        window.location="index.php";</script><?php
        break;
    default:
         ?><script> alert("erro");
        window.location="index.php";</script><?php
        break;
} ?>
<!--<br><a href="index.php">Voltar ao site</a> -->