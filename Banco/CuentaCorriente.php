<?php
include_once "Cuenta.php";
 
class CuentaCorriente extends Cuenta{

	private $numeroCuenta, $obj_Cliente, $saldo, $montoMaximo;

	public function __construct($numeroCuenta, $obj_Cliente, $saldo, $montoMaximo){
		parent::__construct($numeroCuenta, $obj_Cliente, $saldo);
        $this->montoMaximo = $montoMaximo;
	}

    public function getMontoMaximo(){
		return $this->montoMaximo;
	}
	public function setMontoMaximo($montoMaximo){
		$this->montoMaximo = $montoMaximo;
	}

    public function realizarRetiro($monto){
        if ($monto < $this->getMontoMaximo()+$this->getSaldo()){
            parent::realizarRetiro($monto);
			return true;
        }else{
            echo "El monto solicitado es superior al permitido.\n";
			return false;
        }
    }

	public function __toString(){
        $cadena = "Cuenta Corriente:\n";
		$cadena.= parent::__toString();
        return $cadena;    
	}
}
?>