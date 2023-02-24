<?php
include_once "Teatro.php";

$miTeatro = new Teatro("Mi Teatro", "Corrientes 10000", [], [], []);

$sigue = "s";
While ($sigue=="S" || $sigue=="s" ){
    echo $miTeatro;
    echo "El costo total del uso del Teatro para el mes es: $".$miTeatro->darCostos()."\n\n";
    echo " Que tipo de funcion desea ingresar?\n";
    echo " 1 - Teatro \n";
    echo " 2 - Cine  \n";
    echo " 3 - Musical \n";
    echo " 7 - Salir \n";
    $op = trim(fgets(STDIN));
    
    if ($op==1){
        $miTeatro->insertarFuncionTeatro("Teatro");
    }

    if ($op==2){
        $miTeatro->insertarFuncionTeatro("Cine");
    }	
    
    if ($op==3){
        $miTeatro->insertarFuncionTeatro("Musical");
    }else
    
    if ($op==7){
        exit;
    }
    echo " Desea realizar otra operacion? S/s \n";
    $sigue = trim(fgets(STDIN));
}


?>