<?php
include_once "Destino.php";
include_once "PaqueteTuristico.php";
include_once "Venta.php";
include_once "VentaOnLine.php";
include_once "Cliente.php";
include_once "Agencia.php";

//Se crea una instancia de la clase Destino
$destinoBariloche = new Destino("001", "Bariloche", 250);
//echo $destinoBariloche;
$paqueteBariloche = new PaqueteTuristico("23/05/2014", 3, $destinoBariloche, 25);//$fechaDesde, $cantDias, $destino, $totalPlazas
$paqueteBariloche2 = new PaqueteTuristico("3/05/2014", 3, $destinoBariloche, 10);
$paqueteBariloche3 = new PaqueteTuristico("3/05/2014", 4, $destinoBariloche, 15);
//echo $paqueteBariloche;

$cliente1 = new Cliente("DNI", 27898654);
$ventaBariloche = new Venta("01/02/2014", $paqueteBariloche, 5, $cliente1);
$ventaOnLineBariloche = new VentaOnLine("01/02/2014", $paqueteBariloche, 5, $cliente1, 10);
echo $ventaBariloche;
echo $ventaOnLineBariloche;
echo "El importe de la venta es: $".$ventaBariloche->darImporteVenta()."\n";
echo "El importe de la venta online es: $".$ventaOnLineBariloche->darImporteVenta()."\n";

$colPT = [$paqueteBariloche];
$colVentas = [$ventaBariloche];
$colVentasOL = [$ventaOnLineBariloche];
$miAgencia = new Agencia($colPT, $colVentas, $colVentasOL); //$colPT, $colVentas, $colVentasOL

if ($miAgencia->incorporarPaquete($paqueteBariloche2)){ echo "Paquete incorporado\n"; }else{echo "Ya existe un paquete con la misma fecha inicial y destino\n";}
if ($miAgencia->incorporarPaquete($paqueteBariloche3)){ echo "Paquete incorporado\n"; }else{echo "Ya existe un paquete con la misma fecha inicial y destino\n";}

echo $miAgencia;
?>