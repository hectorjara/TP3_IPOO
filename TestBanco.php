<?php
include_once "Cliente.php";
include_once "CajaAhorro.php";
include_once "CuentaCorriente.php";

$primerCliente = new Cliente(001, 10123456, "Juan", "Perez");
echo $primerCliente;

$cajaAhorro1 = new CajaAhorro(1234, $primerCliente, 10000);
echo $cajaAhorro1;

$cuentaCorriente1 = new CuentaCorriente(4321, $primerCliente, 10000, 20000);
echo $cuentaCorriente1;

echo "\n----------\n";
echo "Prueba: Deposito y retiro en Caja de Ahorro";
echo "\n----------\n";

$cajaAhorro1->realizarDeposito(15000);
echo $cajaAhorro1;
$cajaAhorro1->realizarRetiro(5000);
echo $cajaAhorro1;

echo "\n----------\n";
echo "Prueba: Deposito y retiro en Cuenta Corriente";
echo "\n----------\n";

$cuentaCorriente1->realizarDeposito(25000);
echo $cuentaCorriente1;
$cuentaCorriente1->realizarRetiro(5000);
echo $cuentaCorriente1;
$cuentaCorriente1->realizarRetiro(22000);
echo $cuentaCorriente1;
?>