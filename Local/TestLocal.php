<?php
include_once "Rubro.php";
include_once "ProductoRegional.php";

$rubroConservas = new Rubro("Conservas", 35);
$rubroRegalos = new Rubro("Regalos", 55);

$prod_Tomate = new ProductoRegional(1111111, "Tomate", 40, 21, 950, $rubroConservas, 10);
$prod_Robot = new ProductoRegional(1111112, "Robot", 5, 21, 6500, $rubroRegalos, 10);

echo $prod_Tomate;
echo $prod_Robot;

/*
echo $rubroConservas;
echo $rubroRegalos;
*/
?>