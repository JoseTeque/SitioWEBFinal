<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!--===============================
    CSS
     =============================-->

  <!-- NORMALIZE -->
  <link rel="stylesheet" href="css/normalize.css">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Oswald:wght@400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

    <!-- GOOGLE MAPS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />

    <link rel="stylesheet" href="css/colorbox.css"/>

    <link rel="stylesheet" href="css/lightbox.css"/>

    <?php
      // $archivo = basename($_SERVER['PHP_SELF']); // trae archivo actual
      // $pagina = str_replace(".php","", $archivo);
      // if($pagina === 'invitados' || $pagina === 'index'){
      //   echo '<link rel="stylesheet" href="css/colorbox.css"/>';
      // }else if($pagina === 'conferecia'){
      //   echo '<link rel="stylesheet" href="css/lightbox.css"/>';
      // }
    ?>

  <link rel="stylesheet" href="css/main.css">

  <!--===============================
    JS
     =============================-->
  <!-- FONT AWESOME -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>




  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina ?>">


  <!--===============================
    HEADER
     =============================-->

     <header class="sitio-header">
       <div class="hero">
         <div class="contenido-header">
          <nav class="redes-sociales">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </nav>
          <div class="informacion-evento">
            <div class="clearfix contenedor">
              <p class="fecha"><i class="fas fa-calendar-week iconos"></i> 10-12 Dic</p>
              <p class="ciudad"><i class="fas fa-map-marker-alt iconos"></i> Puerto Ordaz, Venezuela</p>
            </div>
           <h1 class="nombre-sitio">GdlWebCamp</h1>
           <p class="slogan">La Mejor Conferencia de <span>diseño web</span></p>
          </div> <!--Informacion de evento-->
         </div> <!--Contenido Header-->
       </div>  <!--Hero-->
     </header>

  <!--===============================
    NAVEGACION
     =============================-->
     <div class="barra">
       <div class="barra-principal contenedor">
         <a href="index.php" class="imagen-logo">
            <img src="./img/logo.svg" alt="LogoTipo">
         </a>

         <div class="menu-movil">
           <span></span>
           <span></span>
           <span></span>
         </div>

         <nav class="navegacion-principal">
          <a href="./conferecia.php">Conferencia</a>
          <a href="./calendario.php">Calendario</a>
          <a href="./invitados.php">Invitados</a>
          <a href="./registro.php">Reservaciones</a>
         </nav>
       </div>
     </div>
