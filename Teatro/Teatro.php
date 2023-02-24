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

    function intervalosIntersectan($entrada1, $salida1, $entrada2, $salida2) {
        if ($entrada1 <= $entrada2 && $salida1 >= $entrada2) {
            // Intervalo 1 comienza antes o al mismo tiempo que el intervalo 2 y termina después del inicio del intervalo 2
            return true;
        } elseif ($entrada2 <= $entrada1 && $salida2 >= $entrada1) {
            // Intervalo 2 comienza antes o al mismo tiempo que el intervalo 1 y termina después del inicio del intervalo 1
            return true;
        } else {
            // No hay intersección
            return false;
        }
    }

    public function verificarHorario($objetoFuncion){
        $colFuncionTeatro = $this->getColFuncionTeatro();
        $i = 0;
        $encontrado = false;
        $entrada1 = $objetoFuncion->getHorarioInicio();
        $salida1 = $objetoFuncion->obtenerHorarioSalida();
        while ($i<count($colFuncionTeatro) && !$encontrado){
            $unaFuncion = $colFuncionTeatro[$i];
            $entrada2 = $unaFuncion->getHorarioInicio();
            $salida2 = $unaFuncion->obtenerHorarioSalida();

            $encontrado = $this->intervalosIntersectan($entrada1, $salida1, $entrada2, $salida2);
            $i++;
        }
        if ($encontrado){
            return true;
        }else{
            $colFuncionCine = $this->getColFuncionCine();
            $i = 0;
            while ($i<count($colFuncionCine) && !$encontrado){
                $unaFuncion = $colFuncionCine[$i];
                $entrada2 = $unaFuncion->getHorarioInicio();
                $salida2 = $unaFuncion->obtenerHorarioSalida();    
                $encontrado = $this->intervalosIntersectan($entrada1, $salida1, $entrada2, $salida2);
                $i++;
            }
        }
        if($encontrado){
            return true;
        }else{
            $colFuncionMusical = $this->getColFuncionMusical();
            $i = 0;
            while ($i<count($colFuncionMusical) && !$encontrado){
                $unaFuncion = $colFuncionMusical[$i];
                $entrada2 = $unaFuncion->getHorarioInicio();
                $salida2 = $unaFuncion->obtenerHorarioSalida();    
                $encontrado = $this->intervalosIntersectan($entrada1, $salida1, $entrada2, $salida2);
                $i++;
            }
        }
        if($encontrado){
            return true;
        }else{
            return false;
        }
    }

    public function insertarFuncionTeatro(){
        echo "Ingrese el Nombre de la Funcion >\n";
        $nombreFuncion = trim(fgets(STDIN));
        echo "Ingrese el horario de inicio de la Funcion >\n";
        $horarioInicio = trim(fgets(STDIN));
        echo "Ingrese la duracion de la Funcion >\n";
        $duracion = trim(fgets(STDIN));
        echo "Ingrese el precio de la Funcion >\n";
        $precio = trim(fgets(STDIN));

        $nuevaFuncion = new Funcion($nombreFuncion, $horarioInicio, $duracion, $precio);
        $horariosSeIntersectan = $this->verificarHorario($nuevaFuncion);
        
        if ($horariosSeIntersectan){
            echo "Eliga otro horario y duracion. Observe la lista de funciones\n";
        }else{
            $colFuncionTeatro = $this->getColFuncionTeatro();
            array_push($colFuncionTeatro, $nuevaFuncion);
            $this->setColFuncionTeatro($colFuncionTeatro);
            echo "La nueva Funcion de Teatro ha sido ingresada con exito.\n";
        }
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