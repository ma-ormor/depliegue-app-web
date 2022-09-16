<?php
include("../Servicio/Token.php");

function buscar($cancion, $artista){
  $token = seleccionar();

  return solicitar($token, $cancion, $artista);
}

function seleccionar(){
  $datos = new CatalogoDao();

  $seleccionar = "Select token from Servicio";

  $resultado = $datos->consulta($seleccionar);
  $resultado->data_seek(0);
  $fila = $resultado->fetch_assoc();
  
  return $fila['token'];
}

function solicitar($token, $cancion, $artista){
  $datos = [
    "q" => "track:".$cancion." ".$artista,
    "type"=> "track",
    "limit" => "1",
    //"include_external"=> "audio",
  ];
  $headers = [
    'Content-Type: application/json',
    'Authorization: Bearer '.$token
  ];
  $url = 'api.spotify.com/v1/search?'.http_build_query($datos);
  $options  = [
    CURLOPT_URL            => $url,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_FOLLOWLOCATION => TRUE,
    CURLOPT_ENCODING       => '',
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST  => 'GET',
    CURLOPT_HTTPHEADER     => $headers
  ];

  $data = callSpotifyApi($options); 

  if(isset($data["error"]))
    if($data["error"]["status"] == 401){pedirToken(); return buscar($cancion);}

  return $data["tracks"]["items"]["0"]["external_urls"]["spotify"]; 
}

function callSpotifyApi($options){
  $curl  = curl_init();
  
  curl_setopt_array($curl, $options); 
  $json  = curl_exec($curl);
  $error = curl_error($curl);
  curl_close($curl);

  if ($error)  return ['error'   => TRUE, 'message' => $error];
  
  $data  = json_decode($json, true);

  //print_r(array_keys($data["tracks"]["items"]["0"]["external_urls"]));
  //print_r(array_keys($data["error"]["message"]));
  //$data["error"]["message"] == "The access token expired")
  
  if (is_null($data)) return ['error'   => TRUE, 'message' => json_last_error_msg()];
  
  return $data; 
}
?>