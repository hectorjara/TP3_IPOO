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
                $nuevaVenta = new VentaOnLine(date("d-m-Y"), $objPT, $cantPersonas, $tipoDoc, $numDoc); //$fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc){
                $colVentasOL = $this->getColVentasOL();
                array_push($colVentasOL, $nuevaVenta);
                $this->setColVentasOL($colVentasOL);
                return $nuevaVenta->darImporteVenta();
            }else{
                $nuevaVenta = new Venta(date("d-m-Y"), $objPT, $cantPersonas, $tipoDoc, $numDoc); //$fechaVenta, $obj_PT, $cantPersonas, $tipoDoc, $numDoc){
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

    public function paqueteMasEcomomico($fecha, $destino){
        $colPT = $this->getColPT();
        $precioMasEconomico= 9999999;        
        foreach ($colPT as $unPaqTur){
            if ($unPaqTur->getFechaDesde() == $fecha && $unPaqTur->getDestino() == $destino){
                $valorPorDia = $unPaqTur->getDestino()->getValorPorDiaYPas();
                $cantDias = $unPaqTur->getCantDias();
                $precioPaquete = $valorPorDia * $cantDias;
                if ($precioPaquete < $precioMasEconomico){
                    $paqueteMasEconomico = $unPaqTur;
                    $precioMasEconomico = $precioPaquete;
                }
            }            
        }
        return $paqueteMasEconomico;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc){
        $colVentas = $this->getColVentas();
        $colPTAdquiridosPorC = array();
        foreach($colVentas as $unaVenta){
            if ($unaVenta->getTipoDoc() == $tipoDoc && $unaVenta->getNumDoc() == $numDoc){
                $paTurComprado = $unaVenta->getObj_PT();
                array_push($colPTAdquiridosPorC, $paTurComprado); 
            }
        }
        $colVOL = $this->getColVentasOL();
        foreach($colVOL as $unaVenta){
            if ($unaVenta->getTipoDoc() == $tipoDoc && $unaVenta->getNumDoc() == $numDoc){
                $paTurComprado = $unaVenta->getObj_PT();
                array_push($colPTAdquiridosPorC, $paTurComprado); 
            }
        }
        return $colPTAdquiridosPorC;
    }

    public function informarPaquetesMasVendido($anio, $n){
        $colPaqtVendEnElAnio =array();
        $colVentas = $this->getColVentas();
        foreach($colVentas as $unaVenta){
			$fechaVenta =  $unaVenta->getFechaVenta();
            $anioVenta = date('Y', strtotime($fechaVenta));
            if ($anioVenta == $anio){
                $objPTdeLaVenta = $unaVenta->getObj_PT();
                array_push($colPaqtVendEnElAnio, $objPTdeLaVenta);
            }
		}
        $colVentasOL = $this->getColVentasOL();
        foreach($colVentasOL as $unaVenta){
			$fechaVenta =  $unaVenta->getFechaVenta();
            $anioVenta = date('Y', strtotime($fechaVenta));
            if ($anioVenta == $anio){
                $objPTdeLaVentaOL = $unaVenta->getObj_PT();
                array_push($colPaqtVendEnElAnio, $objPTdeLaVentaOL);
            }
		}

        $col_PTyCant = array(); //Nuevo arreglo Bidimensional Producto y Cantidad

        foreach ($colPaqtVendEnElAnio as $unPTVenEnElAnio){ //Recorre el primer arreglo
            $encontrado = false;
            foreach ($col_PTyCant as &$unPTYC){
                if ($unPTYC[0] === $unPTVenEnElAnio){
                    $unPTYC[1]++;
                    $encontrado = true; //Y solo cambia el segundo arreglo una vez cada foreach del primero
                    break;
                }
            }
            if (!$encontrado){
                $col_PTyCant[] = array($unPTVenEnElAnio, 1);
            }
        }
        //Ordenas el nuevo arreglo bidimensional de acuerdo a la cantidad
        usort($col_PTyCant, function($a, $b) {
            if ($a[1] == $b[1]) {
                return 0;
            }
            return ($a[1] < $b[1]) ? 1 : -1;
        });

        $cantPT = count($col_PTyCant, COUNT_NORMAL);

        if ($cantPT >= $n){
            $col_los_n_mas_vendidos = array_slice($col_PTyCant, 0, $n);
            return $col_los_n_mas_vendidos;
        }else {
            return false;
        }
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
