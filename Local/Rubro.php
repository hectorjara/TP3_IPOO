<?php
Class Rubro {
	
	private $descripcion, $porcentajeGanancia;

	public function __construct($descripcion, $porcentajeGanancia){
		$this->descripcion = $descripcion;
        $this->porcentajeGanancia = $porcentajeGanancia;
	}

    public function getdescripcion(){
		return $this->descripcion;
	}
	public function setdescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getporcentajeGanancia(){
		return $this->porcentajeGanancia;
	}
	public function setporcentajeGanancia($porcentajeGanancia){
		$this->porcentajeGanancia = $porcentajeGanancia;
	}
		
	public function __toString(){
		$cadena = "Descripcion: ". $this->getdescripcion().", Porcentaje de Ganancia: ".$this->getporcentajeGanancia().".\n";
		return $cadena;
	}
}