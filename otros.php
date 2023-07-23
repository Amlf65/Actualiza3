<?php
	session_start();
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
        .tr-noborder{
            border:0;
        }
        th{
            border:0;
        } 
        .tr-miborder {
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
        @media (max-width: 825px) {
            thead{
              font-size: .9em;
            }
            section{
                font-size:0.7em;
            }
            img, table{
                width: 100% !important;
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

<body class="container w-75 mx-auto border-0 bg-light">
  <header class="text-center">
    <h2>PFAE Actualízate [<?php echo$_SESSION['usuario'] ;?>] </h2>
  </header>
  <section class="container">
    <div class="row">
      <div class="col-12 col-sm-8 col-md-8 col-lg-6 col-xl-4 mx-auto">
        <table class="table mx-auto bg-light w-100 border-0" >
          <thead >
            <tr >
              <th><a href="index.php" class="btn btn-primary w-100" style="font-size:1.3em">Salir</a></th>
            </tr>
          </thead>
          <!-- //while ($filas = $resultado->fetchArray())  -->
        </table>
      </div>
    </div>
  </section>
</body>
<script src="recursos/all.min.js"></script>
<script src="recursos/jquery-3.6.0.min.js"></script>
<script src="recursos/bootstrap.bundle.min.js"></script>


</html>