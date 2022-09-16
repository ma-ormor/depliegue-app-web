<?php
include("../Persistencia/CatalogoDao.php");

function mostrarFavoritos(){
  if(isset($_SESSION['usuario'])) 
    echo '<a href="../vista/favoritos.php">Favoritos</a>';
}

$buscado = $_POST; 
$datos = new CatalogoDao();
$seleccionar = "Select * from artista";

session_start();

if(isset($_SESSION['usuario'])) 
  $sesion = "Salir"; 
else $sesion = "Entrar";

$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
?>