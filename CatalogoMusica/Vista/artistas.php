<?php include("../Controlador/Artista.php"); ?>

  <!-- menu -->

  <header>
    <img src="">
    <div class="contenedor">
      <!-- <h1 class="icon-gwallet">FlivesBeats</h1>
      <input type="checkbox" id="menu-bar"> 
      <label class="icon-menu" for="menu-bar"></label> -->
      
      <nav class="menu">
        <a href="../Vista/canciones.php">Canciones</a>
        <a href="../Vista/albumes.php">Albumes</a>
        <a href="../Vista/artistas.php">Artistas</a>
        <a href="../Vista/productores.php">Disqueras</a> <?php mostrarFavoritos(); ?>
        <a href="../vista/Login.php"><?php echo $sesion; ?></a>
      </nav>
    </div>
  </header>

    <!-- Desde aquí -->

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Artistas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1,maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css%20Artistas%20Black/fontello.css">
    <link rel="stylesheet" href="css%20Artistas%20Black/estilos.css">
    <link rel="stylesheet" href="css%20Artistas%20Black/menu.css">
    <link rel="stylesheet" href="css%20Artistas%20Black/banner.css">
    <link rel="stylesheet" href="css%20Artistas%20Black/info.css">
    <link rel="stylesheet" href="css%20Artistas%20Black/boton.css">
    
    <link rel="icon" href="Iconio.ico">
    
  </head>

  <body style="background-color: Black" font>
  <header>
    <img src="">
    <div class="contenedor">
    <img src="../Vista/img/morado.png">
      <h1>AlzaUp</h1>
      <input type="checkbox" id="menu-bar"> 
      <label class="icon-menu" for="menu-bar"></label>
      
      <nav class = "menu">
        <a href="../Vista/canciones.php">Canciones</a>
        <a href="../Vista/albumes.php">Albumes</a>
        <a href="../Vista/artistas.php">Artistas</a>
        <a href="../Vista/productores.php">Disqueras</a> <?php mostrarFavoritos(); ?>
        <a href="../vista/login.php"><?php echo $sesion; ?></a>
      </nav>
    </div>
  </header>  
  
  <main>
      <section id="banner">
         <center>
          <img src="img/aalza.png">
          </center>
          <div class="contenedor"></div>
           <center>
            <h2>Artistas</h2>
            <p></p>

          </center>
          </div>
      </section>
      
      <section id="bienvenidos">
          <h2> </h2>
          <p> </p>
      </section>
      
      <section id="blog">
        <h3> </h3>
        <div class="contenedor">

          <!-- artistas -->

          <?php while($fila = $resultado->fetch_assoc()){ ?>
            <article>
              <h3><?php echo $fila['a_nombre'] ?></h3>
              <a href="">
                <img src="imagenes/<?php echo $fila['a_nombre'] ?>.jpg">
              </a>
              <h4> </h4>
              <form action="../Vista/canciones.php" method="post">
                <input type="hidden" name="artista" value="<?php echo $fila['a_id'] ?>">
                <input type="submit" value="Ver canciones">
              </form>
            </article>
          <?php }// While ?>    
        </div>
      </section>

      <section id="info">
          <h3>Contacto</h3>
          <div class="contenedor">
              <div class="info-flives">
              soporte@alzaup.com.mx • Programación Web &copy; 2022
              </div>
          </div>
      </section>
  </main>
  
  <footer>
      <!-- <div class="contenedor">
          <p class="copy">Flives Records &copy; 2017</p>
          <div class="sociales">
              <a class="icon-facebook" href="https://www.facebook.com/owsla/"></a>
              <a class="icon-twitter" href="https://twitter.com/itsboombomb"></a>
              <a class="icon-soundcloud" href="https://soundcloud.com/flivesbeats"></a>
              <a class="icon-youtube-play" href="https://www.youtube.com/channel/UC5gxc0gS0XuRTxed8J-VnYA/featured"></a>
              <a class="icon-instagram" href="https://www.instagram.com/itsboombomb/"></a>
              <a class="icon-snapchat-ghost" href="http://owsla.com/tag/snapchat/"></a>
              <a class="icon-chrome" href="https://fonts.google.com/?selection.family=Josefin+Sans"></a>
              <a class="icon-music" href="https://soundcloud.com/geer-bootlegs/pa-que-le-de-geer-bootleg/s-qqxZ0"></a>
              <a class="icon-spin6" href="https://www.google.com.mx/search?q=vaporwave&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjJxZatrc7TAhXh64MKHagCDSUQ_AUICCgB&biw=1420&bih=954"></a>

          </div>
      </div> -->
  </footer>
  
  </body>
</html>