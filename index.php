<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualízate</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="recursos/bootstrap.min.css">
  <!-- Icono-->
  <link rel="icon" type="image/svg+xml" href="dist/img/serra.png" sizes="any">
  <style>
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
    h1,h2,h3{
      font-family: titulo;
    }
  </style>
</head>
<body class="hold-transition login-page container bg-light">
<header class="text-center">
  <h1>- PFAE Actualízate -</h1>
</header>
<div class="login-box row">
  <div class="card rounded col-11 col-md-5 mx-auto m-3">
    <div class="card-body login-card-body m-3">
      <form role="form">
        <div class="input-group mb-3">
          <input id="user" type="text" class="form-control" placeholder="Usuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-2x fa-user"></span>
            </div>
          </div>
        </div>  
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-2x fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 ">
            <button id="btn_confirmar" type="submit" class="btn btn-primary btn-block mt-4 float-end ">Entrar</button>
          </div>

        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
  <!-- Font Awesome -->
<script src="recursos/all.min.js"></script>
<!-- jQuery -->
<script src="recursos/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="recursos/bootstrap.bundle.min.js"></script>

<script>
  
  $("#btn_confirmar").on("click", function() {
    var user = $('#user').val();
    var password = $('#password').val();
    //alert(user)
    $.ajax({
        url: 'accesoUsuario.php',
        type: 'POST',
        data: 'user=' + user + '&password=' + password
    }).done(function(resp) {
    //alert(resp);
       
        if (resp == 'adm') {
          location.href = 'adm.php';
        } else if (resp == 'tec') {
          location.href = 'tec.php';
        } else if (resp == 'usr') {
          location.href = 'usr.php';
        } else {
          $_SESSION['usuario']="";
          $_SESSION['grupo']="";
          location.href = 'index.php';
        }
        setTimeout(function() {
          $_SESSION['usuario']=$("#user").val();
          $("#user").val('');
          $("#password").val('');
        }, 1000);
    });
  });
</script>
</body>
</html>