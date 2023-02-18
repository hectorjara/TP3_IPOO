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
$prod_Tomate_Importado = new ProductoImportado(2111111, "Tomate Importado", 40, 21, 960, $rubroConservas);
$prod_Robot_Importado = new ProductoImportado(2111112, "Robot Importado", 6, 21, 6800, $rubroRegalos);
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
if ($miLocal->incorporarProductoLocal($prod_Tomate_Importado)){
    echo "Producto Incorporado\n";
}else{
    echo "El Producto ya se encuentra registrado\n";
};

if ($miLocal->incorporarProductoLocal($prod_Robot_Importado)){
    echo "Producto Incorporado\n";
}else{
    echo "El Producto ya se encuentra registrado\n";
};

echo $miLocal;
echo "El precio de venta del Producto con el codigo de barra 1111111 es: ".$miLocal->retornarImporteProducto(2111111)."\n";
echo "El costo total de los productos en stock es: ".$miLocal->retornarCostoProductoLocal()."\n";
echo "El Producto mas barato del rubro Conservas es:\n ".$miLocal->productoMasEcomomico($rubroConservas)."\n";
echo "El Producto mas barato del rubro Regalos es:\n ".$miLocal->productoMasEcomomico($rubroRegalos)."\n";
?>