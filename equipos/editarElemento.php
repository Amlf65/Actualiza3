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

// die("+" . $t_id . "...." . $t_nombre . "----" . $t_ubicacion);
    $conexion->query("update equipos set
    nombre='".$t_nombre."', 
    sistema='".$t_sistema."', 
    marca='".$t_marca."', 
    modelo='".$t_modelo."', 
    placa='".$t_placa."', 
    CPU='".$t_CPU."', 
    tipo='".$t_tipo."', 
    bios='".$t_bios."', 
    serie='".$t_serie."', 
    disk1='".$t_disk1."', 
    disk2='".$t_disk2."', 
    bank0='".$t_bank0."', 
    bank1='".$t_bank1."', 
    bank2='".$t_bank2."', 
    bank3='".$t_bank3."',
    ubicacion ='".$t_ubicacion."', 
    area ='".$t_area."',
    software ='".$t_software."',
    grafica ='".$t_grafica."',
    red ='".$t_red."',
    observaciones ='".$t_observaciones."'  where id='".$t_id."'");
header('Location: ../equipos.php');
?>