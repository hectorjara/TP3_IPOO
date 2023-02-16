<?php
include_once "Rubro.php";
include_once "Producto.php";

$rubroConservas = new Rubro("Conservas", 35);
$rubroRegalos = new Rubro("Regalos", 55);

$prod_Tomate = new Producto(1111111, "Tomate", 40, 21, 950, $rubroConservas);
$prod_Robot = new Producto(1111112, "Robot", 5, 21, 6500, $rubroRegalos);

echo $prod_Tomate;
echo $prod_Robot;

/*
echo $rubroConservas;
echo $rubroRegalos;
*/
?>