<?php
include_once "Cliente.php";
include_once "CajaAhorro.php";
include_once "CuentaCorriente.php";
include_once "Banco.php";

$unBanco = new Banco([],[],0,[]);
//Clientes
$cliente1 = new Cliente(001, 10123456, "Juan", "Perez");
$cliente2 = new Cliente(002, 20123456, "Luis", "Garcia");
$unBanco->incorporarCliente($cliente1);
$unBanco->incorporarCliente($cliente2);
//Cuentas Corrientes
$cuentaCorriente1 = new CuentaCorriente(11111, $cliente1, 0, 151);//De acuerdo al Monto maximo de giro, cambia el resultado
$cuentaCorriente2 = new CuentaCorriente(22222, $cliente2, 0, 20000);
$unBanco->incorporarCuentaCorriente($cuentaCorriente1);
$unBanco->incorporarCuentaCorriente($cuentaCorriente2);
//Cajas de Ahorro
$cajaAhorro1 = new CajaAhorro(1234, $cliente1, 0);
$cajaAhorro2 = new CajaAhorro(2345, $cliente1, 0);
$cajaAhorro3 = new CajaAhorro(3456, $cliente2, 0);
$unBanco->incorporarCajaAhorro($cajaAhorro1);
$unBanco->incorporarCajaAhorro($cajaAhorro2);
$unBanco->incorporarCajaAhorro($cajaAhorro3);
//Depositos en Cajas de Ahorro
$unBanco->realizarDeposito(1234,300);
$unBanco->realizarDeposito(2345,300);
$unBanco->realizarDeposito(3456,300);
//Transferencia de $150
$unBanco->transferir($cuentaCorriente1, $cajaAhorro2, 150 );
echo $unBanco;
?>