<?php
class Local {

    private $col_Prod_Imp, $col_Prod_Reg, $col_Ventas;

    public function __construct($col_Prod_Imp, $col_Prod_Reg, $col_Ventas) {
        $this->col_Prod_Imp = $col_Prod_Imp;
        $this->col_Prod_Reg = $col_Prod_Reg;
        $this->col_Ventas = $col_Ventas;
    }

    public function getcol_Prod_Imp() {
        return $this->col_Prod_Imp;
    }
    public function setcol_Prod_Imp($col_Prod_Imp) {
        $this->col_Prod_Imp = $col_Prod_Imp;
    }

    public function getcol_Prod_Reg() {
        return $this->col_Prod_Reg;
    }
    public function setcol_Prod_Reg($col_Prod_Reg) {
        $this->col_Prod_Reg = $col_Prod_Reg;
    }

    public function getcol_Prod_Ventas() {
        return $this->col_Ventas;
    }
    public function setcol_Prod_Ventas($col_Ventas) {
        $this->col_Ventas = $col_Ventas;
    }

    public function incorporarProductoLocal($obj_Producto){
        if ($obj_Producto instanceof ProductoImportado){
            $col_Prod_Impor = $this->getcol_Prod_Imp();
            $encontrado = false;
            foreach ($col_Prod_Impor as $unProdI) {
                if ($unProdI->getCodigoBarra() == $obj_Producto->getCodigoBarra()) {
                    $encontrado = true;
                    break;
                }else{
                    $encontrado = false;
                }
              }
            if (!$encontrado){
                array_push($col_Prod_Impor, $obj_Producto);
                $this->setcol_Prod_Imp($col_Prod_Impor);
                echo "El producto '".$obj_Producto->getDescripcion()."' ha sido incorporado\n";
            }else{
                echo "El producto '".$obj_Producto->getDescripcion()."' ya se encuentra registrado\n";
            }
            
        }elseif ($obj_Producto instanceof ProductoRegional){
            $col_Prod_Reg = $this->getcol_Prod_Reg();
            $encontrado = false;
            foreach ($col_Prod_Reg as $unProdR) {
                if ($unProdR->getCodigoBarra() == $obj_Producto->getCodigoBarra()) {
                    $encontrado = true;
                    break;
                }else{
                    $encontrado = false;
                }
              }
            if (!$encontrado){
                array_push($col_Prod_Reg, $obj_Producto);
                $this->setcol_Prod_Reg($col_Prod_Reg);
                echo "El producto '".$obj_Producto->getDescripcion()."' ha sido incorporado\n";
            }else{
                echo "El producto '".$obj_Producto->getDescripcion()."' ya se encuentra registrado\n";
            }
            
        }
    }

    public function retornarImporteProducto($codBarra){
		$colPI = $this->getcol_Prod_Imp();
        $i = 0;
        $encontrado = false;
        while ($i<count($colPI) && !$encontrado){
            $unProdI = $colPI[$i];
            $encontrado = $unProdI->getCodigoBarra() == $codBarra;
            $i++;
        }
        if ($encontrado){
            return $unProdI->darPrecioVenta();
        }else{
            $colPR = $this->getcol_Prod_Reg();
            $i = 0;
            while ($i<count($colPR) && !$encontrado){
                $unProdR = $colPR[$i];
                $encontrado = $unProdR->getCodigoBarra() == $codBarra;
                $i++;
            }
            if ($encontrado){
                return $unProdR->darPrecioVenta();
            }
        }
	}

    public function retornarCostoProductoLocal(){
        $costoTotal = 0;
        foreach($this->getcol_Prod_Reg() as $unProdR){
			$costoTotal = $costoTotal + $unProdR->getStock() * $unProdR->getPrecioCompra();
		}
        foreach($this->getcol_Prod_Imp() as $unProdI){
			$costoTotal = $costoTotal + $unProdI->getStock() * $unProdI->getPrecioCompra();
		}
        return $costoTotal;
    }

    public function productoMasEcomomico($rubro){
        $precioMasBarato = 99999999;
        foreach($this->getcol_Prod_Imp() as $unProdI){
            $rubroDeProdI = $unProdI->getObj_Rubro();
            //echo $rubroDeProdI;
            if ($rubroDeProdI == $rubro){
                $precio=$unProdI->darPrecioVenta(); 
                if ($precio < $precioMasBarato ){
                    $precioMasBarato = $precio;
                    $prodMasEconomico = $unProdI;
                }
            }
		}
        foreach($this->getcol_Prod_Reg() as $unProdR){
            $rubroDeProdR = $unProdR->getObj_Rubro();
            echo $rubroDeProdR;
            if($rubroDeProdR == $rubro){
                $precio=$unProdR->darPrecioVenta();
                if ($precio < $precioMasBarato ){
                    $precioMasBarato = $precio;
                    $prodMasEconomico = $unProdR;
                }
            }
		}
        return $prodMasEconomico;
    }

    public function informarProductosMasVendidos($anio, $n){
        $colProdVendEnElAnio =array();
        $colVentas = $this->getcol_Prod_Ventas();
        foreach($colVentas as $unaVenta){
			$fechaVenta =  $unaVenta->getFecha();
            $anioVenta = date('Y', strtotime($fechaVenta));
            if ($anioVenta == $anio){
                $colProddelaVenta = $unaVenta->getCol_Productos();
                foreach ($colProddelaVenta as $unProddelaVenta){
                    array_push($colProdVendEnElAnio, $unProddelaVenta);
                }
            }
		}

        $col_ProductosYCantidad_anio = array(); //Nuevo arreglo Bidimensional Producto y Cantidad

        foreach ($colProdVendEnElAnio as $unProdVendEnElanio){ //Recorre el primer arreglo
            $encontrado = false;
            foreach ($col_ProductosYCantidad_anio as &$un_PYC_anio){
                if ($un_PYC_anio[0] === $unProdVendEnElanio){
                    $un_PYC_anio[1]++;
                    $encontrado = true; //Y solo cambia el segundo arreglo una vez cada foreach del primero
                    break;
                }
            }
            if (!$encontrado){
                $col_ProductosYCantidad_anio[] = array($unProdVendEnElanio, 1);
            }
        }
        //Ordenas el nuevo arreglo bidimensional de acuerdo a la cantidad
        usort($col_ProductosYCantidad_anio, function($a, $b) {
            if ($a[1] == $b[1]) {
                return 0;
            }
            return ($a[1] < $b[1]) ? 1 : -1;
        });

        $cantDeProductos = count($col_ProductosYCantidad_anio, COUNT_NORMAL);

        if ($cantDeProductos >= $n){
            $col_los_n_mas_vendidos = array_slice($col_ProductosYCantidad_anio, 0, $n);
            return $col_los_n_mas_vendidos;
        }else {
            return false;
        }
    }


    public function promedioVentasImportados(){
        $colVentas = $this->getcol_Prod_Ventas();
        $colProdInpVendidos =array();
        foreach ($colVentas as $unaVenta){
            $colProd = $unaVenta->getCol_Productos();
            foreach ($colProd as $unProd){
                if ($unProd instanceof ProductoImportado){
                    array_push($colProdInpVendidos, $unProd);
                }
            }
        }
        $cant=0;
        $total=0;
        foreach($colProdInpVendidos as $prodIV){
            $total = $total + $prodIV->darPrecioVenta();
            $cant++;
        }
        return $total / $cant;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc){
        $colProdCompDeUnCliente = array();
        $colVentas = $this->getcol_Prod_Ventas();
        foreach ($colVentas as $unaVenta){
            $clienteDeUnaVenta = $unaVenta->getCliente();
            $tipoDocDeCDUV = $clienteDeUnaVenta->getTipoDoc();
            $numDocDeCDUV = $clienteDeUnaVenta->getNumDoc();
            if ($tipoDocDeCDUV == $tipoDoc && $numDocDeCDUV == $numDoc){
                $colProductosComprados = $unaVenta->getCol_Productos();
                foreach ($colProductosComprados as $unProdComprado){
                    array_push($colProdCompDeUnCliente,$unProdComprado);
                }                
            }
        }
        return $colProdCompDeUnCliente;
    }


    public function __toString(){
		$cadena = "\nMi Tienda\n********\n\nProductos Regionales:\n********************\n";
        foreach($this->getcol_Prod_Reg() as $unProdR){
			$cadena=$cadena.$unProdR."\n";
		}
        $cadena = $cadena."Productos Importados:\n********************\n";
        foreach($this->getcol_Prod_Imp() as $unProdI){
			$cadena=$cadena.$unProdI."\n";
		}
        $cadena = $cadena."Ventas:\n******\n";
        foreach($this->getcol_Prod_Ventas() as $unaV){
			$cadena=$cadena.$unaV."\n";
		}
		return $cadena;
	}
}
