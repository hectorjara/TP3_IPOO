<?php
 
class Cliente{

    private $tipoDoc, $numDoc;

	public function __construct($tipoDoc, $numDoc){
		$this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
	}

	public function getTipoDoc(){
		return $this->tipoDoc;
	}
	public function setTipoDoc($tipoDoc){
		return $this->tipoDoc = $tipoDoc;
	}

    public function getNumDoc(){
		return $this->numDoc;
	}
	public function setNumDoc($numDoc){
		return $this->numDoc = $numDoc;
	}

	public function __toString(){
        $cadena = "Tipo de numDoc: ".$this->getTipoDoc().", ";
		$cadena.= "numDoc: ".$this->getNumDoc()."\n";
        return $cadena;    
	}
}
?>