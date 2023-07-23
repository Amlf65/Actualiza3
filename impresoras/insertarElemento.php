<?php

include "../conexion.php";

if(!isset($_POST['id'])){
    $t_id="0";
} else{
    $t_id=$_POST['id'];
}
if(!isset($_POST['ubicacion'])){
    $t_ubicacion="";
} else{
    $t_ubicacion=$_POST['ubicacion'];
}
if(!isset($_POST['area'])){
    $t_area="";
} else{
    $t_area=$_POST['area'];
}
if(!isset($_POST['nombre'])){
    $t_nombre="";
} else{
    $t_nombre=$_POST['nombre'];
}
if(!isset($_POST['marca'])){
    $t_marca="";
} else{
    $t_marca=$_POST['marca'];
}
if(!isset($_POST['modelo'])){
    $t_modelo="";
} else{
    $t_modelo=$_POST['modelo'];
}
if(!isset($_POST['serie'])){
    $t_serie="";
} else{
    $t_serie=$_POST['serie'];
}
if(!isset($_POST['conexion'])){
    $t_conexion="";
} else{
    $t_conexion=$_POST['conexion'];
}
if(!isset($_POST['obs'])){
    $t_observaciones="";
} else{
    $t_observaciones=$_POST['obs'];
}
   
$conexion->query("insert into impresoras (nombre, marca, 
modelo, serie, conexion, ubicacion, area, observaciones)
values('".$t_nombre."','".$t_marca."','".$t_modelo."', 
 '".$t_serie."','".$t_conexion."','".$t_ubicacion."',
 '".$t_area."','".$t_observaciones."')");

header('Location: ../impresoras.php');

?>
