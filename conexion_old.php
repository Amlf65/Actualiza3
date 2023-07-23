<?php
    $servidor="sql300.epizy.com";
    $nombreBd="epiz_32947124_inventario";
    $usuario="epiz_32947124";
    $pass="CupEQkZU85K";
    //$servidor="localhost";
    //$nombreBd="inventario";
    //$usuario="root";
    //$pass="";
    $conexion= new mysqli($servidor,$usuario,$pass,$nombreBd);
    mysqli_set_charset($conexion,"utf8");
    if($conexion->connect_error){
        die("No se pudo establecer la conexión");
    }
?>