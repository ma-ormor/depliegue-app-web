<?php
include("../Persistencia/CatalogoDao.php");

session_start();

function mostrarFavoritos(){
  if(isset($_SESSION['usuario'])) 
    echo '<a href="../vista/favoritos.php">Favoritos</a>';
}

if(!isset($_SESSION['u_id'])) header("Location: ../Vista/canciones.php");

$datos = new CatalogoDao();
$idUsuario = $_SESSION['u_id'];
$seleccionar = "
  Select distinct c.*, al.al_nombre from cancion c
  join favoritos f 
  join cancion_esta_album ca
  join album al
  on c.c_id = f.c_id and c.c_id = ca.c_id and ca.al_id = al.al_id
  where f.u_id = ".$idUsuario
;

if(isset($_SESSION['usuario'])) 
  $sesion = "Salir"; 
else $sesion = "Entrar";

if(isset($_POST['favorito'])){
  $insertar = "
    INSERT INTO `favoritos` (`u_id`, `c_id`) 
    VALUES ('".$idUsuario."', '".$_POST['favorito']."');
  ";

  $datos->consulta($insertar);
}else if(isset($_POST['quitar'])){
  $eliminar = "
    Delete from favoritos 
    where u_id = ".$idUsuario." and c_id = ".$_POST['quitar']
  ;

  $datos->consulta($eliminar);
}

$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
?>