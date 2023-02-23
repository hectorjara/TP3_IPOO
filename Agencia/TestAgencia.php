<?php
include_once "Destino.php";
include_once "PaqueteTuristico.php";
include_once "Venta.php";
include_once "VentaOnLine.php";
include_once "Agencia.php";

//Se crea una instancia de la clase Destino
$destinoBariloche = new Destino("001", "Bariloche", 250);

//se crea una instancia de la clase PaqueteTuristico
$paqueteBariloche = new PaqueteTuristico("23-05-2014", 3, $destinoBariloche, 25);

//se crea instancia de la clase Agencia
$miAgencia = new Agencia([],[],[]);

//se invoca al método incorporarPaquete
if ($miAgencia->incorporarPaquete($paqueteBariloche)){ echo "Paquete incorporado\n"; }else{echo "Ya existe un paquete con la misma fecha inicial y destino\n";}

//se invoca nuevamente al método incorporarPaquete con el mismo Paquete Turistico
if ($miAgencia->incorporarPaquete($paqueteBariloche)){ echo "Paquete incorporado\n"; }else{echo "Ya existe un paquete con la misma fecha inicial y destino\n";}

//se invoca al método incorporarVenta
$precio = $miAgencia->incorporarVenta($paqueteBariloche,"DNI",27898654,5, false);
if ($precio >= 0){
    echo "Venta confirmada. El importe a pagar es: $".$precio."\n";
}else{echo "No hay plazas suficientes\n";}

$precio = $miAgencia->incorporarVenta($paqueteBariloche,"DNI",27898654,4, true);
if ($precio >= 0){
    echo "Venta confirmada. El importe a pagar es: $".$precio."\n";
}else{echo "No hay plazas suficientes\n";}

$precio = $miAgencia->incorporarVenta($paqueteBariloche,"DNI",27898654,15, true);
if ($precio >= 0){
    echo "Venta confirmada. El importe a pagar es: $".$precio."\n";
}else{echo "No hay plazas suficientes\n";}
?>