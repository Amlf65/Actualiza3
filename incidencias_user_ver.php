<?php
include "conexion.php";
session_start();
if (!isset($_SESSION["usuario"])){
  header('Location: index.php');
}
if (isset($_POST["filtro"])){
  if ($_POST["filtro"]!==""){
  $t_filtro="estado like '%".$_POST["filtro"]."%' or estado='Abierta' or ubicacion like '%".$_POST["filtro"].
  "%' or responsable like '%".$_POST["filtro"]."%'  or tecnico like '%".$_POST["filtro"]."%'  or recepcion like '%".$_POST["filtro"].
  "%' or verificado like '%".$_POST["filtro"]."%'" ;
  }else{
    $t_filtro=1;
  }
}else{
  $t_filtro=1;
}

if (isset($_POST["orden"])){
  $t_orden=$_POST["orden"];
}else{
  $t_orden=0;
}

switch ($t_orden){
  case 1:
    echo $t_filtro;
    $resultado = $conexion->query('SELECT * FROM incidencias WHERE ' . $t_filtro. ' ORDER BY fecha');
    break;
  case 2:
    $resultado = $conexion->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY equipo');
    break;
  case 3:
    $resultado = $conexion->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY recepcion');
    break;
  case 4:
    $resultado = $conexion->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY ubicacion');
    break;
  case 5:
    $resultado = $conexion->query('SELECT * FROM incidencias WHERE ' .$t_filtro. ' ORDER BY cierre');
    break;
  default:
    $resultado = $conexion->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY id');
    break;
} 

/*
$resultado = $bd->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY id');
if (isset($_POST["orden"])){
  $t_orden=$_POST["orden"];
}else{
  $t_orden=0;
}

switch ($t_orden){
  case 1:
    echo $t_filtro;
    $resultado = $bd->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY julianday(fecha) desc');
    break;
  case 2:
    $resultado = $bd->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY equipo');
    break;
  case 3:
    $resultado = $bd->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY recepcion');
    break;
  case 4:
    $resultado = $bd->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY ubicacion');
    break;
  case 5:
    $resultado = $bd->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY julianday(date(cierre)) desc');
    break;
  default:
    $resultado = $bd->query('SELECT * FROM incidencias WHERE ' . $t_filtro . '  ORDER BY id');
    break;
} */

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="recursos/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="recursos/logo.svg" sizes="any">
    <title>Consultar Incidencias</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-overflow: ellipsis;
        }
        @font-face {
            font-family: pie;
            src: url("recursos/Schoolkid.ttf");
            font-weight: bolder;
        }
        @font-face {
            font-family: cuerpo;
            src: url("recursos/Montserrat-Regular.ttf");
        }
        @font-face {
            font-family: titulo;
            src: url("recursos/orangejuice.ttf");
            font-weight: bolder;
        }
        body {
            background: url("recursos/mapa_mundi_fondo.svg") fixed,
                url("recursos/network-cabinet.svg") top 15px left 15px fixed,
                url("recursos/chip.svg") top 15px right 15px fixed,
                url("recursos/equipo.svg") bottom 15px left 15px fixed,
                url("recursos/camara_seguridad.svg") bottom 15px right 15px fixed;
            background-repeat: no-repeat;
            background-size: cover, 7%,8%,8%,8%;
            margin-bottom: 3em;
        }
        thead{

          font-size: 1.2em;
        }
        td {
            padding: 5px;
        }
        table td:first-child() {
            width: 50%;
          }
       /*  th{
            text-align: center;
        } */
        tr {
            border: 1px solid gray;
        }
        img{
            display: block;
            height: 40px;
            margin: 0 auto;
            padding: 2px;
            border:1px solid green;
        }
        section{
            font-family: cuerpo;
            font-size: 1em;
            width:80%;
        }
        header{
            width:80%;
            margin:0 auto;
        }
        h1,h2,h3{
            font-family: titulo;
        }
        i{
          font-size:large !important; 
        }
        .negrita{
          font-weight:bolder;
        }
        .texto12{
          font-size:1.2em;
        }
        .texto14{
          font-size:1.4em;
        }
        .texto16{
          font-size:1.6em;
        }
        .texto18{
          font-size:1.8em;
        }
        .texto20{
          font-size:2em;
        }

        .mifoco1:focus {
          background-color: #FFFFE0;
          outline-style:none;
          border: none; 
        }
        
        @media (max-width: 825px) {
            thead{
              font-size: .9em;
            }
            section{
                font-size:0.7em;
                width:100%;
            }
            img{
                width: 100%;
                height: auto;
            }
            body {
              background-image: none; background-color:lightcyan;
            }
            i{
              font-size: small !important; 
            }
        }
    </style>
</head>

<body class="container w-100 mx-auto">
  <header class="text-center">
    <?php if($_SESSION["grupo"]=="adm"): ?>
        <h2><a href="adm.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="usr"):?>
        <h2><a href="usr.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="tec"): ?>
          <h2><a href="tec.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <form action="incidencias_user_ver.php" method="POST" class="py-2 row">

      <div class="col-8">
        <input type="text" name="filtro" placeholder="Leer filtro" class="form-control  negrita mifoco1">
      </div>
      <div class="col-4">
        <input type="submit" value="FILTRAR" class="form-control bg-black text-white  rounded d-2 negrita">
      </div>

    </form>
  </header>
  <section class="mx-auto bg-white  ">
    <article class="bg-white text-primary font-bold row py-2 rounded">
      <form class="col-1" action="incidencias_user_ver.php" method="POST">
        <input type="hidden" name="orden" value="0">
        <input type="submit" value="Tkt" class="border-0 bg-white text-black negrita texto12 mx-auto">
      </form>
      <form class="col-3 col-md-2" action="incidencias_user_ver.php" method="POST">
        <input type="hidden" name="orden" value="1">
        <input type="submit" value="Fecha" class="border-0 bg-white text-black negrita texto12">
      </form>
        <form class="col-3 col-md-2" action="incidencias_user_ver.php" method="POST">
          <input type="hidden" name="orden" value="2">
          <input type="submit" value="Equipo" class="border-0 bg-white text-black negrita texto12">
      </form>
      <form class="d-none d-md-inline col-md-2" action="incidencias_user_ver.php" method="POST">
        <input type="hidden" name="orden" value="3">
        <input type="submit" value="Envío" class="border-0 bg-white text-black negrita texto12">
      </form>
      <form class="col-3 col-md-3 col-xl-2" action="incidencias_user_ver.php" method="POST">
        <input type="hidden" name="orden" value="4">
        <input type="submit" value="Ubicación" class="border-0 bg-white text-black negrita texto12">
      </form>
      <form class="d-none d-xl-inline col-xl-1" action="incidencias_user_ver.php" method="POST">
        <input type="hidden" name="orden" value="5">
        <input type="submit" value="Cierre" class="border-0 bg-white text-black negrita texto12">
      </form>
      <div class="col-2 border-0 "></div>
    </article>
    <!-- //while ($filas = $resultado->fetchArray())  -->
    <?php
      while ($f = $resultado->fetch_array(MYSQLI_ASSOC)) {
    ?>
    <article class="bg-white text-black row border-top">
      <div class="col-1 text-center">
        <?php echo $f['Id']; ?>
      </div>
      <div class="col-3 col-md-2">
        <?php echo $f['fecha']; ?>
      </div>
      <div class="col-3 col-md-2">
        <?php echo $f['equipo']; ?>
      </div>
      <div class="d-none d-md-inline col-md-2">
        <?php echo $f['recepcion']; ?>
      </div>
      <div class="col-3 col-md-3 col-xl-2">
        <?php echo $f['ubicacion']; ?>
      </div>
      <div class="d-none d-xl-inline col-xl-2">
        <?php echo $f['cierre']; ?>
      </div>
      <div class="col-2">
        <button class='btn btn-success btn-small btnConsultar w-100 my-1 mx-auto p-1' 
                    data-id="<?php echo $f['Id']; ?>" 
                    data-fecha="<?php echo $f['fecha']; ?>"
                    data-email="<?php echo $f['email']; ?>"
                    data-equipo="<?php echo $f['equipo']; ?>"
                    data-recepcion="<?php echo $f['recepcion']; ?>"
                    data-tlf="<?php echo $f['tlf']; ?>"
                    data-ubicacion="<?php echo $f['ubicacion']; ?>"
                    data-descripcion="<?php echo $f['descripcion']; ?>"
                    data-responsable="<?php echo $f['responsable']; ?>"
                    data-ticket="<?php echo $f['ticket']; ?>"
                    data-estado="<?php echo $f['estado']; ?>"
                    data-prioridad="<?php echo $f['prioridad']; ?>"
                    data-tecnico="<?php echo $f['tecnico']; ?>"
                    data-resolucion="<?php echo $f['resolucion']; ?>"
                    data-final="<?php echo $f['final']; ?>"
                    data-verificado="<?php echo $f['verificado']; ?>"
                    data-cierre="<?php echo $f['cierre']; ?>"
                    data-dias="<?php echo $f['dias']; ?>"
                    data-bs-toggle='modal' data-bs-target='#Consultar'>
                    <i class="fa fa-search"></i>
        </button> 
      </div>
    </article>
      <!--<td >
            <button class="btn btn-danger btn-small btnEliminar w-100" data-id="<?php echo $f['Id']; ?>" data-bs-toggle="modal" data-bs-target="#Eliminar">
              Borra</i>
            </button>
        </td> -->
      </tr>
      <?php
        }
      ?>
      </tbody>
    </section>
    
    <!-- Modal Consultar-->
    <div class="modal fade " id="Consultar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content" class="p-0 ">
          <form action="" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Consultar [ <input type="text" name="id" id="ided" class="border-0 text-end text-primary small" size="2" readonly> ] </h5>
            </div>
            <div class="modal-body">
              <div class="form-group row">
              <!-- style="display: grid;grid-template-columns: 1fr 3fr 1fr;grid-gap: 10px;" --> 
                <label class="col-12 col-md-3" for="fechaed">Fecha<br/>
                <input type="text" name="fecha" id="fechaed" placeholder="Fecha incidencia" readonly class="form-control mifoco" /> </label> 
                <label class="col-12 col-md-6" for="emailed">email<br/>  
                <input type="text" name="email" id="emailed" placeholder="Correo contacto" readonly class="form-control mifoco "></label>
                <label class="col-12 col-md-3" for="equipoed">Equipo<br/>  
                <input type="text" name="equipo" id="equipoed" placeholder="Id Equipo" readonly class="form-control mifoco"></label>
               
              </div>
              <div class="form-group row" >
              <!-- style="display: grid;grid-template-columns: 1fr 3fr ;grid-gap: 10px;" -->
                <label class="col-12 col-md-4" for="telefonoed">Teléfono<br/>  
                <input type="text" name="telefono" id="telefonoed" placeholder="Nº teléfono" readonly class="form-control mifoco"></label>
                <label class="col-12 col-md-8" for="ubicacioned">Ubicación<br/>  
                <input type="text" name="ubicacion" id="ubicacioned" placeholder="Ubicación" readonly class="form-control mifoco"></label>
              </div>
              <div class="form-group row"> 
                <!-- style="display: grid;grid-template-columns: 1fr;grid-gap: 10px;" -->
                <label class="col-12"for="descripcion">Descripción<br />
                <input type="text" name="descripcion" id="descripcioned" placeholder="Descripción"  readonly class="form-control mifoco" ></label>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--  Modal Eliminar 
    <div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger eliminar" data-bs-dismiss="modal">Eliminar</button>
          </div>
        </div>
      </div>
    </div> -->
  
</body>
<script src="recursos/all.min.js"></script>
<script src="recursos/jquery-3.6.0.min.js"></script>
<script src="recursos/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
      var idEliminar = -1;
      var idEditar = -1;
      var fila;
      /* $(".btnEliminar").click(function() {
        //alert("eliminar")
        idEliminar = $(this).data('id');
        fila = $(this).parent('td').parent('tr');
      }); */
      /* $(".eliminar").click(function() {
        $.ajax({
          url: 'incidencias/eliminarElemento.php',
          method: 'POST',
          data: {
            id: idEliminar
          }
        }).done(function(res) {
          $(fila).fadeOut(1000);
        });
      }); */
      $(".btnConsultar").click(function() {
        var idEditar = $(this).data('id');
        var fechaEditar = $(this).data('fecha');
        var emailEditar = $(this).data('email');
        var equipoEditar = $(this).data('equipo');
        var recepcionEditar = $(this).data('recepcion');
        var tlfEditar = $(this).data('tlf');
        var ubicacionEditar = $(this).data('ubicacion');
        var descripcionEditar = $(this).data('descripcion');
        var responsableEditar = $(this).data('responsable');
        var ticketEditar = $(this).data('ticket');
        var estadoEditar = $(this).data('estado');
        var prioridadEditar = $(this).data('prioridad');
        var tecnicoEditar = $(this).data('tecnico');
        var resolucionEditar = $(this).data('resolucion');
        var finalEditar = $(this).data('final');
        var verificadoEditar = $(this).data('verificado');
        var cierreEditar = $(this).data('cierre');
        var diasEditar = $(this).data('dias');

        fechaEditar=fechaEditar.replaceAll('/', '-');

        $("#ided").val(idEditar);
        $("#fechaed").val(fechaEditar);
        $("#emailed").val(emailEditar);
        $("#equipoed").val(equipoEditar);
        $("#recepcioned").val(recepcionEditar);
        $("#telefonoed").val(tlfEditar);
        $("#ubicacioned").val(ubicacionEditar);
        $("#descripcioned").val(descripcionEditar);
        $("#responsableed").val(responsableEditar);
        $("#ticketed").val(ticketEditar);
        $("#estadoed").val(estadoEditar);
        $("#prioridaded").val(prioridadEditar);
        $("#tecnicoed").val(tecnicoEditar);
        $("#resolucioned").val(resolucionEditar);
        $("#finaled").val(finalEditar);
        $("#verificacioned").val(verificadoEditar);
        $("#cierreed").val(cierreEditar);
        $("#diased").val(diasEditar);


      })
    });

  </script>
</html>