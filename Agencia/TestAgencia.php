<?php
include_once "Destino.php";
include_once "PaqueteTuristico.php";
include_once "Venta.php";
include_once "Cliente.php";

//Se crea una instancia de la clase Destino
$destinoBariloche = new Destino("001", "Bariloche", 250);
//echo $destinoBariloche;
$paqueteBariloche = new PaqueteTuristico("23/05/2014", 3, $destinoBariloche, 25);
echo $paqueteBariloche;

$cliente1 = new Cliente("DNI", 27898654);
$ventaBariloche = new Venta("01/02/2014", $paqueteBariloche, 5, $cliente1);
echo $ventaBariloche;
?>