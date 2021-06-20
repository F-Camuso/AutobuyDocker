<?php 

class cliente 
{
	
	public $email;
	public $nome;
	public $cpf;
	public $endereco;
	public $senha; 
	public $telefone;

	function __construct($email,$nome,$cpf,$endereco,$senha, $telefone)
	{

		$this->email = $email;
		$this->nome = $nome;
		$this->cpf = $cpf;
		$this->endereco = $endereco;
		$this->senha = $senha;
		$this->telefone = $telefone;
	}

}
 ?>