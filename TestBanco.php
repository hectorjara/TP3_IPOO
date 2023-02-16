<?php
include_once "Cliente.php";
include_once "CajaAhorro.php";
include_once "CuentaCorriente.php";
include_once "Banco.php";


/*
Primer prueba

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
/*
Segunda prueba

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
*/
/*
Tercera prueba

$cliente1 = new Cliente(001, 10123456, "Juan", "Perez");
echo $cliente1;

$cliente2 = new Cliente(002, 20123456, "Luis", "Garcia");
echo $cliente2;

$cliente3 = new Cliente(003, 30123456, "Miguel", "Sanchez");
echo $cliente3;

$cliente4 = new Cliente(004, 40123456, "Ana", "Mendoza");
echo $cliente4;
//Creamos 2 Cuentas Corrientes, uno para un cliente del banco y el otro no
$cuentaCorriente1 = new CuentaCorriente(4321, $cliente1, 10000, 20000);
echo $cuentaCorriente1;
$cuentaCorriente4 = new CuentaCorriente(5432, $cliente4, 1000, 12000);
echo $cuentaCorriente4;
//Creamos 2 Cajas de Ahorro, uno para un cliente del banco y el otro no
$cajaAhorro1 = new CajaAhorro(1234, $cliente1, 10000);
echo $cajaAhorro1;
$cajaAhorro4 = new CajaAhorro(2345, $cliente4, 1000);
echo $cajaAhorro4;

$col_CC = [$cuentaCorriente1];
$col_CA = [$cajaAhorro1];
$valor = 0;
$col_Clientes = [$cliente1, $cliente2];

$unBanco = new Banco($col_CC, $col_CA, $valor, $col_Clientes);
$unBanco->incorporarCliente($cliente3);
echo $unBanco;

$unBanco->incorporarCuentaCorriente($cuentaCorriente1);
$unBanco->incorporarCuentaCorriente($cuentaCorriente4);

$unBanco->incorporarCajaAhorro($cajaAhorro1);
$unBanco->incorporarCajaAhorro($cajaAhorro4);
*/

$cliente1 = new Cliente(001, 10123456, "Juan", "Perez");
echo $cliente1;

$cliente2 = new Cliente(002, 20123456, "Luis", "Garcia");
echo $cliente2;

$cliente3 = new Cliente(003, 30123456, "Miguel", "Sanchez");
echo $cliente3;

$cliente4 = new Cliente(004, 40123456, "Ana", "Mendoza");
echo $cliente4;
//Creamos 2 Cuentas Corrientes, uno para un cliente del banco y el otro no
$cuentaCorriente1 = new CuentaCorriente(11111, $cliente1, 10000, 20000);
echo $cuentaCorriente1;
$cuentaCorriente2 = new CuentaCorriente(22222, $cliente1, 10000, 20000);
echo $cuentaCorriente2;
$cuentaCorriente3 = new CuentaCorriente(33333, $cliente1, 10000, 20000);
echo $cuentaCorriente3;
$cuentaCorriente4 = new CuentaCorriente(44444, $cliente4, 1000, 12000);
echo $cuentaCorriente4;
//Creamos 2 Cajas de Ahorro, uno para un cliente del banco y el otro no
$cajaAhorro1 = new CajaAhorro(1234, $cliente1, 10000);
echo $cajaAhorro1;
$cajaAhorro2 = new CajaAhorro(2345, $cliente1, 10000);
echo $cajaAhorro2;
$cajaAhorro3 = new CajaAhorro(3456, $cliente1, 10000);
echo $cajaAhorro3;
$cajaAhorro4 = new CajaAhorro(4567, $cliente4, 1000);
echo $cajaAhorro4;

$col_CC = [$cuentaCorriente1];
$col_CA = [$cajaAhorro1];
$valor = 0;
$col_Clientes = [$cliente1, $cliente2];

$unBanco = new Banco($col_CC, $col_CA, $valor, $col_Clientes);
$unBanco->incorporarCliente($cliente3);


$unBanco->incorporarCuentaCorriente($cuentaCorriente2);
$unBanco->incorporarCuentaCorriente($cuentaCorriente4);

$unBanco->incorporarCajaAhorro($cajaAhorro2);
$unBanco->incorporarCajaAhorro($cajaAhorro4);

$unBanco->realizarDeposito(11111,2000);
$unBanco->realizarDeposito(44444,2000);

$unBanco->realizarDeposito(1234,2000);
$unBanco->realizarDeposito(4567,2000);

echo $unBanco;
?>