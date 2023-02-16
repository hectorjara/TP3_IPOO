<?php
Class Producto {

	private $codigoBarra, $descripcion, $stock, $iva, $precioCompra, $obj_Rubro;

	public function __construct($codigoBarra, $descripcion, $stock, $iva, $precioCompra, $obj_Rubro){
		$this->codigoBarra = $codigoBarra;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->iva = $iva;
        $this->precioCompra = $precioCompra;
        $this->obj_Rubro = $obj_Rubro;
	}

    public function getCodigoBarra(){
		return $this->codigoBarra;
	}
	public function setCodigoBarra($codigoBarra){
		$this->codigoBarra = $codigoBarra;
	}

    public function getDescripcion(){
		return $this->descripcion;
	}
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getStock(){
		return $this->stock;
	}
	public function setStock($stock){
		$this->stock = $stock;
	}

    public function getIva(){
		return $this->iva;
	}
	public function setIva($iva){
		$this->iva = $iva;
	}

    public function getPrecioCompra(){
		return $this->precioCompra;
	}
	public function setPrecioCompra($precioCompra){
		$this->precioCompra = $precioCompra;
	}
	
    public function getObj_Rubro(){
		return $this->obj_Rubro;
	}
	public function setObj_Rubro($obj_Rubro){
		$this->obj_Rubro = $obj_Rubro;
	}

    public function darPrecioVenta(){
        $pCompra = $this->getPrecioCompra();
        $ganancia = $pCompra * $this->getObj_Rubro()->getporcentajeGanancia()/100;
        $masIva =  ($pCompra + $ganancia ) * $this->getIva()/100;
		return $pCompra + $ganancia + $masIva ;
	}
    
	public function __toString(){
		$cadena = "Producto:\n********\n".
                  "Codigo de barra: ". $this->getCodigoBarra()."\n".
                  "Descripcion: ".$this->getDescripcion()."\n".
                  "Stock: ".$this->getStock()."\n".
                  "Iva: ".$this->getIva()."\n".
                  "Precio de Compra: ".$this->getPrecioCompra()."\n".
                  "Rubro: ".$this->getObj_Rubro()->getdescripcion()."\n";
		return $cadena;
	}
	
}