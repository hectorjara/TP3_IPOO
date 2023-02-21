<?php
Class Venta {

	private $fechaVenta, $obj_PT, $cantPersonas, $obj_Cliente;

	public function __construct($fechaVenta, $obj_PT, $cantPersonas, $obj_Cliente){
		$this->fechaVenta = $fechaVenta;
        $this->obj_PT = $obj_PT;
        $this->cantPersonas = $cantPersonas;
        $this->obj_Cliente = $obj_Cliente;
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

    public function getObj_Cliente(){
		return $this->obj_Cliente;
	}
	public function setObj_Cliente($obj_Cliente){
		$this->obj_Cliente = $obj_Cliente;
	}

	public function __toString(){
		$cadena = "Venta:\n*****\n".
                  "Fecha: ". $this->getFechaVenta()."\n\n".
                  "Paquete Turistico:\n".$this->getObj_PT()."\n".
                  "Cantidad de personas: ".$this->getCantPersonas()."\n".
                  "Cliente: ".$this->getObj_Cliente()->getTipoDoc().": ".$this->getObj_Cliente()->getNumDoc()."\n";
		return $cadena;
	}	
}