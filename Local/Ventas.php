<?php
Class Ventas {
	
	private $fecha, $col_Productos, $cliente;

	public function __construct($fecha, $col_Productos, $cliente){
		$this->fecha = $fecha;
        $this->col_Productos = $col_Productos;
        $this->cliente = $cliente;
	}

    public function getFecha(){
		return $this->fecha;
	}
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getCol_Productos(){
		return $this->col_Productos;
	}
	public function setCol_Productos($col_Productos){
		$this->col_Productos = $col_Productos;
	}

    public function getCliente(){
		return $this->cliente;
	}
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

    public function darImporteVenta(){
        $importeVenta = 0;
        foreach($this->getCol_Productos() as $unProd){
            $importeVenta = $importeVenta + $unProd->darPrecioVenta();
        }
        return $importeVenta;
    }
		
	public function __toString(){
		$cadena = "Venta:\n*****\n"."Fecha: ". $this->getFecha()."\n";
        $cadena = $cadena."Productos:\n*********\n";

        //Cuenta la cantidad de productos:
        $obj_a_String = array_map('serialize', $this->getCol_Productos());
        $repeticiones = array_count_values($obj_a_String);
        foreach ($repeticiones as $obj_a_String => $cantidad){
            $unProd = unserialize($obj_a_String);//Vuelve de String a Objeto
            $cadena = $cadena.$unProd."\n"."Cantidad: ".$cantidad."\n\n";
        }

        $cadena = $cadena."Cliente: ".$this->getCliente()."\n";
		return $cadena;
	}
}