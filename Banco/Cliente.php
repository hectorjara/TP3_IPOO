<?php
include_once "Persona.php";
 
class Cliente extends Persona{

    private $numeroCliente;

	public function __construct($numeroCliente, $dni, $nombre, $apellido){
		parent::__construct($dni, $nombre, $apellido);
		$this->numeroCliente = $numeroCliente;
	}

	public function getNumeroCliente(){
		return $this->numeroCliente;
	}
	public function setNumeroCliente($numeroCliente){
		return $this->numeroCliente = $numeroCliente;
	}

	public function __toString(){

        $cadena = "Numero de Cliente: ".$this->getNumeroCliente().", ";
		$cadena.= parent::__toString();
        return $cadena;    
	}
}
?>