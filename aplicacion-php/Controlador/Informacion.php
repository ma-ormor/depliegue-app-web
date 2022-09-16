<?php
include("../Servicio/Busqueda.php");
include("../Modelo/Artista.php");
include("../Modelo/Productor.php");

function mostrarFavoritos(){
  if(isset($_SESSION['usuario'])) 
    echo '<a href="../vista/favoritos.php">Favoritos</a>';
}

function mostrarGrupo($artista){
  $grupo = $artista->getGrupo(); 
  if($grupo != "") echo " • Grupo: ".$grupo; 
}

$idCancion = $_GET['cancion']; 
$datos = new CatalogoDao();
$artista = new Artista();
$productor = new Productor();
$seleccionarP = "
  Select p.* from productor p
  join cancion c
  on p.p_id = c.p_id
  where c.c_id = ".$idCancion."
";
$seleccionarAr = "
  Select a.* from artista a
  join artista_tiene_cancion ac
  join cancion c
  on a.a_id = ac.a_id and ac.c_id = c.c_id
  where c.c_id = ".$idCancion."
";
$seleccionar = "
  Select c.*, al.al_nombre, a.a_nombre from cancion c
  join cancion_esta_album ca 
  join album al 
  join artista a
  join artista_tiene_cancion ac
  on 
    c.c_id = ca.c_id and 
    ca.al_id = al.al_id and 
    c.c_id = ac.c_id and 
    ac.a_id = a.a_id
  where c.c_id = $idCancion
";

session_start();

if(isset($_SESSION['usuario'])) 
  $sesion = "Salir"; 
else $sesion = "Entrar";
// Artista
$resultado = $resultado = $datos->consulta($seleccionarAr);
$resultado->data_seek(0);
$fila = $resultado->fetch_assoc();

$artista->setNombre($fila['a_nombre']);
$artista->setPais($fila['a_pais']);
$artista->setGrupo($fila['a_grupo']);
// Disquera
$resultado = $resultado = $datos->consulta($seleccionarP);
$resultado->data_seek(0);
$fila = $resultado->fetch_assoc();

$productor->setNombre($fila['p_nombre']);
$productor->setPais($fila['p_pais']);
// Canción
$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
?>