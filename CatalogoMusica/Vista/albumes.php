<?php include("../Controlador/Album.php"); ?>

<!DOCTYPE html>
<html lang="es">
  <head>
    
    <title>Albumes</title>
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
            <h2>Albumes</h2>
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
          
          <!-- albumes -->

          <?php while($fila = $resultado->fetch_assoc()){ ?>
            <article>
              <h3><?php echo $fila['al_nombre'] ?></h3>
              <a href="">
                <img src="imagenes/<?php echo $fila['al_nombre'] ?>.jpg">
                <h4> </h4>
              </a>
              <form action="../Vista/canciones.php" method="post">
                <input type="hidden" name="album" value="<?php echo $fila['al_id'] ?>">
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
  
  <footer></footer>
  
  </body>
</html>