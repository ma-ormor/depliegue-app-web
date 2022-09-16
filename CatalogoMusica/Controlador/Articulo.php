<?php
include("../Persistencia/CatalogoDao.php");

$idCancion = $_GET['cancion']; 
$datos = new CatalogoDao();
$seleccionar = "Select * from Cancion where c_id = $idCancion";

session_start();

if(isset($_SESSION['usuario'])) 
  $sesion = "Salir"; 
else $sesion = "Entrar";

$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
?>