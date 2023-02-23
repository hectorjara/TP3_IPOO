<?php
include_once "Teatro.php";

$miTeatro = new Teatro("Mi Teatro", "Corrientes 10000", [], [], []);
echo $miTeatro;

echo " Ingrese el Nombre de la funcion: ";
$nombreFuncion = trim(fgets(STDIN));
echo $nombreFuncion;



?>