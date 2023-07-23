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
if(!isset($_POST['sistema'])){
    $t_sistema="";
} else{
    $t_sistema=$_POST['sistema'];
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
if(!isset($_POST['placa'])){
    $t_placa="";
} else{
    $t_placa=$_POST['placa'];
}
if(!isset($_POST['cpu'])){
    $t_CPU="";
} else{
    $t_CPU=$_POST['cpu'];
}
if(!isset($_POST['tipo'])){
    $t_tipo="";
} else{
    $t_tipo=$_POST['tipo'];
}
if(!isset($_POST['bios'])){
    $t_bios="";
} else{
    $t_bios=$_POST['bios'];
}
if(!isset($_POST['serie'])){
    $t_serie="";
} else{
    $t_serie=$_POST['serie'];
}
if(!isset($_POST['disk1'])){
    $t_disk1="";
} else{
    $t_disk1=$_POST['disk1'];
}
if(!isset($_POST['disk2'])){
    $t_disk2="";
} else{
    $t_disk2=$_POST['disk2'];
}
if(!isset($_POST['bank0'])){
    $t_bank0="";
} else{
    $t_bank0=$_POST['bank0'];
}
if(!isset($_POST['bank1'])){
    $t_bank1="";
} else{
    $t_bank1=$_POST['bank1'];
}
if(!isset($_POST['bank2'])){
    $t_bank2="";
} else{
    $t_bank2=$_POST['bank2'];
}
if(!isset($_POST['bank3'])){
    $t_bank3="";
} else{
    $t_bank3=$_POST['bank3'];
}
if(!isset($_POST['software'])){
    $t_software="";
} else{
    $t_software=$_POST['software'];
}
if(!isset($_POST['grafica'])){
    $t_grafica="";
} else{
    $t_grafica=$_POST['grafica'];
}
if(!isset($_POST['red'])){
    $t_red="";
} else{
    $t_red=$_POST['red'];
}
if(!isset($_POST['obs'])){
    $t_observaciones="";
} else{
    $t_observaciones=$_POST['obs'];
}
   
$conexion->query("insert into equipos (nombre,sistema, marca, 
modelo, placa, CPU, tipo, bios, serie, 
disk1, disk2, bank0, bank1, bank2, bank3,
software, grafica, red, observaciones,
ubicacion, area)
values('".$t_nombre."','".$t_sistema."','".$t_marca."','".$t_modelo."', 
'".$t_placa."','".$t_CPU."','".$t_tipo."','".$t_bios."', '".$t_serie."', 
'".$t_disk1."','".$t_disk2."','".$t_bank0."','".$t_bank1."','".$t_bank2."',
'".$t_bank3."','".$t_software."','".$t_grafica."','".$t_red."',
'".$t_observaciones."','".$t_ubicacion."','".$t_area."')");

header('Location: ../equipos.php');

?>
