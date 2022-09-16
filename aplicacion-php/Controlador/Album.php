<?php
include("../Persistencia/CatalogoDao.php");

function mostrarFavoritos(){
  if(isset($_SESSION['usuario'])) 
    echo '<a href="../vista/favoritos.php">Favoritos</a>';
}

$datos = new CatalogoDao();
$seleccionar = "Select * from album";

session_start();

if(isset($_SESSION['usuario'])) 
  $sesion = "Salir"; 
else $sesion = "Entrar";

$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
?>