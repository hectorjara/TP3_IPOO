<?php
include_once "Teatro.php";
include_once "Funcion.php";

$miTeatro = new Teatro("Mi Teatro", "Corrientes 10000", [], [], []);

$sigue = "s";
While ($sigue=="S" || $sigue=="s" ){
    echo " Que tipo de funcion desea ingresar?\n";
    echo " 1 - Teatro \n";
    echo " 2 - Cine  \n";
    echo " 3 - Musical \n";
    echo " 7 - Salir \n";
    $op = trim(fgets(STDIN));
    
    if ($op==1){
        $miTeatro->insertarFuncionTeatro();
    }

    if ($op==2 && $mAbmSector){
        $miTeatro->insertarFuncionTeatro();
    }	
    
    if ($op==3 && $mAbmEmpleados){
        $miTeatro->insertarFuncionTeatro();
    }else
    
    if ($op==7){
        exit;
    }
    echo " Desea realizar otra operacion? S/s \n";
    $sigue = trim(fgets(STDIN));
}
echo $miTeatro;

?>