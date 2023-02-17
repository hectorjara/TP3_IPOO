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
                return true;
            }else{
                return false;
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
                return true;
            }else{
                return false;
            }
            
        }
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
