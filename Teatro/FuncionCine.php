<?php
include_once "Funcion.php";
 
class FuncionCine extends Funcion{

	private $genero, $paisOrigen;

	public function __construct($nombre, $horarioInicio, $duracion, $precio, $genero, $paisOrigen){
		parent::__construct($nombre, $horarioInicio, $duracion, $precio);
        $this->genero = $genero;
		$this->paisOrigen = $paisOrigen;
	}

    public function getGenero(){
		return $this->genero;
	}
	public function setGenero($genero){
		$this->genero = $genero;
	}

	public function getPaisOrigen(){
		return $this->paisOrigen;
	}
	public function setPaisOrigen($paisOrigen){
		$this->paisOrigen = $paisOrigen;
	}

	public function __toString(){
        $cadena = "Funcion de Cine:\n";
		$cadena.= parent::__toString();
		$cadena.= "Genero: ".$this->getGenero()."\n";
		$cadena.= "Pais de origen: ".$this->getPaisOrigen()."\n";
        return $cadena;    
	}
}
?>