<?php
include("../Persistencia/CatalogoDao.php");

$datos = new CatalogoDao();
$nombre = $_POST['alias'];
$contrasena = $_POST['contrasena'];
$registrar = "
  Insert into usuario (u_nombre, u_contrasena) 
  values ('".$nombre."', '".$contrasena."')
";
// $seleccionar = "
//   Select count(*) from Usuario where u_nombre like '".$nombre."'
// ";

// function existe($seleccionar){
//   $resultado = $datos->consulta($seleccionar);
//   $resultado->data_seek(0);
//   $fila = $resultado->fetch_assoc();

//   if($fila['count(*)'] > 0)
//     return true;
//   else return false;
// }

// function registrar($registrar){
$datos->consulta($registrar);
// }

// if(!existe($seleccionar))
  // registrar($registrar);
// else header("Location: ../Vista/Registrar.php");

header("Location: ../Vista/login.php");
?>