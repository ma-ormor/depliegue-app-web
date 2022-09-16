<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css%20Artistas%20Black/fontello.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/estilos.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/menu.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/banner.css">
  <link rel="stylesheet" href="css%20Artistas%20Black/info.css">
  <link rel="stylesheet" href="css%20Login/formulario.css">
  
  <link rel="icon" href="Iconio.ico">
</head>
<body style="background-color: Black" font>
  <?php
  session_start();

  if(isset($_SESSION['usuario'])){
    $_SESSION = array(); //unset($_SESSION['usuario']);
    session_destroy();
    header("Location: ../Vista/login.php");
  }
  ?>

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
          <form class="campos" action="../Controlador/Login.php" method="post">
            
            <center>
            <input class="form__input" type="text" 
                   name="alias" required="true" placeholder="Usuario">
            <br>
            <input class="form__input" type="password" 
                   name="contrasena" required="true" placeholder="Contraseña">
            <br>

            <section id="banner">
              <center>
                <a href=""><input type="submit" value="Entrar"></a>
              </center>
            </section>
            <a class="enlace" href="registrarse.php">Registrarse</a>
            </center>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>