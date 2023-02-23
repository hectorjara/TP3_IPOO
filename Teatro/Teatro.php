<?php
Class Teatro {

	private $nombre, $direccion, $colFunciones;

	public function __construct($nombre, $direccion, $colFunciones){
		$this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->colFunciones = $colFunciones;
	}

    public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

    public function getDireccion(){
		return $this->direccion;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getColFunciones(){
		return $this->colFunciones;
	}
	public function setColFunciones($colFunciones){
		$this->colFunciones = $colFunciones;
	}

	public function __toString(){
		$cadena = "Teatro:\n*******\n".
                  "Nombre: ". $this->getNombre()."\n".
                  "Direccion: ".$this->getDireccion()."\n";

        $cadena = $cadena."Funciones:\n*********\n";
        foreach($this->getcolFunciones() as $unaFuncion){
            $cadena=$cadena.$unaFuncion."\n";
        }

		return $cadena;
	}	
}