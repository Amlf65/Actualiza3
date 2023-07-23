<?php
include "conexion.php";
session_start();
//die($_SESSION["usuario"] . " -- " .$_SESSION["grupo"]=="usr");
if (!isset($_SESSION["usuario"]) or $_SESSION["grupo"]=="usr"){
  header('Location: index.php');
}
if (isset($_POST["filtro"])){
  if ($_POST["filtro"]!==""){
  $t_filtro="estado like '%".$_POST["filtro"]."%' or estado like '%".$_POST["filtro"]."%' or ubicacion like '%".$_POST["filtro"].
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
    <title>Inventario</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
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
            width: 80%;
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
        .mifoco:focus {
          background-color: #FFFFE0;
          outline-style:none;
          border: none; 
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
    <h1>Incidencias</h1>
    <?php if($_SESSION["grupo"]=="adm"): ?>
        <h2><a href="adm.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="usr"):?>
        <h2><a href="usr.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="tec"): ?>
          <h2><a href="tec.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <form action="incidencias.php" method="POST" class="py-2 row">

        <div class="col-8">
          <input type="text" name="filtro" placeholder="Leer filtro" class="form-control  negrita mifoco1">
        </div>
        <div class="col-4">
          <input type="submit" value="FILTRAR" class="form-control bg-black text-white  rounded d-2 negrita">
        </div>

    </form>
  </header>
  <section class="mx-auto bg-white">
    <article class="bg-white text-primary font-bold row py-2 rounded">
          <form class="col-1" action="incidencias.php" method="POST">
            <input type="hidden" name="orden" value="0">
            <input type="submit" value="Tkt" class="border-0 bg-white text-black negrita texto12 mx-auto">
          </form>
          <form class="d-none d-md-inline col-md-2" action="incidencias.php" method="POST">
              <input type="hidden" name="orden" value="1">
              <input type="submit" value="Fecha" class="border-0 bg-white text-black negrita texto12 mx-auto">
          </form>

          <form class="col-2" action="incidencias.php" method="POST">
              <input type="hidden" name="orden" value="2">
              <input type="submit" value="Equipo" class="border-0 bg-white text-black negrita texto12 mx-auto">
            </form>

          <form class="d-none d-md-inline col-md-2" action="incidencias.php" method="POST">
              <input type="hidden" name="orden" value="3">
              <input type="submit" value="Envío" class="border-0 bg-white text-black negrita texto12 mx-auto">
          </form>

          <form class="col-5 col-md-3" action="incidencias.php" method="POST">
              <input type="hidden" name="orden" value="4">
              <input type="submit" value="Ubicación" class="border-0 bg-white text-black negrita texto12 mx-auto">
          </form>

          <div class="col-4 col-md-2">
            <button type="button"  class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#Insertar">
            <i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>
    </article>
    <!-- //while ($filas = $resultado->fetchArray())  -->
    <?php
          while ($f = $resultado->fetch_array(MYSQLI_ASSOC)) {
    ?>
    <article class="bg-white text-black row border-top  py-1">
    <div class="col-1">
        <?php echo $f['Id']; ?>
      </div>
      <div class="d-none d-md-inline col-md-2">
        <?php echo $f['fecha']; ?>
      </div>
      <div class="col-2 col-md-2">
        <?php echo $f['equipo']; ?>
      </div>
      <div class="d-none d-md-inline col-md-2">
        <?php echo $f['recepcion']; ?>
      </div>
      <div class="col-5 col-md-3 col-xl-3">
        <?php echo $f['ubicacion']; ?>
      </div>
      <div class="col-2 col-md-1">
        <button class='btn btn-primary btn-small btnEditar w-100' 
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
                    data-bs-toggle='modal' data-bs-target='#Editar'>
                    <i class='fas fa-pencil-alt'></i>
            </button> 
            </div>
            <div class="col-2 col-md-1">
              <button class="btn btn-danger btn-small btnEliminar w-100" data-id="<?php echo $f['Id']; ?>" data-bs-toggle="modal" data-bs-target="#Eliminar">
              <i class='fas fa-eraser'></i>
              </button>
          </div>
          </article>
        <?php
              }
        ?>

    <!-- Modal -->
    <div class="modal fade " id="Insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content" class="p-0 ">
          <form action="incidencias/insertarElemento.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar  </h5>
            </div>
            <div class="modal-body">
              <div class="form-group row" >
                <label class="col-12 col-md-3" for="fecha">Fecha<br/>  
                <input type="text" name="fecha" id="fecha" placeholder="dd/mm/yyyy" required pattern="^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$" class="form-control mifoco" value="<?php echo date("d/m/Y"); ?>"></label>
                <label class="col-12 col-md-7" for="email">email<br/>  
                <input type="text" name="email" id="email" placeholder="Correo contacto" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="equipo">Equipo<br/>  
                <input type="text" name="equipo" id="equipo" placeholder="Id Equipo" required class="form-control mifoco"></label>
               
              </div>
              <div class="form-group row">
              <label class="col-12 col-md-3" for="recepcion">Enviado por<br/>  
                <input type="text" name="recepcion" id="recepcion" placeholder="Persona/s que envían" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="telefono">Teléfono<br/>  
                <input type="text" name="telefono" id="telefono" placeholder="Nº teléfono" required class="form-control mifoco"></label>
                <label class="col-12 col-md-6" for="ubicacion">Ubicación<br/>  
                <input type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                <label class="col-12" for="descripcion">Descripción<br />
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripción"  required class="form-control mifoco" ></label>
              </div>
              <div class="form-group row" >
                <label class="col-12 col-md-6" for="reponsable">Responsable<br/>  
                <input type="text" name="responsable" id="responsable" placeholder="Responsable" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="ticket">Ticket<br/>  
                <input type="text" name="ticket" id="ticket" placeholder="Número ticket" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="estado">Estado<br/>  
                <input type="text" name="estado" id="conexion" placeholder="Tipo conexión" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="prioridad">Prioridad<br/>  
                <input type="text" name="prioridad" id="prioridad" placeholder="Prioridad" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                <label class="col-12 col-md-9" for="tecnico">Técnico<br/>  
                <input type="text" name="tecnico" id="tecnico" placeholder="Persona/s que repara" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="final">Fecha fin<br/>  
                <input type="text" name="final" id="final" placeholder="dd/mm/yyyy" pattern="^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$"  class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                <label class="col-12" for="resolucion">Resolucion<br/>  
                <input type="text" name="resolucion" id="resolucion" placeholder="Solución aplicada" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-7" for="verificacion">Verificado por<br/>  
                <input type="text" name="verificacion" id="verificacion" placeholder="Quien verifica" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="cierre">Fecha Cierre<br/>  
                <input type="text" name="cierre" id="cierre" placeholder="dd/mm/yyyy" pattern="^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$"  class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="dias">Días<br/>  
                <input type="text" name="dias" id="dias" placeholder="Días trabajo" required class="form-control mifoco"></label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade " id="Editar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl " role="document">
        <div class="modal-content" class="p-0 ">
          <form action="incidencias/editarElemento.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar [ <input type="text" name="id" id="ided" class="border-0 text-end text-primary small" size="2" readonly> ] </h5>
            </div>
            <div class="modal-body">
            <div class="form-group row">
              <label class="col-12 col-md-3" for="fechaed">Fecha<br/>
                <input type="text" name="fecha" id="fechaed" placeholder="dd/mm/yyyy" required pattern="^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$" class="form-control mifoco" /> </label> 
                <label class="col-12 col-md-7" for="emailed">email<br/>  
                <input type="text" name="email" id="emailed" placeholder="Correo contacto" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="equipoed">Equipo<br/>  
                <input type="text" name="equipo" id="equipoed" placeholder="Id Equipo" required class="form-control mifoco"></label>
               
              </div>
              <div class="form-group row">
              <label class="col-12 col-md-3" for="recepcioned">Enviado por<br/>  
                <input type="text" name="recepcion" id="recepcioned" placeholder="Persona/s que envía/n" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="telefonoed">Teléfono<br/>  
                <input type="text" name="telefono" id="telefonoed" placeholder="Nº teléfono" required class="form-control mifoco"></label>
                <label class="col-12 col-md-6" for="ubicacioned">Ubicación<br/>  
                <input type="text" name="ubicacion" id="ubicacioned" placeholder="Ubicación" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row">
                <label class="col-12" for="descripcion">Descripción<br />
                <input type="text" name="descripcion" id="descripcioned" placeholder="Descripción"  required class="form-control mifoco" ></label>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-6" for="reponsableed">Responsable<br/>  
                <input type="text" name="responsable" id="responsableed" placeholder="Responsable" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="ticketed">Ticket<br/>  
                <input type="text" name="ticket" id="ticketed" placeholder="Número ticket" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2" for="estadoed">Estado<br/>  
                <input type="text" name="estado" id="estadoed" placeholder="Estadp" required class="form-control mifoco"></label>
                <label class="col-12 col-md-2"for="prioridaded">Prioridad<br/>  
                <input type="text" name="prioridad" id="prioridaded" placeholder="Prioridad" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-9" for="tecnico">Técnico<br/>  
                <input type="text" name="tecnico" id="tecnicoed" placeholder="Persona/s que repara" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="finaled">Fecha fin<br/>  
                <input type="text" name="final" id="finaled" placeholder="dd/mm/yyyy" pattern="^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$"  class="form-control mifoco"></label>
              </div>
              <div class="form-group row">
                <label class="col-12" for="resolucioned">Resolucion<br/>  
                <input type="text" name="resolucion" id="resolucioned" placeholder="Solución aplicada" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row">
                <label class="col-12 col-md-7"for="verificacioned">Verificado por<br/>  
                <input type="text" name="verificacion" id="verificacioned" placeholder="Quien verifica" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="cierreed">Fecha Cierre<br/>  
                <input type="text" name="cierre" id="cierreed" placeholder="dd/mm/yyyy" pattern="^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$"  class="form-control mifoco"></label>
                <label class="col-12 col-md-2"for="diased">Días<br/>  
                <input type="text" name="dias" id="diased" placeholder="Días trabajo" required class="form-control mifoco"></label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Eliminar -->
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
    </div>
  </section>
</body>
<script src="recursos/all.min.js"></script>
<script src="recursos/jquery-3.6.0.min.js"></script>
<script src="recursos/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
      var idEliminar = -1;
      var idEditar = -1;
      var fila;
      $(".btnEliminar").click(function() {
        //alert("eliminar")
        idEliminar = $(this).data('id');
        fila = $(this).parent('td').parent('tr');
      });
      $(".eliminar").click(function() {
        $.ajax({
          url: 'incidencias/eliminarElemento.php',
          method: 'POST',
          data: {
            id: idEliminar
          }
        }).done(function(res) {
          $(fila).fadeOut(1000);
        });
      });
      $(".btnEditar").click(function() {
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