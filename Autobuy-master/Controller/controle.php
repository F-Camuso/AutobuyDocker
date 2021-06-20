<?php
session_start();

require './Model/factory.php';
require './Model/cliente.php';
require './Model/veiculo.php';
require './Model/anuncio.php';
require './Model/imagem.php';
$_GET['insertstatus'] = null;
class controler
{
    
    private $factory;

    public function __construct()
    {
        $this->factory = new factory();
        $this->handleRequest();
    }

    public function handleRequest()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $_SESSION['gerencia'] = 0;

        switch ($action) {

            case 'usuario':
                require 'View/paginaUsuario.php';
                break;

            case 'logar':
                require 'View/paginaLogin.php';
                break;

            case 'sair':
                require 'View/logout.php';
                break;
           
            case 'cadastrar':
                require 'View/paginaCadastro.php';
                break;
                
            case 'realizar-cadastro':
                if (!isset($_POST['email'],$_POST['nomeCliente'],$_POST['cpf'],$_POST['endereco'],$_POST['telefone'], $_POST['senha'])) {
                    $_SESSION['status'] = 1;
                } else {
                    $cliente = new cliente($_POST['email'],$_POST['nomeCliente'],$_POST['cpf'],$_POST['endereco'], $_POST['senha'], $_POST['telefone']);
                    $_SESSION['status'] = $this->factory->addClientes($cliente);
                }
                require 'View/erros.php';
                break;

            case 'realizar-login':

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                 
                    if (trim($_POST['email']) != '' && trim($_POST['senha']) != '') {
                        $usuario = $this->factory->logar($_POST['email'], $_POST['senha']);
                        if (isset($usuario)) {
                            $_SESSION['usuario'] = $usuario['nome'];
                            $_SESSION['rowUsuario'] = $usuario;
                            header("Location: index.php");
                            exit();
                        }else{
                            $_SESSION['status'] = 21;
                        }
                    }else{
                        $_SESSION['status'] = 1;
                    }
                }else{
                    if (isset($_SESSION['usuario'])) {
                      die();
                    }
                    $_SESSION['status'] = 6;
                }
                require 'View/erros.php';
                break;

            case 'comprar':
                $_GET['type'] = 0;
                $carros = $this->factory->carrosMenorPreco();
                // $_SESSION['carros_principais'] = $this->factory->carrosMenorPreco();
                require 'View/paginaCompras.php';
                break;

            case 'vender':
                require 'View/paginaVendas.php';
                break;

            case 'financiamento':
                require 'View/paginaFinanciamento.php';
                break;

            case 'gerenciarAnuncio':
                $carrosBuscados = $this->factory->buscaCarroByCliente($_SESSION['rowUsuario']['idCliente']);
                $_SESSION['gerencia'] = 1;
                require 'View/paginaGerenciarAnuncio.php';
                break;
          
            case 'removerAnuncio':
                $_SESSION['status'] = $this->factory->removerAnuncio($_POST['placa']);
                require 'View/erros.php';
                break;
                
            case 'usuarioEditar':
                require 'View/paginaUsuarioEditar.php';
                break;   
            
            case 'criar-anuncio':    
                if (isset($_SESSION['usuario'])) {
                    if (!isset($_POST['placa'], $_POST['marca'],$_POST['ano'],$_POST['cor'],$_POST['quilometragem'],$_POST['modelo'],$_POST['tipo'],$_POST['descricao'], $_POST['valor'])) {
                        $_SESSION['status'] = 1;
                    } else {
                        $veiculo = new veiculo($_POST['placa'], $_POST['marca'],$_POST['ano'],$_POST['cor'],$_POST['quilometragem'],$_POST['modelo'], $_POST['tipo']);
                        $anuncio = new anuncio($_POST['descricao'], $_POST['valor']);
                        $countfiles = count($_FILES['files']['name']);
                        $_SESSION['status'] = $this->factory->addAnuncio($veiculo, $anuncio);
                    }
                }else{
                    $_SESSION['status'] = 20;
                }
                require 'View/erros.php';
                break;

            // só para testes
            
            case 'anuncioEditar':
                $carrosEspecificados = $this->factory->buscaCarroPlaca($_GET['placa']);

                // $carrosBuscados = $this->factory->buscaCarroRapido($carrosEspecificados[0]['marca'],null);
                require 'View/paginaAnuncioEditar.php';
                break;
          
            case 'anuncioEspecificacao':
                $carrosEspecificados = $this->factory->buscaCarroPlaca($_GET['placa']);
                $contarImagens = $this->factory->contaImagem($_GET['placa']);
                $carrosParecidos = $this->factory->buscaCarroIgual($carrosEspecificados[0]['marca'],$carrosEspecificados[0]['placa']);
                $telefoneEmail = $this->factory->getInfo($carrosEspecificados[0]['idCliente']);
                // $carrosBuscados = $this->factory->buscaCarroRapido($carrosEspecificados[0]['marca'],null);
                require 'View/paginaAnuncio.php';
                break;
           

            case 'busca-principal':
                if(trim($_POST['busca-rapida']) != ''){
                    $separa =  array_pad(explode(' ',$_POST['busca-rapida']), 2, null);

                    $carrosBuscados = $this->factory->buscaCarroRapido($separa[0],$separa[1]);
                    
                    $_GET['type'] = 1;

                    require 'View/paginaCompras.php';
                }else{
                    $_SESSION['status'] = 1;
                    require 'View/erros.php';
                }
            break;

             case 'busca-completa':  
                $carrosBuscados = $this->factory->buscaCarroCompleta($_POST['marca'],$_POST['modelo'], $_POST['ano'], $_POST['preco'], $_POST['quilometragem'], $_POST['tipo']);
                $_GET['type'] = 1;
                require 'View/paginaCompras.php';
                break;

            case 'listar':
                $this->factory->listarClientes();
                break;

            case 'alterar':
                $_SESSION['status'] = $this->factory->alterarCliente();
                require 'View/erros.php';
                break;

            case 'alterarAnuncio':
                $countfiles = count($_FILES['files']['name']);
                $_SESSION['status'] = $this->factory->alterarAnuncio();
                require 'View/erros.php';
                break;
                 
            case 'remover':
                $_SESSION['id'] = $_SESSION['rowUsuario']['idCliente'];
                $_SESSION['status'] = $this->factory->removerClientes();
                $_SESSION['usuario'] = null;
                require 'View/erros.php';
                break;
     
  
            // chat - porem não funcional :(

            // case 'iniciar-chat':
            //     $chat = $this->factory->iniciarChat($_SESSION['rowUsuario']['idCliente'],$_POST['idClienteAnuncio']);
            //     require 'View/chat.php';
            //     break;
      



            default:
                $carros = $this->factory->carrosMenorPreco();
                $_SESSION['carros_principais'] = $this->factory->carrosMenorPreco();
                require 'View/paginaPrincipal.php';
                break;
     


        }

    }
}

