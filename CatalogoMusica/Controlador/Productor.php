<?php
include("../Persistencia/CatalogoDao.php");

$buscado = $_POST; 
$datos = new CatalogoDao();
$seleccionar = "Select * from Productor";

session_start();

function mostrarFavoritos(){
  if(isset($_SESSION['usuario'])) 
    echo '<a href="../vista/favoritos.php">Favoritos</a>';
}

if(isset($_SESSION['usuario'])) 
  $sesion = "Salir"; 
else $sesion = "Entrar";

$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
?>