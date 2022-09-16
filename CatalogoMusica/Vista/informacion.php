<?php include("../Controlador/Informacion.php"); ?> 

<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Información</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1,maximum-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css%20General%20Artist%20Black/fontello.css">
    <link rel="stylesheet" href="css%20General%20Artist%20Black/estilos.css">
    <link rel="stylesheet" href="css%20General%20Artist%20Black/menu.css">
    <link rel="stylesheet" href="css%20General%20Artist%20Black/banner.css">
    <link rel="stylesheet" href="css%20General%20Artist%20Black/info.css">
    
    <link rel="icon" href="Iconio.ico">
    
  </head>
  
  <body style="background-color: Black" font>
  <header>
    <div class="contenedor">
    <img src="../Vista/img/morado.png">
      <h1 >AlzaUp</h1>
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
      <?php $fila = $resultado->fetch_assoc(); ?>
      
      <section id="bienvenidos">
          <h2> <?php echo $fila['c_nombre']; ?> </h2>
          <p> </p>
      </section>

      <section id="blog">
        <h3> </h3>
        <div class="contenedor">
          <article>
            <h2>C A N C I Ó N</h2><br>
            <center>
              <img src="imagenes/<?php echo $fila['al_nombre']; ?>.jpg">
            </center>
            <br><br><br>
            <h1>
              <?php echo $fila['c_nombre']; ?> • 
              Albúm: <?php echo $fila['al_nombre']; ?> •
              Duracción: <?php echo $fila['c_duracion']; ?> •
              Género: <?php echo $fila['c_genero']; ?> •
              Lanzamiento: <?php echo $fila['c_anio']; ?> 
              <?php echo $fila['c_enlace']; ?> 
            </h1>
            <section id="banner">
              <center>
                <!-- <input type="button" value="a"> -->
                <a href="<?php echo buscar($fila['c_nombre'], $fila['a_nombre']); ?>">
                  Escuchar en Spotify
                </a><br>
              </center>
            </section>
            <!-- Artista -->
            <h2>A R T I S T A</h2><br>
            <center>
              <img src="imagenes/<?php echo $artista->getNombre(); ?>.jpg">
            </center>
            <br>
            <h1>
              <?php echo $artista->getNombre(); ?> • 
              País: <?php echo $artista->getPais(); ?>
              <?php mostrarGrupo($artista); ?> 
            </h1>
            <br><br><br><br><br><br>
            <!-- Disquera -->
            <h2>D I S Q U E R A</h2><br>
            <center>
              <img src="imagenes/<?php echo $productor->getNombre(); ?>.jpg">
            </center>
            <br>
            <center>
              <h1>
                <?php echo $productor->getNombre(); ?> • 
                País: <?php echo $productor->getPais(); ?>
              </h1>
            </center>
            <br><br><br><br><br><br>
          </article>
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
  
  <footer></footer>
  
  </body>
</html>
