<?php
Class Teatro {

	private $nombre, $direccion, $colFuncionTeatro, $colFuncionCine, $colFuncionMusical;

	public function __construct($nombre, $direccion, $colFuncionTeatro, $colFuncionCine, $colFuncionMusical){
		$this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->colFuncionTeatro = $colFuncionTeatro;
        $this->colFuncionCine= $colFuncionCine;
        $this->colFuncionMusical= $colFuncionMusical;
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

	public function getColFuncionTeatro(){
		return $this->colFuncionTeatro;
	}
	public function setColFuncionTeatro($colFuncionTeatro){
		$this->colFuncionTeatro = $colFuncionTeatro;
	}

    public function getColFuncionCine(){
		return $this->colFuncionCine;
	}
	public function setColFuncionCine($colFuncionCine){
		$this->colFuncionCine = $colFuncionCine;
	}

    public function getColFuncionMusical(){
		return $this->colFuncionMusical;
	}
	public function setColFuncionMusical($colFuncionMusical){
		$this->colFuncionMusical = $colFuncionMusical;
	}

	public function __toString(){
		$cadena = "Teatro:\n*******\n".
                  "Nombre: ". $this->getNombre()."\n".
                  "Direccion: ".$this->getDireccion()."\n";

        $cadena = $cadena."Funciones de Teatro:\n********************\n";
        foreach($this->getColFuncionTeatro() as $unaFuncion){
            $cadena=$cadena.$unaFuncion."\n";
        }

        $cadena = $cadena."Funciones de Cine:\n******************\n";
        foreach($this->getColFuncionCine() as $unaFuncion){
            $cadena=$cadena.$unaFuncion."\n";
        }

        $cadena = $cadena."Funciones Musicales:\n********************\n";
        foreach($this->getColFuncionMusical() as $unaFuncion){
            $cadena=$cadena.$unaFuncion."\n";
        }

		return $cadena;
	}	
}
?>