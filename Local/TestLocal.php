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

$productosVendidos1= [$prod_Tomate, $prod_Robot, $prod_Tomate];
$productosVendidos2= [$prod_Tomate, $prod_Robot, $prod_Tomate, $prod_Robot_Importado, $prod_Robot_Importado];
$productosVendidos3= [$prod_Tomate, $prod_Tomate, $prod_Tomate, $prod_Robot_Importado]; //El lector del codigo barra cada producto uno por uno
$venta1 = new Ventas("12-02-2023",$productosVendidos1,"Juan Garcia");
$venta2 = new Ventas("13-02-2023",$productosVendidos2,"Juan Garcia");
$venta3 = new Ventas("12-02-2023",$productosVendidos3,"Juan Garcia");
/*
echo $venta1;
echo $venta1->darImporteVenta();
*/
$col_Prod_Regional = array($prod_Tomate);
$col_Ventas = array($venta1, $venta2, $venta3);

$miLocal = new Local([], $col_Prod_Regional,$col_Ventas);
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

// informarProductosMasVendidos

$n = 3; $anio = 2023;
$col_los_n_mas_vendidos_del_anio = $miLocal->informarProductosMasVendidos($anio, $n);
if ($col_los_n_mas_vendidos_del_anio){
    echo "Los ".$n." productos mas vendidos del año ".$anio." son:\n";
    foreach ($col_los_n_mas_vendidos_del_anio as $topAnio){
        echo $topAnio[0]." ".$topAnio[1]. " cantidad de veces vendidas\n";
    }
}else{
    echo "La cantidad de productos no es tan grande como el numero solicitado.";
}


?>