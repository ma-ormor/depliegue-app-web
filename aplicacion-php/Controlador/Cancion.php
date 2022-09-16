<?php
if(!isset($datos)) include("../Persistencia/CatalogoDao.php");

if(isset($_POST['productor'])){
  $seleccionar = seleccionarPorDi($_POST['productor']);
}else if(isset($_POST['album'])){
  $seleccionar = seleccionarPorAl($_POST['album']);
}else if(isset($_POST['artista'])){
  $seleccionar = seleccionarPorAr($_POST['artista']);
}else $seleccionar = "
  Select distinct c.*, al.al_nombre from cancion c
  join cancion_esta_album ca 
  join album al 
  on c.c_id = ca.c_id and ca.al_id = al.al_id
";

function seleccionarPorAl($buscado){
  return '
    Select distinct c.*, al_nombre from cancion c
    join cancion_esta_album cal
    join album al
    on c.c_id = cal.c_id and al.al_id = cal.al_id
    where al.al_id = '.$buscado
  ;
}

function seleccionarPorAr($buscado){
  return '
    Select distinct c.*, al.al_nombre from cancion c
    join artista_tiene_cancion ac
    join cancion_esta_album ca 
    join album al
    on c.c_id = ac.c_id and c.c_id = ca.c_id and ca.al_id = al.al_id
    where ac.a_id = '.$buscado
  ;
}

function seleccionarPorDi($buscado){
  return '
    Select distinct c.*, al.al_nombre from cancion c
    join cancion_esta_album ca 
    join album al 
    on c.c_id = ca.c_id and ca.al_id = al.al_id
    where p_id = '.$buscado
  ;
}

function estaEnLista($idCancion, $datos){
  $seleccionar = "
    Select count(*) from favoritos f
    where f.u_id = ".$_SESSION['u_id']." and f.c_id = ".$idCancion
  ;

  $resultado = $datos->consulta($seleccionar);
  $resultado->data_seek(0);
  $fila = $resultado->fetch_assoc();

  if($fila['count(*)'] > 0) 
    return true;
  return false;
}

function mostrar($idCancion, $datos){
  if(!isset($_SESSION['usuario'])) return;

  if(!estaEnLista($idCancion, $datos)){
    echo '
    <form action="../Vista/favoritos.php" method="post">
      <input type="hidden" name="favorito" value="'.$idCancion.'">
      <input class="favorito" type="submit" value="Agregar a lista">
    </form>
    ';
  }else{
    echo '
    <form action="../Vista/favoritos.php" method="post">
      <input type="hidden" name="quitar" value="'.$idCancion.'">
      <input class="favorito" type="submit" value="Quitar de lista">
    </form>
    ';
  }
}

function mostrarFavoritos(){
  if(isset($_SESSION['usuario'])) 
    echo '<a href="../vista/favoritos.php">Favoritos</a>';
}

$datos = new CatalogoDao();

session_start();

if(isset($_SESSION['usuario'])) 
  $sesion = "Salir"; 
else $sesion = "Entrar";

$resultado = $datos->consulta($seleccionar);
$resultado->data_seek(0);
?>