<?php
include_once "Funcion.php";
 
class FuncionMusical extends Funcion{

	private $director, $cantPersonas;

	public function __construct($nombre, $horarioInicio, $duracion, $precio, $director, $cantPersonas){
		parent::__construct($nombre, $horarioInicio, $duracion, $precio);
        $this->director = $director;
		$this->cantPersonas = $cantPersonas;
	}

    public function getDirector(){
		return $this->director;
	}
	public function setDirector($director){
		$this->director = $director;
	}

	public function getCantPersonas(){
		return $this->cantPersonas;
	}
	public function setCantPersonas($cantPersonas){
		$this->cantPersonas = $cantPersonas;
	}

	public function __toString(){
        $cadena = "Funcion Musical:\n";
		$cadena.= parent::__toString();
		$cadena.= "Director: ".$this->getDirector()."\n";
		$cadena.= "Cantidad de personas en escena: ".$this->getCantPersonas()."\n";
        return $cadena;    
	}
}
?>