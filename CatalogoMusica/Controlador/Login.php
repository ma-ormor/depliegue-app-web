<?php
include("../Persistencia/CatalogoDao.php");

$datos = new CatalogoDao();
$nombre = $_POST['alias'];
$contrasena = $_POST['contrasena'];

$seleccionar = "
  Select count(*) from Usuario 
  where u_nombre like '".$nombre."' and u_contrasena like '".$contrasena."'"
;

$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
$fila = $resultado->fetch_assoc();

if($fila['count(*)'] > 0){
  iniciarSesion($nombre, $datos); header("Location: ../Vista/canciones.php");
}else require_once("../Vista/login.php"); 

function iniciarSesion($nombre, $datos){
  session_start(); 
  $_SESSION['usuario'] = $nombre;
  $_SESSION['u_id'] = seleccionarId($nombre, $datos);
}

function seleccionarId($nombre, $datos){
  $seleccionar = "Select u_id from Usuario where u_nombre like '".$nombre."'";

  $resultado = $datos->consulta($seleccionar);
  $resultado->data_seek(0);
  $fila = $resultado->fetch_assoc();
  
  return $fila['u_id'];
}
?>