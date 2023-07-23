<?php

include "conexion.php";
session_start();
if (!isset($_SESSION["usuario"])){
  header('Location: index.php');
}
if (isset($_POST["orden"])){
  $t_orden=$_POST["orden"];
}else{
  $t_orden=0;
}
switch ($t_orden){
  case 1:
    $resultado = $conexion->query('SELECT * FROM equipos ORDER BY nombre');
    break;
  case 2:
    $resultado = $conexion->query('SELECT * FROM equipos ORDER BY marca');
    break;
  case 3:
    $resultado = $conexion->query('SELECT * FROM equipos ORDER BY modelo');
    break;
  case 4:
    $resultado = $conexion->query('SELECT * FROM equipos ORDER BY cpu');
    break;
  case 5:
    $resultado = $conexion->query('SELECT * FROM equipos ORDER BY ubicacion');
    break;
  default:
    $resultado = $conexion->query('SELECT * FROM equipos ORDER BY id');
    break;
}

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
        thead, input{
          font-size:1.1em;
          font-weight:bolder;
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
        h1,h2,h3{
            font-family: titulo;
        }
        i{
          font-size:large !important; 
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
                font-size:0.9em;
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
    <h1>Inventario - Equipos</h1>
    <?php if($_SESSION["grupo"]=="adm"): ?>
        <h2><a href="adm.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="usr"):?>
        <h2><a href="usr.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="tec"): ?>
          <h2><a href="tec.php">PFAE Actualízate</a></h2> 
    <?php endif; ?>
  </header>
  <section class="mx-auto bg-white">
    <article class="bg-white text-primary font-bold row py-2 rounded">
            <form class="col-3 col-md-2" action="equipos.php" method="POST">
              <input type="hidden" name="orden" value="1">
              <input type="submit" value="Nombre" class="border-0 bg-white text-black negrita texto14">
            </form>
            <form class="d-none d-md-inline col-md-2" action="equipos.php" method="POST">
              <input type="hidden" name="orden" value="2">
              <input type="submit" value="Marca" class="border-0 bg-white text-black negrita texto14">
            </form>
            <form class="d-none d-md-inline col-md-2" action="equipos.php" method="POST">
              <input type="hidden" name="orden" value="3">
              <input type="submit" value="Modelo" class="border-0 bg-white text-black negrita texto14">
            </form>
            <form class="d-none d-md-inline col-md-2" action="equipos.php" method="POST">
              <input type="hidden" name="orden" value="4">
              <input type="submit" value="Procesador" class="border-0 bg-white text-black negrita texto14">
            </form>
            <form class="col-5 col-md-2" action="equipos.php" method="POST">
              <input type="hidden" name="orden" value="5">
              <input type="submit" value="Ubicación" class="border-0 bg-white text-black negrita texto14">
            </form>
            <div class="col-4 col-md-2">
              <button type="button"  class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#Insertar">
              <i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
      <!-- //while ($filas = $resultado->fetchArray())  -->
    </article>
    <?php
      while ($f = $resultado->fetch_array(MYSQLI_ASSOC)) {
    ?>
    <article class="bg-white text-black row border-top  py-1">
      <div class="col-3 col-md-2">
        <?php echo $f['Nombre']; ?>
      </div>
      <div class="d-none d-md-inline col-md-2">
        <?php echo $f['Marca']; ?>
      </div>
      <div class="d-none d-md-inline col-md-2">
        <?php echo $f['Modelo']; ?>
      </div>
      <div class="d-none d-md-inline col-md-2">
        <?php echo $f['CPU']; ?>
      </div>
      <div class="col-5 col-md-2">
        <?php echo $f['Ubicacion']; ?>
      </div>
      <div class="col-2 col-md-1">
        <button class='btn btn-primary btn-small btnEditar w-100' 
                data-id="<?php echo $f['Id']; ?>" 
                data-nombre="<?php echo $f['Nombre']; ?>"
                data-sistema="<?php echo $f['Sistema']; ?>"
                data-marca="<?php echo $f['Marca']; ?>"
                data-modelo="<?php echo $f['Modelo']; ?>"
                data-placa="<?php echo $f['Placa']; ?>"
                data-cpu="<?php echo $f['CPU']; ?>"
                data-tipo="<?php echo $f['Tipo']; ?>"
                data-bios="<?php echo $f['Bios']; ?>"
                data-serie="<?php echo $f['Serie']; ?>"
                data-disk1="<?php echo $f['Disk1']; ?>"
                data-disk2="<?php echo $f['Disk2']; ?>"
                data-bank0="<?php echo $f['Bank0']; ?>"
                data-bank1="<?php echo $f['Bank1']; ?>"
                data-bank2="<?php echo $f['Bank2']; ?>"
                data-bank3="<?php echo $f['Bank3']; ?>"
                data-observaciones="<?php echo $f['Observaciones']; ?>"
                data-ubicacion="<?php echo $f['Ubicacion']; ?>"
                data-area="<?php echo $f['Area']; ?>"
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
          <form action="equipos/insertarElemento.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar  </h5>
            </div>
            <div class="modal-body">
            <div class="form-group row" >
                <label class="col-12 col-md-3" for="nombre">Equipo<br/>  
                <input type="text" name="nombre" id="nombre" placeholder="Identificación del equipo" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="sistema">S.O.<br/>  
                <input type="text" name="sistema" id="sistema" placeholder="Sistema Operativo" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="marca">Marca<br/>  
                <input type="text" name="marca" id="marca" placeholder="Marca" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="modelo">Modelo<br/>  
                <input type="text" name="modelo" id="modelo" placeholder="Modelo" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                <label class="col-12 col-md-3" for="cpu">CPU<br/>  
                <input type="text" name="cpu" id="cpu" placeholder="Microprocesador" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="placa">Placa<br/>  
                <input type="text" name="placa" id="placa" placeholder="Placa base" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="tipo">32/64<br/>  
                <input type="text" name="tipo" id="tipo" placeholder="Tipo placa base" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="bios">Bios<br/>  
                <input type="text" name="bios" id="bios" placeholder="Bios" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                <label class="col-12 col-md-4" for="serie">Nº Serie<br/>  
                <input type="text" name="serie" id="serie" placeholder="Número serie" required class="form-control mifoco"></label>
                <label class="col-12 col-md-4" for="disk1">Disk 1<br/>  
                <input type="text" name="disk1" id="disk1" placeholder="Disco principal" required class="form-control mifoco"></label>
                <label class="col-12 col-md-4" for="disk2">Disk 2<br/>  
                <input type="text" name="disk2" id="disk2" placeholder="Segundo disco"  class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                <label class="col-12 col-md-3" for="Bank0">Bank 0<br/>  
                <input type="text" name="bank0" id="bank0" placeholder="Banco 0 de memoria" required class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="Bank1">Bank 1<br/>  
                <input type="text" name="bank1" id="bank1" placeholder="Banco 1 de memoria"  class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="Bank2">Bank 2<br/>  
                <input type="text" name="bank2" id="bank2" placeholder="Banco 2 de memoria"  class="form-control mifoco"></label>
                <label class="col-12 col-md-3" for="Bank3">Bank 3<br/>  
                <input type="text" name="bank3" id="bank3" placeholder="Banco 3 de memoria"  class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                <label class="col-12 col-md-6" for="ubica">Ubicación<br />
                <input type="text" name="ubicacion" id="ubica" placeholder="Edificio"  required class="form-control mifoco" ></label>

                <label class="col-12 col-md-6" for="area">Area<br />
                <input type="text" name="area" id="area" placeholder="Zona específica"  required class="form-control mifoco" ></label>
              </div>
              <div class="form-group row" >
                <label class="col-12" for="obs">Observaciones<br />
                <textarea type="text" name="obs" id="obs" placeholder="Observaciones"   class="form-control mifoco" ></textarea>                 
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
          <form action="equipos/editarElemento.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar [ <input type="text" name="id" id="idEdit" class="border-0 text-end text-primary small" size="2" readonly> ] </h5>
            </div>
            <div class="modal-body">
            <div class="form-group row" >
                    <label class="col-12 col-md-3" for="nombreed">Equipo<br/>  
                    <input type="text" name="nombre" id="nombreed" placeholder="Identificación del equipo" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="sistemaed">S.O.<br/>  
                    <input type="text" name="sistema" id="sistemaed" placeholder="Sistema Operativo" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="marcaed">Marca<br/>  
                    <input type="text" name="marca" id="marcaed" placeholder="Marca" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="modeloed">Modelo<br/>  
                    <input type="text" name="modelo" id="modeloed" placeholder="Modelo" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                    <label class="col-12 col-md-3" for="cpued">CPU<br/>  
                    <input type="text" name="cpu" id="cpued" placeholder="Microprocesador" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="placaed">Placa<br/>  
                    <input type="text" name="placa" id="placaed" placeholder="Placa base" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="tipoed">Tipo<br/>  
                    <input type="text" name="tipo" id="tipoed" placeholder="Tipo placa base" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="biosed">Bios<br/>  
                    <input type="text" name="bios" id="biosed" placeholder="Bios" required class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                  <label class="col-12 col-md-4" for="serieed">Nº Serie<br/>  
                    <input type="text" name="serie" id="serieed" placeholder="Número serie" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-4" for="disk1ed">Disk 1<br/>  
                    <input type="text" name="disk1" id="disk1ed" placeholder="Disco principal" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-4" for="disk2ed">Disk 2<br/>  
                    <input type="text" name="disk2" id="disk2ed" placeholder="Segundo disco"  class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                    <label class="col-12 col-md-3" for="Bank0ed">Bank 0<br/>  
                    <input type="text" name="bank0" id="bank0ed" placeholder="Banco 0 de memoria" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="Bank1ed">Bank 1<br/>  
                    <input type="text" name="bank1" id="bank1ed" placeholder="Banco 1 de memoria"  class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="Bank2ed">Bank 2<br/>  
                    <input type="text" name="bank2" id="bank2ed" placeholder="Banco 2 de memoria"  class="form-control mifoco"></label>
                    <label class="col-12 col-md-3" for="Bank3ed">Bank 3<br/>  
                    <input type="text" name="bank3" id="bank3ed" placeholder="Banco 3 de memoria"  class="form-control mifoco"></label>
              </div>
              <div class="form-group row" >
                    <label class="col-12 col-md-6" for="ubicaed">Ubicación<br />
                    <input type="text" name="ubicacion" id="ubicaed" placeholder="Edificio"  required class="form-control mifoco" ></label>

                    <label class="col-12 col-md-6" for="areaed">Area<br />
                    <input type="text" name="area" id="areaed" placeholder="Zona específica"  required class="form-control mifoco" ></label>
              </div>
              <div class="form-group row" >
                    <label class="col-12" or="obsed">Observaciones<br />
                    <textarea type="text" name="obs" id="obsed" placeholder="Observaciones"   class="form-control mifoco" ></textarea>                 
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
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
          url: 'equipos/eliminarElemento.php',
          method: 'POST',
          data: {
            id: idEliminar
          }
        }).done(function(res) {
          $(fila).fadeOut(1000);
        });
      });
      $(".btnEditar").click(function() {
        //alert($(this).data('elemento'))
        var idEditar = $(this).data('id');
        var ubiEditar = $(this).data('ubicacion');
        var areaEditar = $(this).data('area');
        var nomEditar = $(this).data('nombre');
        var soEditar = $(this).data('sistema');
        var marEditar = $(this).data('marca');
        var modEditar = $(this).data('modelo');
        var cpuEditar = $(this).data('cpu');
        var placaEditar = $(this).data('placa');
        var tipoEditar = $(this).data('tipo');
        var biosEditar = $(this).data('bios');
        var serieEditar = $(this).data('serie');
        var disk1Editar = $(this).data('disk1');
        var disk2Editar = $(this).data('disk2');
        var bank0Editar = $(this).data('bank0');
        var bank1Editar = $(this).data('bank1');
        var bank2Editar = $(this).data('bank2');
        var bank3Editar = $(this).data('bank3');
        var obsEditar = $(this).data('observaciones');

      
        $("#idEdit").val(idEditar);
        $("#ubicaed").val(ubiEditar);
        $("#areaed").val(areaEditar);
        $("#nombreed").val(nomEditar);
        $("#sistemaed").val(soEditar);
        $("#marcaed").val(marEditar);
        $("#modeloed").val(modEditar);
        $("#cpued").val(cpuEditar);
        $("#placaed").val(placaEditar);
        $("#tipoed").val(tipoEditar);
        $("#biosed").val(biosEditar);
        $("#serieed").val(serieEditar);
        $("#disk1ed").val(disk1Editar);
        $("#disk2ed").val(disk2Editar);
        $("#bank0ed").val(bank0Editar);
        $("#bank1ed").val(bank1Editar);
        $("#bank2ed").val(bank2Editar);
        $("#bank3ed").val(bank3Editar);
        $("#obsed").val(obsEditar);
      })
    });

  </script>
</html>