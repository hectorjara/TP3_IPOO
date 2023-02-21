<?php
include_once "Destino.php";
include_once "PaqueteTuristico.php";

//Se crea una instancia de la clase Destino
$destinoBariloche = new Destino("001", "Bariloche", 250);
//echo $destinoBariloche;
$paqueteBariloche = new PaqueteTuristico("23/05/2014", 3, $destinoBariloche, 25);
echo $paqueteBariloche;
?>