<?php
Class Cuenta {

	private $numeroCuenta, $obj_Cliente, $saldo;

	public function __construct($numeroCuenta, $obj_Cliente, $saldo){
		$this->numeroCuenta = $numeroCuenta;
        $this->obj_Cliente = $obj_Cliente;
        $this->saldo = $saldo;
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
	public function setSaldo($saldo){
		$this->saldo = $saldo;
	}

    public function saldoCuenta(){
        return $this.getSaldo();
    }

    public function realizarDeposito($monto){
        $nuevoSaldo = $this->getSaldo() + $monto;
        $this->setSaldo($nuevoSaldo);
    }

    public function realizarRetiro($monto){
        $nuevoSaldo = $this->getSaldo() - $monto;
        $this->setSaldo($nuevoSaldo);
    }
		
	public function __toString(){
		$cadena = "Numero de Cuenta: ". $this->getnumeroCuenta()."\n".
                  "Cliente: ".$this->getObj_Cliente().
                  "Saldo: ".$this->getSaldo().".\n";
		return $cadena;
	}
	
}