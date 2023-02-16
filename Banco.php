<?php
Class Banco {

	private $coleccionCuentaCorriente;
    private $coleccionCajaAhorro;
    private $ultimoValorCuentaAsignado;
    private $coleccionCliente;

	public function __construct($coleccionCuentaCorriente, $coleccionCajaAhorro, $ultimoValorCuentaAsignado, $coleccionCliente){
		$this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
        $this->coleccionCliente = $coleccionCliente;
	}

    //Atributos get/set

    public function getcoleccionCuentaCorriente(){
		return $this->coleccionCuentaCorriente;
	}
	public function setcoleccionCuentaCorriente($coleccionCuentaCorriente){
		$this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
	}

    public function getcoleccionCajaAhorro(){
		return $this->coleccionCajaAhorro;
	}
	public function setcoleccionCajaAhorro($coleccionCajaAhorro){
		$this->coleccionCajaAhorro = $coleccionCajaAhorro;
	}

	public function getultimoValorCuentaAsignado(){
		return $this->ultimoValorCuentaAsignado;
	}
	public function setultimoValorCuentaAsignado($ultimoValorCuentaAsignado){
		$this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
	}

    public function getcoleccionCliente(){
		return $this->coleccionCliente;
	}
	public function setcoleccionCliente($coleccionCliente){
		$this->coleccionCliente = $coleccionCliente;
    }

    //Metodos

    public function incorporarCliente($obj_Cliente){
        $col_Clientes = $this->getcoleccionCliente();
        array_push($col_Clientes, $obj_Cliente);
        $this->setcoleccionCliente($col_Clientes);
    }

    public function incorporarCuentaCorriente($obj_CuentaCorriente){
        if (!in_array($obj_CuentaCorriente->getObj_Cliente(), $this->getcoleccionCliente())) {
            echo "Apertura CC: La persona no es Cliente del Banco.\n";
        }else{
            $col_Cuentas_Corrientes = $this->getcoleccionCuentaCorriente();
            array_push($col_Cuentas_Corrientes, $obj_CuentaCorriente);
            $this->setcoleccionCuentaCorriente($col_Cuentas_Corrientes);
        }        
    }

    public function incorporarCajaAhorro($obj_Caja_Ahorro){
        if (!in_array($obj_Caja_Ahorro->getObj_Cliente(), $this->getcoleccionCliente())) {
            echo "Apertura CA: La persona no es Cliente del Banco.\n";
        }else{
            $col_Cajas_Ahorro = $this->getcoleccionCajaAhorro();
            array_push($col_Cajas_Ahorro, $obj_Caja_Ahorro);
            $this->setcoleccionCajaAhorro($col_Cajas_Ahorro);
        }        
    }

    public function realizarDeposito($numCuenta,$monto){
        $cuenta_No_Encontrada = true;
        foreach($this->getcoleccionCuentaCorriente() as $unaCC){            
            if ($numCuenta == $unaCC->getnumeroCuenta()){
                $unaCC->realizarDeposito($monto);
                echo "Se ha efectuado el deposito en la Cuenta Corriente: ".$numCuenta." de ".$unaCC->getObj_Cliente()->getNombre()." ".$unaCC->getObj_Cliente()->getApellido().".\n";
                $this->setultimoValorCuentaAsignado($unaCC->getSaldo());
                $cuenta_No_Encontrada = false;
            }
		}
        foreach($this->getcoleccionCajaAhorro() as $unaCA){            
            if ($numCuenta == $unaCA->getnumeroCuenta()){
                $unaCA->realizarDeposito($monto);
                echo "Se ha efectuado el deposito en la Caja de Ahorro: ".$numCuenta." de ".$unaCA->getObj_Cliente()->getNombre()." ".$unaCC->getObj_Cliente()->getApellido().".\n";
                $this->setultimoValorCuentaAsignado($unaCA->getSaldo());
                $cuenta_No_Encontrada = false;
            }
		}
        if ($cuenta_No_Encontrada){
            echo "La cuenta numero: ".$numCuenta." no existe en este Banco.\n";
        }
    }

    public function realizarRetiro($numCuenta,$monto){
        $cuenta_No_Encontrada = true;
        foreach($this->getcoleccionCuentaCorriente() as $unaCC){            
            if ($numCuenta == $unaCC->getnumeroCuenta()){
                $unaCC->realizarRetiro($monto);
                echo "Se ha efectuado el retiro en la Cuenta Corriente: ".$numCuenta." de ".$unaCC->getObj_Cliente()->getNombre()." ".$unaCC->getObj_Cliente()->getApellido().".\n";
                $this->setultimoValorCuentaAsignado($unaCC->getSaldo());
                $cuenta_No_Encontrada = false;
            }
		}
        foreach($this->getcoleccionCajaAhorro() as $unaCA){            
            if ($numCuenta == $unaCA->getnumeroCuenta()){
                $unaCA->realizarRetiro($monto);
                echo "Se ha efectuado el retiro en la Caja de Ahorro: ".$numCuenta." de ".$unaCA->getObj_Cliente()->getNombre()." ".$unaCC->getObj_Cliente()->getApellido().".\n";
                $this->setultimoValorCuentaAsignado($unaCA->getSaldo());
                $cuenta_No_Encontrada = false;
            }
		}
        if ($cuenta_No_Encontrada){
            echo "La cuenta numero: ".$numCuenta." no existe en este Banco.\n";
        }
    }


		
	public function __toString(){
		$cadena = "Clientes:\n";
        foreach($this->getColeccionCliente() as $unCliente){
			$cadena=$cadena.$unCliente."\n";
		}
        $cadena = $cadena."Cuentas Corrientes:\n";
        foreach($this->getcoleccionCuentaCorriente() as $unaCC){
			$cadena=$cadena.$unaCC."\n";
		}
        $cadena = $cadena."Cajas Ahorro:\n";
        foreach($this->getcoleccionCajaAhorro() as $unaCA){
			$cadena=$cadena.$unaCA."\n";
		}
        $cadena=$cadena."Ultimo valor asignado a una cuenta: ".$this->getultimoValorCuentaAsignado().".\n";
		return $cadena;
	}
	
}