<?php
Class PaqueteTuristico {

	private $fechaDesde, $cantDias, $destino, $totalPlazas, $plazasDisponibles;

	public function __construct($fechaDesde, $cantDias, $destino, $totalPlazas){
		$this->fechaDesde = $fechaDesde;
        $this->cantDias = $cantDias;
        $this->destino = $destino;
        $this->totalPlazas = $totalPlazas;
        $this->plazasDisponibles = $totalPlazas;
	}

    public function getFechaDesde(){
		return $this->fechaDesde;
	}
	public function setFechaDesde($fechaDesde){
		$this->fechaDesde = $fechaDesde;
	}

    public function getCantDias(){
		return $this->cantDias;
	}
	public function setCantDias($cantDias){
		$this->cantDias = $cantDias;
	}

	public function getDestino(){
		return $this->destino;
	}
	public function setDestino($destino){
		$this->destino = $destino;
	}

    public function getTotalPlazas(){
		return $this->totalPlazas;
	}
	public function setTotalPlazas($totalPlazas){
		$this->totalPlazas = $totalPlazas;
	}

    public function getPlazasDisponibles(){
       return $this->plazasDisponibles;
	}
    public function setPlazasDisponibles(){
        //return $this->plazasDisponibles;
    }

	public function __toString(){
		$cadena = "Paquete Turistico:\n*****************\n".
                  "Fecha: ". $this->getFechaDesde()."\n".
                  "Cantidad de dias: ".$this->getCantDias()."\n".
                  "Destino: ".$this->getDestino()->getNombreLugar()."\n".
                  "Cantidad total de plazas: ".$this->getTotalPlazas()."\n";
                  "Cantidad de plazas disponibles: ".$this->getPlazasDisponibles()."\n";
		return $cadena;
	}
	
}