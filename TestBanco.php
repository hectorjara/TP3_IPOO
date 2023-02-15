<?php
include_once "Cliente.php";
include_once "CajaAhorro.php";
include_once "CuentaCorriente.php";
include_once "Banco.php";
/*
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

*/

$cliente1 = new Cliente(001, 10123456, "Juan", "Perez");
echo $cliente1;

$cliente2 = new Cliente(002, 20123456, "Luis", "Garcia");
echo $cliente2;

$cliente3 = new Cliente(003, 30123456, "Miguel", "Sanchez");
echo $cliente3;

$cliente4 = new Cliente(004, 40123456, "Ana", "Mendoza");
echo $cliente4;

$col_CC = 0;
$col_CA = 0;
$valor = 0;
$col_Clientes = [$cliente1, $cliente2];

$unBanco = new Banco($col_CC, $col_CA, $valor, $col_Clientes);
$unBanco->incorporarCliente($cliente3);
$unBanco->incorporarCliente($cliente4);
echo $unBanco;


?>