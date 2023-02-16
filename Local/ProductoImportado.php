<?php
include_once "Producto.php";
 
class ProductoImportado extends Producto{

	public function __construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $obj_Rubro){
		parent::__construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $obj_Rubro);
	}

    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        $incremento = $precioVenta * 0.5; // 50% de incremento
        $nuevoPrecioVenta = $precioVenta + $incremento;
        return $nuevoPrecioVenta * 1.1; // 1.1 es el 10% de impuesto sumado al nuevo precio
    }

	public function __toString(){
		$cadena= parent::__toString().        
        "Precio de Venta: ".$this->darPrecioVenta()."\n";
        return $cadena;    
	}
}
?>