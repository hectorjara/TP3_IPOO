<?php
Class Cuenta {

	private $numeroCuenta, $obj_Cliente, $saldo;

	public function __construct($numeroCuenta, $obj_Cliente, $saldo){
		$this->numeroCuenta = $numeroCuenta;
        $this->saldo = $saldo;
		$this->apellido ;
	}

    public function getnumeroCuenta(){
		return $this->numeroCuenta;
	}
	public function setnumeroCuenta($numeroCuenta){
		$this->numeroCuenta = $numeroCuenta;
	}

    public function getObj_Cliente(){
		return $this->obj_Cliente;
	}
	public function setObj_Cliente($obj_Cliente){
		$this->obj_Cliente = $obj_Cliente;
	}

	public function getSaldo(){
		return $this->saldo;
	}
	public function setsaldo($saldo){
		$this->saldo = $saldo;
	}
		
	public function __toString(){
		$cadena = "Nuumero de Cuenta: ". $this->getnumeroCuenta()."\n".
                  "Cliente: ".$this->getObj_Cliente()."\n".
                  "Saldo: ".$this->getSaldo().".";
		return $cadena;
	}
	
}