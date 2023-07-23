
<?php
include "conexion.php";
session_start();
if (!isset($_SESSION["usuario"])){
  header('Location: index.php');
}
?>
<!-- <script>
    alert("incidencias_user_ins.php")
</script> -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="recursos/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="recursos/logo.svg" sizes="any">
    <title>Registrar Incidencia</title>
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
        @media (max-width: 825px) {
            thead{
              font-size: .9em;
            }
            section{
                font-size:0.9em;
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

<body class="container  mx-auto">

  <section>
     <!-- Modal -->
    <!-- <div class="modal fade " id="Insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
      <div class="modal-dialog modal-xl shadow-lg rounded bg-light" role="document"> 
        <div class="modal-content" class="p-0">
          <form action="incidencias/insertarElemento_user.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insertar  </h5>
            </div>
            <div class="modal-body ">
              <!-- <div class="form-group row" style="display: grid;grid-template-columns: 1fr 3fr 1fr;grid-gap: 10px;"> -->
              <div class="form-group row">
                <label class="col-12 col-md-3" for="nombre">Fecha<br/>  
                <input type="text" name="fecha" id="fecha" placeholder="Fecha dd/mm/yyyy" pattern="^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$" class="form-control " value="<?php echo date("d/m/Y"); ?>"></label>
                <label class="col-12 col-md-6" for="marca">email<br/>  
                <input type="text" name="email" id="email" placeholder="Correo contacto1" required class="form-control mifoco "></label>
                <label class="col-12 col-md-3" for="modelo">Equipo<br/>  
                <input type="text" name="equipo" id="equipo" placeholder="Id Equipo" required class="form-control mifoco "></label>
               
              </div>
              <!-- <div class="form-group row" style="display: grid;grid-template-columns: 1fr 3fr;grid-gap: 10px;"> -->
              <div class="form-group row">
                <label class="col-12 col-md-4" for="telefono">Teléfono<br/>  
                <input type="text" name="telefono" id="telefono" placeholder="Nº teléfono"  class="form-control mifoco "></label>
                <label class="col-12 col-md-8" for="ubicacion">Ubicación<br/>  
                <input type="text" name="ubicacion" id="ubicacion" placeholder="Ubicación" required class="form-control mifoco "></label>
              </div>
              <div class="form-group row" style="display: grid;grid-template-columns: 1fr ;grid-gap: 10px;">
                <label class="col-12" for="descripcion">Descripción<br />
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripción"  required class="form-control mifoco " ></label>
              </div>
            </div>
            <div class="modal-footer" style="display: grid;grid-template-columns: 1fr 1fr 1fr ;grid-gap: 10px;"> 
              <a class="btn btn-success " title="Menú anterior" href="usr.php" ><i class='fas fa-reply'></i></a>
              <button type="reset" class="btn btn-secondary " title="Reiniciar datos"><i class='fas fa-eraser'></i></button>
              <button type="submit" class="btn btn-primary " title="Grabar los datos"><i class='fas fa-save'></i></button>
            </div>

          </form>
          
        </div>
       </div>
    <!--</div> -->

      </section>
</body>
<script src="recursos/all.min.js"></script>
<script src="recursos/jquery-3.6.0.min.js"></script>
<script src="recursos/bootstrap.bundle.min.js"></script>

<script>
  function salir(){
    <?php
      header('Location: usr.php');
    ?>
  }
</script>
</html>