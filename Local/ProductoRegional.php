<?php
include_once "Producto.php";
 
class ProductoRegional extends Producto{

	private $descuento;

	public function __construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $obj_Rubro, $descuento){
		parent::__construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $obj_Rubro);
        $this->descuento = $descuento;
	}

    public function getdescuento(){
		return $this->descuento;
	}
	public function setdescuento($descuento){
		$this->descuento = $descuento;
	}

    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        $this->setdescuento($precioVenta * $this->getdescuento() / 100);
        return $precioVenta - $this->getdescuento();
    }

	public function __toString(){
		$cadena= parent::__toString().        
        "Precio de Venta: ".$this->darPrecioVenta()."\n";
        return $cadena;    
	}
}
?>