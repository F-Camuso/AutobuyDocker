<?php

class factory
{

    public $file_db;

    public function __construct()
    {
        try{
        
            $this->file_db = new PDO('sqlite:DBAutobuy.sqlite');
        }catch(PDOException $ex){
            throw new PDO ( $ex->getMessage( ) , $ex->getCode( ) );
        }
        

        // Set errormode to exceptions
        $this->file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->file_db->exec("CREATE TABLE IF NOT EXISTS cliente(
            idCliente integer PRIMARY KEY AUTOINCREMENT,
            email varchar(45) NOT NULL,
            nome varchar(45) NOT NULL,
            cpf char(11) NOT NULL,
            endereco varchar(45) NOT NULL,
            telefone varchar(45) NOT NULL,
            senha varchar(45) NOT NULL)");

        $this->file_db->exec("CREATE TABLE IF NOT EXISTS veiculo(
            placa char(8) PRIMARY KEY,
            marca varchar(45) NOT NULL,
            ano date NOT NULL,
            cor varchar(45) NOT NULL,
            quilometragem integer NOT NULL,
            modelo varchar(45) NOT NULL,
            tipo varchar(45) NOT NULL)");
        
        $this->file_db->exec("CREATE TABLE IF NOT EXISTS imagens(
            idImagem integer PRIMARY KEY AUTOINCREMENT,
            foto varchar(80) NOT NULL,
            placa char(8) NOT NULL,
            FOREIGN KEY (placa) REFERENCES 'veiculo' (placa))");

        $this->file_db->exec("CREATE TABLE IF NOT EXISTS anuncio(
            idAnuncio integer PRIMARY KEY AUTOINCREMENT,
            idCliente integer NOT NULL,
            placa char(8) NOT NULL,
            descricao text NOT NULL,
            valor real NOT NULL,
            FOREIGN KEY (idCliente) REFERENCES 'cliente' (idCliente),
            FOREIGN KEY (placa) REFERENCES 'veiculo' (placa))");

        $this->file_db->exec("CREATE TABLE IF NOT EXISTS chat(
            id integer PRIMARY KEY AUTOINCREMENT,
            idCliente integer NOT NULL,
            idClienteAnuncio integer NOT NULL,
            mensagem text,
           FOREIGN KEY (idCliente) REFERENCES 'cliente' (idCliente))");
    }

    public function __destruct()
    {
        try {
            // Close memory db connection
            $file_db = null;
            $memory_db = null;
        } catch (PDOException $e) {
            // Print PDOException message
            echo $e->getMessage();
        }
    }
    // FUNÇÕES ENVOLVENDO CLIENTES

    public function logar($email, $senha){
       
        $lista = $this->file_db->query('SELECT * FROM cliente');
        foreach ($lista as $row) {
            if ($row['email'] == $email && $row['senha'] == $senha)
                return $row;
        }
        return null;
    }
    public function getInfo($idCliente){
        $select = "SELECT telefone, email FROM cliente WHERE idCliente = :idCliente";
        $stmt = $this->file_db->prepare($select);
        $stmt->bindParam(':idCliente',$idCliente);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function addClientes($cliente)
    {
        if ($this->buscarClientes($cliente->email) == null) {
            try {

                $insert = "INSERT INTO cliente (idCliente, email, nome,cpf,endereco,telefone, senha)
                    VALUES (null, :email, :nome,:cpf,:endereco,:telefone, :senha)";
                    //Mudar o 1 pra 2 quando adicionar novo cliente(so to fazendo teste mesmo)
                    
                $stmt = $this->file_db->prepare($insert);
                $stmt->bindParam(':email', $cliente->email);
                $stmt->bindParam(':nome', $cliente->nome);
                $stmt->bindParam(':cpf', $cliente->cpf);
                $stmt->bindParam(':endereco', $cliente->endereco);
                $stmt->bindParam(':telefone', $cliente->telefone);
                $stmt->bindParam(':senha', $cliente->senha);
                $stmt->execute();
                return 0;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return 2;
            }
        } else {
            return 3;
        }
    }

    public function buscarClientes($email)
    {
        $lista = $this->file_db->query('SELECT * FROM cliente');
        foreach ($lista as $row) {
            if ($row['email'] == $email)
                return $row;
        }
        return null;
    }

    public function buscarClientesById($id)
    {
        $lista = $this->file_db->query('SELECT * FROM cliente');
        foreach ($lista as $row) {
            if ($row['idCliente'] == $id)
                return $row;
        }
        return null;
    }

    //remover cliente
    public function removerClientes(){
        $id = $_SESSION['id'];
        try {

            try {
                $delete = "DELETE FROM anuncio WHERE idCliente = :idCliente";
                $stmt = $this->file_db->prepare($delete);
                $stmt->bindParam(':idCliente',$id);
                $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            $sql = "DELETE FROM cliente WHERE idCliente = :idCliente";
            $stmt = $this->file_db->prepare($sql);
            $stmt->bindParam(':idCliente', $id);  
            $stmt->execute();
            return 4;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 2;
        }
    }
    
    public function alterarCliente(){
        //$id =  $_SESSION['id'];

        //$novoNome = $_POST['nome'];
        //$novoEmail = $_POST['email'];

        $alterouAlgo = false;
        if ($_POST['nome'] != '') {
            $novoNome = $_POST['nome'];
            $alterouAlgo = true;
        }
        else{
            $novoNome = $_SESSION['rowUsuario']['nome'];
        }

        /* EMAIL */
        if ($_POST['email'] != '') {
            $novoEmail = $_POST['email'];
            $alterouAlgo = true;
        }
        else{
            $novoEmail = $_SESSION['rowUsuario']['email'];
        }

        /* CPF */
        if ($_POST['cpf'] != '') {
            $cpf = $_POST['cpf'];
            $alterouAlgo = true;
        }
        else{
            $cpf = $_SESSION['rowUsuario']['cpf'];
        }

        /* ENDERECO */
        if ($_POST['endereco'] != '') {
            $endereco = $_POST['endereco'];
            $alterouAlgo = true;
        }
        else{
            $endereco = $_SESSION['rowUsuario']['endereco'];
        }
        /* TELEFONE */
        if ($_POST['telefone'] != '') {
            $telefone = $_POST['telefone'];
            $alterouAlgo = true;
        }
        else{
            $telefone = $_SESSION['rowUsuario']['telefone'];
        }
        
        /* SENHA */
        if ($_POST['senha'] != '') {
            $senha = $_POST['senha'];
            $alterouAlgo = true;
        }
        else{
            $senha = $_SESSION['rowUsuario']['senha'];
        }
        
        if (!($alterouAlgo)) {
            return 0;
        }
        /*
        if ($_POST['email'] != '' || trim($_POST['nome']) == ''){
            return 1;
        }*/
        $idbuscado = $this->buscarClientesById($_SESSION['rowUsuario']['idCliente']);    
        $id = $idbuscado['idCliente'];
        /*
        if ($idbuscado == null) {
            try {
                // Prepare INSERT statement to SQLite3 file db
                $insert = "UPDATE cliente SET nome = :novoN, email = :novoE WHERE idCliente = :id";
                $stmt = $this->file_db->prepare($insert);

                // Bind parameters to statement variables
                
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':novoE', $_POST['nome']);
                $stmt->bindParam(':novoN', $_POST['email']);
                $stmt->execute();
                $_SESSION['usuario'] = $_POST['nome'];
                $_SESSION['rowUsuario'] = $this->buscarClientes($_POST['email']); 
                return 0;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return 2;
            }
        } else if ($idbuscado == $id) {  // caso o cara só mude o nome mas mantenha o email
        */
          
            $insert = "UPDATE cliente SET 
                                    nome = :novoNome,
                                    email = :novoEmail, 
                                    cpf = :novoCpf,
                                    endereco = :novoEndereco,
                                    senha = :novoSenha,
                                    telefone = :novoTelefone
                                    WHERE idCliente = :id";
            $stmt = $this->file_db->prepare($insert);

            // Bind parameters to statement variables
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':novoNome', $novoNome);
            $stmt->bindParam(':novoEmail', $novoEmail);
            $stmt->bindParam(':novoCpf', $cpf);
            $stmt->bindParam(':novoEndereco', $endereco);
            $stmt->bindParam(':novoTelefone',$telefone);
            $stmt->bindParam(':novoSenha', $senha);
            $stmt->execute();
            if(!isset($_POST['nome'])){
                $_SESSION['usuario'] = $_POST['nome'];
            }
            $_SESSION['rowUsuario'] = $this->buscarClientesById($idbuscado['idCliente']); 
            
            return 40;
        /*
        }else{
            return 3;
        }
        */
    }

//CARROS E ANUNCIOS

 public function alterarAnuncio(){
        $carroEditar = $this->buscaCarroPlaca($_SESSION['plaka']);
        foreach ($carroEditar as $lin);
        $alterouAlgo = false;
        if ($_POST['placa'] != '') {
            $novoPlaca = $_POST['placa'];
            $alterouAlgo = true;
        }
        else{
            $novoPlaca = $lin['placa'];
        }
        if ($_POST['marca'] != '') {
            $novoMarca = $_POST['marca'];
            $alterouAlgo = true;
        }
        else{
            $novoMarca = $lin['marca'];
        }
        if ($_POST['modelo'] != '') {
            $modelo = $_POST['modelo'];
            $alterouAlgo = true;
        }
        else{
            $modelo = $lin['modelo'];
        }
        if ($_POST['ano'] != '') {
            $ano = $_POST['ano'];
            $alterouAlgo = true;
        }
        else{
            $ano = $lin['ano'];
        }
        if ($_POST['cor'] != '') {
            $cor = $_POST['cor'];
            $alterouAlgo = true;
        }
        else{
            $cor = $lin['cor'];
        }
        if ($_POST['quilometragem'] != '') {
            $quilometragem = $_POST['quilometragem'];
            $alterouAlgo = true;
        }
        else{
            $quilometragem = $lin['quilometragem'];
        }
        if ($_POST['tipo'] != '') {
            $tipo = $_POST['tipo'];
            $alterouAlgo = true;
        }
        else{
            $tipo = $lin['tipo'];
        }
        if ($_POST['descricao'] != '') {
            $descricao = $_POST['descricao'];
            $alterouAlgo = true;
        }
        else{
            $descricao = $lin['descricao'];
        }
        if ($_POST['valor'] != '') {
            $valor = $_POST['valor'];
            $alterouAlgo = true;
        }
        else{
            $valor = $lin['valor'];
        }
        if (!($alterouAlgo)) {
            return 0;
        }
        // $placaBuscada = $this->buscaCarroPlaca($lin['placa']);    
        // $placa = $placaBuscada['placa'];
       
        $insert = "UPDATE veiculo SET 
                                    placa = :novoplaca,
                                    marca = :novomarca, 
                                    ano = :novoano,
                                    cor = :novocor,
                                    quilometragem = :novoquilometragem,
                                    modelo = :novomodelo,
                                    tipo = :novotipo
                                    WHERE placa = :placa";
            $stmt = $this->file_db->prepare($insert);

            // Bind parameters to statement variables
            $stmt->bindParam(':placa', $_SESSION['plaka']);
            $stmt->bindParam(':novoplaca', $novoPlaca);
            $stmt->bindParam(':novomarca', $novoMarca);
            $stmt->bindParam(':novoano', $ano);
            $stmt->bindParam(':novocor', $cor);
            $stmt->bindParam(':novomodelo',$modelo);
            $stmt->bindParam(':novoquilometragem', $quilometragem);
            $stmt->bindParam(':novotipo', $tipo);
            $stmt->execute();

            $insert = "UPDATE anuncio SET
                            placa = :novoplaca,
                            descricao = :novodescricao,
                            valor = :novovalor
                            WHERE placa = :placa";
            $stmt = $this->file_db->prepare($insert);

            $stmt->bindParam(':novoplaca', $novoPlaca);
            $stmt->bindParam(':novodescricao',$descricao);
            $stmt->bindParam(':novovalor',$valor);
            $stmt->execute();         
            // $countfiles = count($_FILES['files']['name']);
            // $insert = "UPDATE imagens SET
            //                     foto = :foto
            //                     placa = :novoplaca
            //                 WHERE placa = :placa";
            // for ($i=0; $i < $countfiles; $i++) { 
            //     $filename = $_FILES['files']['name'][$i];
            //     $asd = explode('.', $filename );
            //     $ext = end($asd);
            //     $valid_ext = array("png","jpeg","jpg");
            //      if(in_array($ext, $valid_ext)){
            //         // mudar aqui o caminho caso precise!!!!!!
            //         // echo $_SERVER['DOCUMENT_ROOT'];
            //         $dir = $_SERVER['DOCUMENT_ROOT']."Autobuy/Autobuy-master/Model/upload/".$filename;
            //         if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$dir)){
            //             $stmt->bindParam(':foto',$filename);
            //             $stmt->execute();
            //         }
            //     }
            // }
        return 45;
    }


    public function addAnuncio($veiculo,$anuncio)
    {
        try{
        $insert = "INSERT INTO veiculo (placa, marca, ano, cor, quilometragem, modelo, tipo)
        VALUES (:placa, :marca, :ano,:cor,:quilometragem, :modelo, :tipo)";
      
                $stmt = $this->file_db->prepare($insert);
                $stmt->bindParam(':placa', $veiculo->placa);
                $stmt->bindParam(':marca', $veiculo->marca);
                $stmt->bindParam(':ano', $veiculo->ano);
                $stmt->bindParam(':cor', $veiculo->cor);
                $stmt->bindParam(':quilometragem', $veiculo->quilometragem);
                $stmt->bindParam(':modelo', $veiculo->modelo);
                $stmt->bindParam(':tipo', $veiculo->tipo);
                $stmt->execute();
            try {
                $insert = "INSERT INTO anuncio (idAnuncio, idCliente, placa, descricao, valor)
                    VALUES (null, :idCliente, :placa,:descricao,:valor)";
                $stmt = $this->file_db->prepare($insert);
                $stmt->bindParam(':idCliente',$_SESSION['rowUsuario']['idCliente']);
                $stmt->bindParam(':placa', $veiculo->placa);
                $stmt->bindParam(':descricao', $anuncio->descricao);
                $stmt->bindParam(':valor', $anuncio->valor);
                $stmt->execute();

                try {
                    $countfiles = count($_FILES['files']['name']);
                    $insert = "INSERT INTO imagens(idImagem, foto, placa) VALUES(null,:imagem,:placa)";                        
                    $stmt = $this->file_db->prepare($insert);   
                    for ($i=0; $i < $countfiles; $i++) { 
                        $filename = $_FILES['files']['name'][$i];
                        $asd = explode('.', $filename );
                        $ext = end($asd);
                         $valid_ext = array("png","jpeg","jpg");
                         if(in_array($ext, $valid_ext)){
                            // mudar aqui o caminho caso precise!!!!!! mudar o src
                            // echo $_SERVER['DOCUMENT_ROOT'];
                            $dir = $_SERVER['DOCUMENT_ROOT']."/Model/upload/".$filename;
                            if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$dir)){
                                $stmt->bindParam(':imagem',$filename);
                                $stmt->bindParam(':placa',$veiculo->placa);
                                $stmt->execute();
                            }
                        }
                    }
                    return 10;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return 2;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return 2;
            }
        }catch (PDOException $e) {
            echo $e->getMessage();
            return 2;
        }
    }
        
    function buscaCarroRapido($marca,$modelo){
        if(trim($marca) == ''){
            $stmt = $this->file_db->prepare("SELECT v.placa, marca, ano, cor, quilometragem, modelo, tipo, descricao, valor, i.foto FROM veiculo as v INNER JOIN anuncio as a ON a.placa = v.placa INNER JOIN imagens as i ON i.placa = a.placa WHERE v.modelo = :modelo "); 
            $stmt->bindParam(':modelo',$modelo);       
        }else if(trim($modelo) == ''){
            $stmt = $this->file_db->prepare("SELECT v.placa, marca, ano, cor, quilometragem, modelo, tipo, descricao, valor, i.foto FROM veiculo as v INNER JOIN anuncio as a ON a.placa = v.placa INNER JOIN imagens as i ON i.placa = a.placa WHERE v.marca = :marca");
            $stmt->bindParam(':marca',$marca);
        }else{
            $stmt = $this->file_db->prepare("SELECT v.placa, marca, ano, cor, quilometragem, modelo, tipo, descricao, valor, i.foto FROM veiculo as v INNER JOIN anuncio as a ON a.placa = v.placa INNER JOIN imagens as i ON i.placa = a.placa WHERE v.marca = :marca AND v.modelo = :modelo");
            $stmt->bindParam(':marca',$marca);
            $stmt->bindParam(':modelo',$modelo);
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

   function buscaCarroCompleta($marca, $modelo, $ano, $valor, $quilometragem, $tipo){
        // captura mudanças - captura se não deve aparecer no where
        $mudou = false;
        if ($marca != "todos" && $marca != "") {
            $varMarca = " v.marca = :marca ";
            $mudou = true;
        }else{
            $varMarca = "";
        }
        if ($modelo != "todos"  && $modelo != "") {
            if($mudou){
                $varModelo = " AND v.modelo = :modelo ";
            }else{
                $varModelo = " v.modelo = :modelo ";
            }
            
            $mudou = true;
        }else{
            $varModelo = "";
        }
        if ($ano != "") {
            if($mudou){
                $varAno = " AND v.ano <= :ano ";
            }else{
                $varAno = " v.ano <= :ano ";
            }
            
            $mudou = true;
        }else{
            $varAno = "";
        }
        if ($valor != "") {
            if($mudou){
                $varValor = " AND a.valor <= :valor ";
            }else{
                $varValor = " a.valor <= :valor ";
            }
            
            $mudou = true;
        }else{
            $varValor = "";
        }
        if ($quilometragem != "") {
            if($mudou){
                $varQuilometragem = " AND v.quilometragem <= :quilometragem ";
            }else{
                $varQuilometragem = " v.quilometragem <= :quilometragem ";
            }
            
            $mudou = true;
        }else{
            $varQuilometragem = "";
        }
        if ($tipo != "todos" && $tipo != "") {
            if($mudou){
                $varTipo = " AND v.tipo = :tipo ";
            }else{
                $varTipo = " v.tipo = :tipo ";
            }
            
            $mudou = true;
        }else{
            $varTipo = "";
        }
            
       
        
        if ($mudou) {
            $where = " WHERE ";
        }else{
            $where = "";
        }
        $stmt = $this->file_db->prepare("SELECT v.placa, marca, ano, cor, quilometragem, modelo, tipo, descricao, valor, i.foto
                                            FROM veiculo as v INNER JOIN anuncio as a ON a.placa = v.placa INNER JOIN imagens as i ON a.placa = i.placa  ".
                                                $where. 
                                                $varMarca.
                                                $varModelo.
                                                $varAno.
                                                $varValor.
                                                $varQuilometragem.
                                                $varTipo);
        if ($marca != "todos" && $marca != "") {
            $stmt->bindParam(':marca',$marca);
        }
  
        if ($ano != "") {
            $stmt->bindParam(':ano',$ano);
        }
     
        if ($quilometragem != "") {
            $stmt->bindParam(':quilometragem',$quilometragem);
        }
        if ($modelo != "todos" && $modelo != "") {
            $stmt->bindParam(':modelo',$modelo);
        }
        if ($tipo != "todos" && $tipo != "") {
            $stmt->bindParam(':tipo',$tipo);
        }
        if ($valor != "") {
            $stmt->bindParam(':valor',$valor);
        }
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        
    }

    function carrosMenorPreco(){
        $stmt = $this->file_db->prepare("SELECT v.placa, v.marca, v.ano, v.cor, v.quilometragem, v.modelo, v.tipo, a.descricao, a.valor, max(i.foto) as foto 
        FROM veiculo as v 
        INNER JOIN anuncio as a ON v.placa = a.placa 
        INNER JOIN imagens as i ON a.placa = i.placa 
        GROUP BY v.placa, v.marca, v.ano, v.cor, v.quilometragem, v.modelo, v.tipo, a.descricao, a.valor
        ORDER BY a.valor ASC LIMIT 0,4");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    function contaImagem($id){
        $stmt = $this->file_db->prepare("SELECT COUNT(*) as contar FROM imagens WHERE placa = :idplaca");
        $stmt->bindParam(':idplaca',$id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }





    function buscaCarroIgual($marca,$placa){
        $stmt = $this->file_db->prepare("SELECT v.placa, marca, ano, cor, quilometragem, modelo, tipo, descricao, valor, idCliente, i.foto FROM veiculo as v INNER JOIN anuncio as a ON v.placa = a.placa INNER JOIN imagens as i ON a.placa = i.placa WHERE marca = :marca AND a.placa != :placa");
        $stmt->bindParam(':marca',$marca);
        $stmt->bindParam(':placa',$placa);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function buscaCarroPlaca($placa){
        $stmt = $this->file_db->prepare("SELECT v.placa, marca, ano, cor, quilometragem, modelo, tipo, descricao, valor, idCliente, i.foto FROM veiculo as v INNER JOIN anuncio as a ON v.placa = a.placa INNER JOIN imagens as i ON a.placa = i.placa WHERE a.placa = :placa");
        $stmt->bindParam(':placa',$placa);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function buscaCarroByCliente($idCliente){
            $stmt = $this->file_db->prepare("SELECT v.placa, v.marca, v.ano, v.cor, v.quilometragem, v.modelo, v.tipo, a.descricao, a.valor, a.idCliente, max(i.foto) as foto 
                                                FROM veiculo as v 
                                                INNER JOIN anuncio as a ON a.placa = v.placa 
                                                INNER JOIN imagens as i ON a.placa = i.placa 
                                                WHERE a.idCliente = :id
                                                GROUP BY v.placa, v.marca, v.ano, v.cor, v.quilometragem, v.modelo, v.tipo, a.descricao, a.valor, a.idCliente"); 
            $stmt->bindParam(':id',$idCliente);       
        
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    function removerAnuncio($placa){
        try {
            $sql = "DELETE FROM veiculo WHERE placa = :placa";
            $stmt = $this->file_db->prepare($sql);
            $stmt->bindParam(':placa', $placa);  
            $stmt->execute();
            try {
                $sql = "DELETE FROM anuncio WHERE placa = :placa";
                $stmt = $this->file_db->prepare($sql);
                $stmt->bindParam(':placa', $placa);  
                $stmt->execute();
                return 30;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return  2;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 2;
        }
    }
/*

    // listar clientes
    public function listarClientes()
    {
        $lista = $this->file_db->query('SELECT * FROM cliente');

        foreach ($lista as $row) {
            echo "idCliente: " . $row['idCliente'] . '<br>';
            echo "nome: " . $row['nome'] . '<br>';
            echo "email: " . $row['email'] . '<br>';
            echo "senha: " . $row['senha'] . '<br>';
            ?>
            <a href="index.php?action=editar&id=<?php echo $row['idCliente']; ?>">EDITAR</a><br>
            <a href="index.php?action=remover&id=<?php echo $row['idCliente']; ?>">REMOVER</a><br><br>
            <?php
        }
        ?><a href="index.php">VOLTAR</a><?php
    }

*/

}
