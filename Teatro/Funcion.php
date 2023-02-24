<?php
Class Funcion {

	private $nombre, $horarioInicio, $duracion, $precio;

	public function __construct($nombre, $horarioInicio, $duracion, $precio){
		$this->nombre = $nombre;
        $this->horarioInicio = $horarioInicio;
        $this->duracion = $duracion;
        $this->precio = $precio;
	}

    public function getNombre(){
		return $this->nombre;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

    public function getHorarioInicio(){
		return $this->horarioInicio;
	}
	public function setHorarioInicio($horarioInicio){
		$this->horarioInicio = $horarioInicio;
	}

	public function getDuracion(){
		return $this->duracion;
	}
	public function setDuracion($duracion){
		$this->duracion = $duracion;
	}

    public function getPrecio(){
		return $this->precio;
	}
	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function obtenerHorarioSalida(){
		// Convertir horario y duración a minutos
		$horario_minutos = intval(substr($this->getHorarioInicio(), 0, 2)) * 60 + intval(substr($this->getHorarioInicio(), 3, 2));
		$duracion_minutos = intval(substr($this->getDuracion(), 0, 2)) * 60 + intval(substr($this->getDuracion(), 3, 2));
		// Sumar minutos del horario y la duración
		$total_minutos = $horario_minutos + $duracion_minutos;
		// Convertir el resultado a horas y minutos
		$hora = floor($total_minutos / 60);
		$minutos = $total_minutos % 60;
		// Devuelve el horario sumado
		return sprintf("%02d:%02d", $hora, $minutos);
	}

	public function __toString(){
		$cadena = "Funcion:\n*******\n".
                  "Nombre: ". $this->getNombre()."\n".
                  "Horario de inicio: ".$this->getHorarioInicio()."\n".
                  "Duracion: ".$this->getDuracion()."\n".
                  "Precio: ".$this->getPrecio()."\n";
		return $cadena;
	}	
}
?>