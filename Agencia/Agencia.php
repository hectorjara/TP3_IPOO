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

    public function incorporarPaquete($obj_PT){
        $colPT = $this->getColPT();
        $paqueteYaIngresado = false;
        foreach($colPT as $unOPT){
            if ($unOPT->getFechaDesde() == $obj_PT->getFechaDesde() && $unOPT->getDestino() == $obj_PT->getDestino()){
                $paqueteYaIngresado = true;
                break;
            }else{
                $paqueteYaIngresado = false;
            }
        }
        if (!$paqueteYaIngresado){
            array_push($colPT, $obj_PT);
            $this->setColPT($colPT);
            return true;
        }else{
            return false;
        }
    }

    public function incorporarVenta($objPT,$tipoDoc,$numDoc,$cantPersonas, $esOnLine){
        $plazasDisponibles = $objPT->getPlazasDisponibles();
        if ($cantPersonas <= $plazasDisponibles){
            $objPT->setPlazasDisponibles($plazasDisponibles - $cantPersonas);
            if ($esOnLine){
                $nuevaVenta = new VentaOnLine(date("d/m/Y"), $objPT, $cantPersonas, $tipoDoc, $numDoc); //$fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc){
                $colVentasOL = $this->getColVentasOL();
                array_push($colVentasOL, $nuevaVenta);
                $this->setColVentasOL($colVentasOL);
                return $nuevaVenta->darImporteVenta();
            }else{
                $nuevaVenta = new Venta(date("d/m/Y"), $objPT, $cantPersonas, $tipoDoc, $numDoc); //$fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc){
                $colVentas = $this->getColVentas();
                array_push($colVentas, $nuevaVenta);
                $this->setColVentas($colVentas);
                return $nuevaVenta->darImporteVenta();
            }
        }else{
            return -1;
        }
    }

    public function informarPaquetesTuristicos($fecha, $destino){
        $colPT = $this->getColPT();
        $coleccionFiltradaPT= array();
        foreach ($colPT as $unPaqTur){
            if ($unPaqTur->getFechaDesde() == $fecha && $unPaqTur->getDestino() == $destino){
                array_push($coleccionFiltradaPT, $unPaqTur);
            }
        }
        return $coleccionFiltradaPT;
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
