<?php
include_once "Destino.php";
include_once "PaqueteTuristico.php";
include_once "Venta.php";
include_once "VentaOnLine.php";
include_once "Agencia.php";

//Se crea una instancia de la clase Destino
$destinoBariloche = new Destino("001", "Bariloche", 250);
//echo $destinoBariloche;
$paqueteBariloche = new PaqueteTuristico("23/05/2014", 3, $destinoBariloche, 25);//$fechaDesde, $cantDias, $destino, $totalPlazas
$paqueteBariloche2 = new PaqueteTuristico("3/05/2014", 2, $destinoBariloche, 10);
$paqueteBariloche3 = new PaqueteTuristico("3/05/2014", 4, $destinoBariloche, 15);
//echo $paqueteBariloche;

$ventaBariloche = new Venta("01/02/2014", $paqueteBariloche, 5, "DNI", 27898654);
$ventaOnLineBariloche = new VentaOnLine("01/02/2014", $paqueteBariloche, 5, "DNI", 27898654, 10);
/*
echo $ventaBariloche;
echo $ventaOnLineBariloche;
echo "El importe de la venta es: $".$ventaBariloche->darImporteVenta()."\n";
echo "El importe de la venta online es: $".$ventaOnLineBariloche->darImporteVenta()."\n";
*/

$colPT = [$paqueteBariloche];
//$colVentas = [$ventaBariloche];
$colVentasOL = [$ventaOnLineBariloche];
$miAgencia = new Agencia($colPT, [], $colVentasOL); //$colPT, $colVentas, $colVentasOL

//Incorporar Paquete
if ($miAgencia->incorporarPaquete($paqueteBariloche2)){ echo "Paquete incorporado\n"; }else{echo "Ya existe un paquete con la misma fecha inicial y destino\n";}
if ($miAgencia->incorporarPaquete($paqueteBariloche3)){ echo "Paquete incorporado\n"; }else{echo "Ya existe un paquete con la misma fecha inicial y destino\n";}

//Incorporar Venta
$precio = $miAgencia->incorporarVenta($paqueteBariloche,"DNI",27898654,5, false);
if ($precio >= 0){
    echo "Venta confirmada. El importe a pagar es: $".$precio."\n";
}else{echo "No hay plazas suficientes\n";}
$precio = $miAgencia->incorporarVenta($paqueteBariloche,"DNI",27898654,5, true);
if ($precio >= 0){
    echo "Venta confirmada. El importe a pagar es: $".$precio."\n";
}else{echo "No hay plazas suficientes\n";}
$precio = $miAgencia->incorporarVenta($paqueteBariloche,"DNI",27898654,30, false);
if ($precio >= 0){
    echo "Venta confirmada. El importe a pagar es: $".$precio."\n";
}else{echo "No hay plazas suficientes\n";}


//informarPaquetesTuristicos(fecha,destino):
$colPTconFechaYDestino = $miAgencia->informarPaquetesTuristicos("3/05/2014", $destinoBariloche);
foreach ($colPTconFechaYDestino as $unPTFYD){
    echo $unPTFYD;
}

//paqueteMasEcomomico(fecha,destino)
echo "El Paquete Turistico mas economico es:\n".$miAgencia->paqueteMasEcomomico("23/05/2014",$destinoBariloche)."\n";


//echo $miAgencia;
?>