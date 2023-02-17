<?php
include_once "Rubro.php";
include_once "ProductoRegional.php";
include_once "ProductoImportado.php";
include_once "Ventas.php";
include_once "Local.php";

$rubroConservas = new Rubro("Conservas", 35);
$rubroRegalos = new Rubro("Regalos", 55);
/*
echo $rubroConservas;
echo $rubroRegalos;
*/
$prod_Tomate = new ProductoRegional(1111111, "Tomate", 40, 21, 950, $rubroConservas, 10);
$prod_Robot = new ProductoRegional(1111112, "Robot", 5, 21, 6500, $rubroRegalos, 10);
$prod_Tomate_Importado = new ProductoImportado(2111111, "Tomate Importado", 40, 21, 950, $rubroConservas);
//echo $prod_Tomate;
//echo $prod_Robot;
//echo $prod_Tomate_Importado;

$productosVendidos = [$prod_Tomate, $prod_Robot, $prod_Tomate];
$nuevaVenta = new Ventas("12-02-2023",$productosVendidos,"Juan Garcia");
/*
echo $nuevaVenta;
echo $nuevaVenta->darImporteVenta();
*/
$col_Prod_Regional = array($prod_Tomate);
$miLocal = new Local([], $col_Prod_Regional,[]);
$miLocal->incorporarProductoLocal($prod_Robot);
echo $miLocal;

?>