<?php 

class anuncio 
{
	
	// public $idAnuncio;
	// public $idCliente;
	// public $idVeiculo;$idAnuncio,$idCliente,$idVeiculo
	public $descricao;
	public $valor; 

	function __construct($descricao,$valor)
	{

		// $this->idAnuncio = $idAnuncio;
		// $this->idCliente = $idCliente;
		// $this->idVeiculo = $idVeiculo;
		$this->descricao = $descricao;
		$this->valor = $valor;
	}

}
 ?>