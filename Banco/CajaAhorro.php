<?php
include_once "Cuenta.php";
 
class CajaAhorro extends Cuenta{

	public function __construct($numeroCuenta, $obj_Cliente, $saldo){
		parent::__construct($numeroCuenta, $obj_Cliente, $saldo);
	}

	public function __toString(){
        $cadena = "Caja de Ahorro:\n";
		$cadena.= parent::__toString();
        return $cadena;    
	}
}
?>