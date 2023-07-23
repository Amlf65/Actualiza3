<?php

include "../conexion.php";
if(!isset($_POST['id'])){
    $t_id="0";
} else{
    $t_id=$_POST['id'];
}
if(!isset($_POST['fecha'])){
    $t_fecha="";
} else{
    $t_fecha=$_POST['fecha'];
}
if(!isset($_POST['email'])){
    $t_email="";
} else{
    $t_email=$_POST['email'];
}
if(!isset($_POST['equipo'])){
    $t_equipo="";
} else{
    $t_equipo=$_POST['equipo'];
}

if(!isset($_POST['recepcion'])){
    $t_recepcion="";
} else{
    $t_recepcion=$_POST['recepcion'];
}
if(!isset($_POST['telefono'])){
    $t_tlf="";
} else{
    $t_tlf=$_POST['telefono'];
}
if(!isset($_POST['ubicacion'])){
    $t_ubicacion="";
} else{
    $t_ubicacion=$_POST['ubicacion'];
}
if(!isset($_POST['descripcion'])){
    $t_descripcion="";
} else{
    $t_descripcion=$_POST['descripcion'];
}
if(!isset($_POST['responsable'])){
    $t_responsable="";
} else{
    $t_responsable=$_POST['responsable'];
}
if(!isset($_POST['ticket'])){
    $t_ticket="";
} else{
    $t_ticket=$_POST['ticket'];
}
if(!isset($_POST['estado'])){
    $t_estado="";
} else{
    $t_estado=$_POST['estado'];
}
if(!isset($_POST['prioridad'])){
    $t_prioridad="";
} else{
    $t_prioridad=$_POST['prioridad'];
}
if(!isset($_POST['tecnico'])){
    $t_tecnico="";
} else{
    $t_tecnico=$_POST['tecnico'];
}
if(!isset($_POST['resolucion'])){
    $t_resolucion="";
} else{
    $t_resolucion=$_POST['resolucion'];
}
if(!isset($_POST['final'])){
    $t_final="";
} else{
    $t_final=$_POST['final'];
}
if(!isset($_POST['verificacion'])){
    $t_verificado="";
} else{
    $t_verificado=$_POST['verificacion'];
}
if(!isset($_POST['cierre'])){
    $t_cierre="";
} else{
    $t_cierre=$_POST['cierre'];
}
if(!isset($_POST['dias'])){
    $t_dias="";
} else{
    $t_dias=$_POST['dias'];
}

    $conexion->query("update incidencias set
    fecha='".$t_fecha."', 
    email='".$t_email."', 
    equipo='".$t_equipo."', 
    recepcion='".$t_recepcion."', 
    tlf='".$t_tlf."', 
    ubicacion ='".$t_ubicacion."', 
    descripcion ='".$t_descripcion."', 
    responsable ='".$t_responsable."', 
    ticket ='".$t_ticket."', 
    estado ='".$t_estado."', 
    prioridad ='".$t_prioridad."', 
    tecnico ='".$t_tecnico."', 
    resolucion ='".$t_resolucion."', 
    final ='".$t_final."', 
    verificado ='".$t_verificado."', 
    cierre ='".$t_cierre."', 
    dias ='".$t_dias."'  where id='".$t_id."'"); 
    header('Location: ../incidencias.php');
?>