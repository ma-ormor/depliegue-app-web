<?php
include("../Persistencia/CatalogoDao.php");

function pedirToken(){
  $client_id = '15c0aa971a2547a89a2b1be1a59530a6'; 
  $client_secret = '109cfd8039204889b906242690ffe812'; 

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt($ch, CURLOPT_POST,           1 );
  curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
  curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

  $result = curl_exec($ch);
  $datos = json_decode($result, true);

  actualizar($datos["access_token"]);
}

function actualizar($token){
  $datos = new CatalogoDao();
  $actualizar = "Update servicio set token = '".$token."'";
  $resultado = $datos->consulta($actualizar);
}
?>