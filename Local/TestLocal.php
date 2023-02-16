<?php
include_once "Rubro.php";
include_once "ProductoRegional.php";
include_once "ProductoImportado.php";

$rubroConservas = new Rubro("Conservas", 35);
$rubroRegalos = new Rubro("Regalos", 55);

$prod_Tomate = new ProductoRegional(1111111, "Tomate", 40, 21, 950, $rubroConservas, 10);
$prod_Robot = new ProductoRegional(1111112, "Robot", 5, 21, 6500, $rubroRegalos, 10);
$prod_Tomate_Importado = new ProductoImportado(2111111, "Tomate Importado", 40, 21, 950, $rubroConservas);
echo $prod_Tomate;
echo $prod_Robot;
echo $prod_Tomate_Importado;

/*
echo $rubroConservas;
echo $rubroRegalos;
*/
?>