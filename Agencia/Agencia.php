<?php
class Agencia {

    private $colPT, $colVentas, $colVentasOL;

    public function __construct($colPT, $colVentas, $colVentasOL) {
        $this->colPT = $colPT;
        $this->colVentas = $colVentas;
        $this->colVentasOL = $colVentasOL;
    }

    public function getColPT() {
        return $this->colPT;
    }
    public function setColPT($colPT) {
        $this->colPT = $colPT;
    }

    public function getColVentas() {
        return $this->colVentas;
    }
    public function setColVentas($colVentas) {
        $this->colVentas = $colVentas;
    }

    public function getColVentasOL() {
        return $this->colVentasOL;
    }
    public function setColVentasOL($colVentasOL) {
        $this->colVentasOL = $colVentasOL;
    }

    public function __toString(){
		$cadena = "\nMi Agencia\n**********\n\nPaquetes Turisticos:\n*******************\n";
        foreach($this->getColPT() as $unPT){
			$cadena=$cadena.$unPT."\n";
		}
        $cadena = $cadena."Ventas:\n******\n";
        foreach($this->getColVentas() as $unaVenta){
			$cadena=$cadena.$unaVenta."\n";
		}
        $cadena = $cadena."Ventas on line:\n**************\n";
        foreach($this->getColVentasOL() as $unaVOL){
			$cadena=$cadena.$unaVOL."\n";
		}
		return $cadena;
	}
}
