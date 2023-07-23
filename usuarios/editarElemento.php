<?php

include "../conexion.php";
if(!isset($_POST['id'])){
    $t_id="0";
} else{
    $t_id=$_POST['id'];
}
if(!isset($_POST['nombre'])){
    $t_nombre="";
} else{
    $t_nombre=$_POST['nombre'];
}
if(!isset($_POST['clave'])){
    $t_clave="";
} else{
    $t_clave=$_POST['clave'];
}
if(!isset($_POST['grupo'])){
    $t_grupo="";
} else{
    $t_grupo=$_POST['grupo'];
}


// die("+" . $t_id . "...." . $t_nombre . "----" . $t_ubicacion);
    $conexion->query("update usuarios set
    nombre='".$t_nombre."', 
    clave='".password_hash($t_clave,PASSWORD_DEFAULT)."', 
    grupo='".$t_grupo."' where id='".$t_id."'"); 
header('Location: ../usuarios.php');
?>