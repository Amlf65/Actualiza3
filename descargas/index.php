<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="../recursos/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="../recursos/logo.svg" sizes="any">
    <title>Descargas</title>
    <style>
       <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        @font-face {
            font-family: pie;
            src: url("../recursos/Schoolkid.ttf");
            font-weight: bolder;
        }
        @font-face {
            font-family: cuerpo;
            src: url("../recursos/Montserrat-Regular.ttf");
        }
        @font-face {
            font-family: titulo;
            src: url("../recursos/orangejuice.ttf");
            font-weight: bolder;
        }
        body {
            background: url("../recursos/mapa_mundi_fondo.svg") fixed,
                url("../recursos/network-cabinet.svg") top 15px left 15px fixed,
                url("../recursos/chip.svg") top 15px right 15px fixed,
                url("../recursos/equipo.svg") bottom 15px left 15px fixed,
                url("../recursos/camara_seguridad.svg") bottom 15px right 15px fixed;
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

    </style>
</head>

<body class="container w-100 mx-auto bd-info text-center">
<header class="text-center">
    <?php if($_SESSION["grupo"]=="adm"): ?>
        <h2><a href="../adm.php">PFAE Actualízate</a> - Descargas</h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="usr"):?>
        <h2><a href="../usr.php">PFAE Actualízate</a> - Descargas</h2> 
    <?php endif; ?>
    <?php if($_SESSION["grupo"]=="tec"): ?>
          <h2><a href="../tec.php">PFAE Actualízate</a> - Descargas</h2> 
    <?php endif; ?>
    
  </header>
  <section class="row justify-content-center border border-secondary rounded-3 shadow-lg bg-light">
  <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1JQW9jxQdbXb4ZpUcGYC6Jiq7Xb16lNat/view?usp=share_link" target="_blank"><img src="./adobe.png" class="w-50 m-3" alt="Adobe Reader" title="Adobe Reader"></a> -->
      <a href="https://get.adobe.com/es/reader/" target="_blank"><img src="./adobe.png" class="w-50 m-3" alt="Adobe Reader" title="Adobe Reader"></a>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1k75sUDEHX84eTxh62nAO8t0ISSj7FTWr/view?usp=share_link" target="_blank"><img src="./autofirma.png" class="w-50 m-3" alt="Firma digital" title="Firma digital"></a>  -->
      <a href="https://firmaelectronica.gob.es/Home/Descargas.htm" target="_blank"><img src="./autofirma.png" class="w-50 m-3" alt="Firma digital" title="Firma digital"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/18FZ8_M1i7G9Ztv2sX8UiyEKkrM_dibn_/view?usp=share_link" target="_blank"><img src="./ccleaner.png" class="w-50 m-3" alt="Ccleaner" title="Ccleaner"></a> -->
      <a href="https://www.ccleaner.com/es-es/ccleaner/download/standard" target="_blank"><img src="./ccleaner.png" class="w-50 m-3" alt="Ccleaner" title="Ccleaner"></a>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1a_xigIUdPHEVmwlhpyHEXXMk1FE_is9_/view?usp=share_link" target="_blank"><img src="./chrome.png" class="w-50 m-3" alt="Navegador" title="Navegador"></a>  -->
      <a href="https://www.google.com/intl/es/chrome/" target="_blank"><img src="./chrome.png" class="w-50 m-3" alt="Navegador" title="Navegador"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1YqS_DOeL1sX0M04sBPeU1ck8wQHmWoiB/view?usp=share_link" target="_blank"><img src="./dni.png" class="w-50 m-3" alt="Tarjeta Dni" title="Tarjeta Dni"></a> -->
      <a href="https://www.dnielectronico.es/PortalDNIe/PRF1_Cons02.action?pag=REF_1101" target="_blank"><img src="./dni.png" class="w-50 m-3" alt="Tarjeta Dni" title="Tarjeta Dni"></a>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1YqS_DOeL1sX0M04sBPeU1ck8wQHmWoiB/view?usp=share_link" target="_blank"><img src="./Hwinfo.png" class="w-50 m-3" alt="Inventario Hardware" title="Inventario Hardware"></a> -->
      <a href="https://www.hwinfo.com/files/hwi_732.exe" target="_blank"><img src="./Hwinfo.png" class="w-50 m-3" alt="Inventario Hardware" title="Inventario Hardware"></a>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1EdaY6EczMwmlSZjbfrh-O-WFHfwCgE4T/view?usp=share_link" target="_blank"><img src="./libreoffice.png" class="w-50 m-3" alt="Oficina electrónica" title="Oficina electrónica"></a>  -->
      <a href="https://es.libreoffice.org/descarga/libreoffice/" target="_blank"><img src="./libreoffice.png" class="w-50 m-3" alt="Oficina electrónica" title="Oficina electrónica"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1EI2RyuZQQ50HKPSJ7zGdE0vrlYw13TNh/view?usp=share_link" target="_blank"><img src="./nicepage.png" class="w-50 m-3" alt="Pagina Web" title="Página web"></a> -->
      <a href="https://nicepage.com/download-windows#" target="_blank"><img src="./nicepage.png" class="w-50 m-3" alt="Pagina Web" title="Página web"></a>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1aMlucjL2pkFU83CMVRbxhlOmg0D8_6Qx/view?usp=share_link" target="_blank"><img src="./pdfcreator.png" class="w-50 m-3" alt="Impresora PDF" title="Impresora PDF"></a>  -->
      <a href="https://download.pdfforge.org/download/pdfcreator/PDFCreator-stable" target="_blank"><img src="./pdfcreator.png" class="w-50 m-3" alt="Pagina Web" title="Página web"></a>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1FibYh51N2r2RdfalFDstyE3neNQfMgsg/view?usp=share_link" target="_blank"><img src="./rufus.png" class="w-50 m-3" alt="Rufus usb" title="Rufus usb"></a> -->
      <a href="https://rufus.ie/es/" target="_blank"><img src="./rufus.png" class="w-50 m-3" alt="Asistencia remota" title="Asistencia remota"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://get.teamviewer.com/64t3gum" target="_blank"><img src="./teamview.png" class="w-50 m-3" alt="Asistencia remota" title="Asistencia remota"></a>   -->
      <!-- <a href="https://drive.google.com/file/d/1FuKCYQO7I9o1tJLj-1UsOEBX99Fdcgqo/view?usp=share_link" target="_blank"><img src="./teamview.png" class="w-50 m-3" alt="Asistencia remota" title="Asistencia remota"></a>  -->
      <a href="https://download.teamviewer.com/QS" target="_blank"><img src="./teamview.png" class="w-50 m-3" alt="Asistencia remota" title="Asistencia remota"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1P0sgPLwAQUnEjA6ChAN_GFJ9AV9x8gb7/view?usp=share_link" target="_blank"><img src="./winrar.png" class="w-50 m-3" alt="Asistencia remota" title="Asistencia remota"></a>  -->
      <a href="https://www.win-rar.com/download.html?&L=6" target="_blank"><img src="./winrar.png" class="w-50 m-3" alt="Asistencia remota" title="Asistencia remota"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1pHA4q8KlPvY5n3ai-4ixfrF2hD6LHWdQ/view?usp=share_link"target="_blank" ><img src="./yumi.png" class="w-50 m-3" alt="Yumi usb" title="Yumi usb"></a>  -->
      <a href="https://www.pendrivelinux.com/yumi-multiboot-usb-creator/"target="_blank" ><img src="./yumi.png" class="w-50 m-3" alt="Yumi usb" title="Yumi usb"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1pHA4q8KlPvY5n3ai-4ixfrF2hD6LHWdQ/view?usp=share_link"target="_blank" ><img src="./yumi.png" class="w-50 m-3" alt="Yumi usb" title="Yumi usb"></a>  -->
      <a href="https://www.the-qrcode-generator.com/es/" target="_blank" ><img src="./codigoQR.png" class="w-50 m-3" alt="Generador QR" title="Generador QR"></a> 
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
      <!-- <a href="https://drive.google.com/file/d/1pHA4q8KlPvY5n3ai-4ixfrF2hD6LHWdQ/view?usp=share_link"target="_blank" ><img src="./yumi.png" class="w-50 m-3" alt="Yumi usb" title="Yumi usb"></a>  -->
      <a href="https://kcsoftwares.com/files/sumo_lite.exe" target="_blank" ><img src="./sumo.png" class="w-50 m-3" alt="Versiones software" title="Versiones software"></a> 
    </div>
  </section> 
</body>  
</html>