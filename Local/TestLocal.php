<?php
include_once "Rubro.php";
include_once "ProductoRegional.php";
include_once "ProductoImportado.php";
include_once "Local.php";

//Se crean 2 rubros
$rubroConservas = new Rubro("Conservas", 35);
$rubroRegalos = new Rubro("Regalos", 55);

//Se crean 4 instancias de la clase Producto
$prod_Tomate = new ProductoRegional(1111111, "Tomate", 40, 21, 950, $rubroConservas, 10);
$prod_Robot = new ProductoRegional(1111112, "Robot", 5, 21, 6500, $rubroRegalos, 10);
$prod_Tomate_Importado = new ProductoImportado(2111111, "Tomate Importado", 40, 21, 960, $rubroConservas);
$prod_Robot_Importado = new ProductoImportado(2111112, "Robot Importado", 6, 21, 6800, $rubroRegalos);

$miLocal = new Local([], [], []); //Las pruebas detalladas se encuentran en Temp_Test_Local.php

//Se incorpora cada instancia de la clase Producto a la Tienda
echo "\n";
$miLocal->incorporarProductoLocal($prod_Tomate);
$miLocal->incorporarProductoLocal($prod_Robot);
$miLocal->incorporarProductoLocal($prod_Tomate_Importado);
$miLocal->incorporarProductoLocal($prod_Robot_Importado);
$miLocal->incorporarProductoLocal($prod_Robot_Importado);
echo "\n";
//Se retorna el precio de venta de cada uno de los productos creados.
$col_Prod_Regionales = $miLocal->getcol_Prod_Reg();
$col_Prod_Importados = $miLocal->getcol_Prod_Imp();
foreach ($col_Prod_Importados as $prodImportado){ //echo $prodImportado; --Muestra el Producto y entre los datos, el precio de venta.
    echo "El precio de '".$prodImportado->getDescripcion()."' es $".$prodImportado->darPrecioVenta()."\n";
}
foreach ($col_Prod_Regionales as $prodRegional){
    echo "El precio de '".$prodRegional->getDescripcion()."' es $".$prodRegional->darPrecioVenta()."\n";
}

//Se retorna el costo en productos que tiene hasta el momento la tienda
echo "\n";
echo "El costo total de los productos en stock es: ".$miLocal->retornarCostoProductoLocal()."\n";
?>