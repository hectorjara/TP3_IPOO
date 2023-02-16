<?php
Class Persona {
	
	private $dni, $nombre, $apellido;

	public function __construct($dni, $nombre, $apellido){
		$this->dni = $dni;
        $this->nombre = $nombre;
		$this->apellido = $apellido;
	}

    public function getDNI(){
		return $this->dni;
	}
	public function setDNI($dni){
		$this->dni = $dni;
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	
	public function getApellido(){
		return $this->apellido;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
		
	public function __toString(){
		$cadena = "Dni: ". $this->getDNI().", Nombre: ".$this->getNombre().", Apellido: ".$this->getApellido().".\n";
		return $cadena;
	}

	
}
