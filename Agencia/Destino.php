<?php
Class Destino {
	
	private $identificacion, $nombreLugar, $valorPorDiaYPas;

	public function __construct($identificacion, $nombreLugar, $valorPorDiaYPas){
		$this->identificacion = $identificacion;
        $this->nombreLugar = $nombreLugar;
        $this->valorPorDiaYPas = $valorPorDiaYPas;
	}

    public function getIdentificacion(){
		return $this->identificacion;
	}
	public function setIdentificacion($identificacion){
		$this->identificacion = $identificacion;
	}

	public function getNombreLugar(){
		return $this->nombreLugar;
	}
	public function setNombreLugar($nombreLugar){
		$this->nombreLugar = $nombreLugar;
	}

    public function getValorPorDiaYPas(){
		return $this->valorPorDiaYPas;
	}
	public function setValorPorDiaYPas($valorPorDiaYPas){
		$this->valorPorDiaYPas = $valorPorDiaYPas;
	}
		
	public function __toString(){
		$cadena = "identificacion: ". $this->getIdentificacion().
                  "\nNombre del Lugar: ".$this->getNombreLugar().
                  "\nValor por dia y pasajero: $".$this->getValorPorDiaYPas()."\n";
		return $cadena;
	}
}