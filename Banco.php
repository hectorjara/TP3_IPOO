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


		
	public function __toString(){
		$cadena = "Clientes:\n";
        foreach($this->getColeccionCliente() as $unCliente){
			$cadena=$cadena.$unCliente."\n";
		}
		return $cadena;
	}
	
}