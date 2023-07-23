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
    $resultado = $conexion->query('SELECT * FROM usuarios ORDER BY nombre');
    break;
  case 2:
    $resultado = $conexion->query('SELECT * FROM usuarios ORDER BY clave');
    break;
  case 3:
    $resultado = $conexion->query('SELECT * FROM usuarios ORDER BY grupo');
    break;
  default:
    $resultado = $conexion->query('SELECT * FROM usuarios ORDER BY id');
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
            background: url("recursos/fondo.svg") fixed, 
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
    <h1>Usuarios</h1>
    <h2><a href="adm.php">PFAE Actualízate</a></h2> 
  </header>
  <section class="mx-auto bg-white  ">
      <article class="bg-white text-primary font-bold row py-2 rounded">
        <form class="col-4" action="usuarios.php" method="POST">
          <input type="hidden" name="orden" value="1">
          <input type="submit" value="Nombre" class="border-0 bg-white text-black negrita texto12 mx-auto">
        </form>
          <form class="col-4" action="usuarios.php" method="POST">
              <input type="hidden" name="orden" value="3">
              <input type="submit" value="Grupo" class="border-0 bg-white text-black negrita texto12 mx-auto">
            </form>
          </th>
          <div class="col-4">
            <button type="button"  class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#Insertar">
            <i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>
      </article>
      <?php
          while ($f = $resultado->fetch_array(MYSQLI_ASSOC)) {
      ?>
      <article class="bg-white text-black row border-top  py-1">
        <div class="col-4">
          <?php echo $f['nombre']; ?>
        </div>
        <div class="col-4">
          <?php echo $f['grupo']; ?>
        </div>
        <div class="col-2">
            <button class='btn btn-primary btn-small btnEditar w-100' 
                    data-id="<?php echo $f['id']; ?>" 
                    data-nombre="<?php echo $f['nombre']; ?>"
                    data-clave=""
                    data-grupo="<?php echo $f['grupo']; ?>"
                    data-bs-toggle='modal' data-bs-target='#Editar'>
                    <i class='fas fa-pencil-alt'></i>
            </button>
        </div>
        <div class="col-2">
              <button class="btn btn-danger btn-small btnEliminar w-100" data-id="<?php echo $f['id']; ?>" data-bs-toggle="modal" data-bs-target="#Eliminar">
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
          <form action="usuarios/insertarElemento.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar  </h5>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label class="col-12 col-md-4" for="nombre">Nombre<br/>  
                <input type="text" name="nombre" id="nombre" placeholder="Usuario" required class="form-control mifoco"></label>
                <label class="col-12 col-md-4" for="clave">Clave<br/>  
                <input type="password" name="clave" id="clave" placeholder="Clave" required class="form-control mifoco"></label>
                <label class="col-12 col-md-4" for="grupo">Grupo<br/>  
                  <select class="form-select" name="grupo" id="grupo" aria-label="Default select example">
                    <option value="adm">Administrador</option>
                    <option value="usr">Usuario</option>
                    <option value="tec">Técnico</option>
                  </select>
                </label>
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
          <form action="usuarios/editarElemento.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar [ <input type="text" name="id" id="idEdit" class="border-0 text-end text-primary small" size="2" readonly> ] </h5>
            </div>
            <div class="modal-body">
              <div class="form-group row" >
                    <label class="col-12 col-md-4" for="nombreed">Nombre<br/>  
                    <input type="text" name="nombre" id="nombreed" placeholder="Usuario" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-4" for="claveed">Clave<br/>  
                    <input type="password" name="clave" id="claveed" placeholder="Clave" required class="form-control mifoco"></label>
                    <label class="col-12 col-md-4" for="grupo">Grupo<br/>  
                      <select class="form-select mifoco " name="grupo" id="grupo" aria-label="Default select example">
                        <option value="adm">Administrador</option>
                        <option value="usr">Usuario</option>
                        <option value="tec">Técnico</option>
                      </select>
                    </label>
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
          url: 'usuarios/eliminarElemento.php',
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
        var nomEditar = $(this).data('nombre');
        var claEditar = $(this).data('clave');
        var gruEditar = $(this).data('grupo');
       
      
        $("#idEdit").val(idEditar);
        $("#nombreed").val(nomEditar);
        $("#claveed").val(claEditar);
        $("#grupoed").val(gruEditar);

      })
     
    });

  </script>
</html>