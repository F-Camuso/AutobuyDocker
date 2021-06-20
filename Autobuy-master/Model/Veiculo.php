<?php 
class veiculo
{
	
	public $placa;
	public $marca;
	public $ano;
	public $cor;
	public $quilometragem;
	public $modelo;
	public $tipo; 
	function __construct($placa, $marca, $ano, $cor, $quilometragem,$modelo,$tipo)
	{
		$this->placa = $placa;
		$this->marca = $marca;
		$this->ano = $ano;
		$this->cor = $cor;
		$this->quilometragem = $quilometragem;
		$this->modelo = $modelo;
		$this->tipo = $tipo;
	}
}
 ?>