<?php
	session_start();
	
    include "conexion.php";

    $user = $_POST['user'];
	$password = $_POST['password'];
    //$pass=password_hash($password,PASSWORD_DEFAULT);

    $resultado = $conexion->query(
        "SELECT * FROM usuarios where nombre='$user'"
        ) or die("$conexion->error");
    $fila[3]="";
    while ($fila = mysqli_fetch_row($resultado)) {
        if (password_verify($password, $fila[2])){
        $_SESSION['usuario']=$user;
        $_SESSION['grupo']=$fila[3];
        echo ($fila[3]);
        }
    }
    $resultado->close();

?>