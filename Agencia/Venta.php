<?php
Class Venta {

	private $fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc;

	public function __construct($fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc){
		$this->fechaVenta = $fechaVenta;
        $this->obj_PT = $obj_PT;
        $this->cantPersonas = $cantPersonas;
        $this->tipoDoc = $tipoDoc;
		$this->numDoc = $numDoc;
	}

    public function getFechaVenta(){
		return $this->fechaVenta;
	}
	public function setFechaVenta($fechaVenta){
		$this->fechaVenta = $fechaVenta;
	}

    public function getObj_PT(){
		return $this->obj_PT;
	}
	public function setObj_PT($obj_PT){
		$this->obj_PT = $obj_PT;
	}

	public function getCantPersonas(){
		return $this->cantPersonas;
	}
	public function setCantPersonas($cantPersonas){
		$this->cantPersonas = $cantPersonas;
	}

    public function getTipoDoc(){
		return $this->tipoDoc;
	}
	public function setTipoDoc($tipoDoc){
		$this->tipoDoc = $tipoDoc;
	}

	public function getNumDoc(){
		return $this->numDoc;
	}
	public function setNumDoc($numDoc){
		$this->numDoc = $numDoc;
	}

	public function darImporteVenta(){
		$PT = $this->getObj_PT();
		$cantDias = $PT->getCantDias();
		$valorPorDiaYPas = $PT->getDestino()->getValorPorDiaYPas();
		$importeVenta = $cantDias * $valorPorDiaYPas * $this->getCantPersonas();
		return $importeVenta;
	}

	public function __toString(){
		$cadena = "Venta:\n*****\n".
                  "Fecha: ". $this->getFechaVenta()."\n\n".
                  "Paquete Turistico:\n".$this->getObj_PT()."\n".
                  "Cantidad de personas: ".$this->getCantPersonas()."\n".
                  $this->getTipoDoc().": ".$this->getNumDoc()."\n";
		return $cadena;
	}	
}