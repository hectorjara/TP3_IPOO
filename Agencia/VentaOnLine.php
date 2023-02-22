<?php
include_once "Venta.php";
 
class VentaOnLine extends Venta{

	private $descuento;

	public function __construct($fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc, $descuento=20){
		parent::__construct($fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc);
        $this->descuento = $descuento;
	}

    public function getDescuento(){
		return $this->descuento;
	}
	public function setDescuento($descuento){
		$this->descuento = $descuento;
	}

    public function darImporteVenta(){
        $importeVenta = parent::darImporteVenta();
        $desc = $importeVenta * $this->getDescuento() / 100;
        return $importeVenta - $desc;
    }

	public function __toString(){
		$cadena= parent::__toString().        
        "Descuento por Venta on line: ".$this->getDescuento()."%\n";
        return $cadena;    
	}
}
?>