<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css%20Artistas%20Black/fontello.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/estilos.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/menu.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/banner.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/info.css">
  <link rel="stylesheet" href="css%20Login/formulario.css">

  <title>Registrarse</title>
</head>
<body style="background-color: Black">
  <!-- <form action="../Controlador/Registrarse.php" method="post">
    <label for="alias">Usuario:</label>
    
    <label for="contrasena">Usuario:</label>
    <input type="password" name="contrasena" required="true">
    <a href="registrarse.html">Registrarse</a>
    <input type="submit" value="Registrar">
  </form> -->

  <main>
    <div class="contenedor">
      <div class="screen">    
        <section id="banner">
          <center>
            <img src="img/moradoo.png">
          </center>
          <div class="contenedor"></div>
        </section>

        <div class="screen__content">
          <form class="campos" action="../Controlador/Registrarse.php" method="post">
            
            <center>
            <input class="form__input" type="text" 
                   name="alias" required="true" placeholder="Usuario"> <br>
            <input class="form__input" type="password" 
                   name="contrasena" required="true" placeholder="Contraseña"> <br>
            <section id="banner">
              <center>
                <a href=""><input type="submit" value="Registrarse"></a>
              </center>
            </section>
            </center>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>