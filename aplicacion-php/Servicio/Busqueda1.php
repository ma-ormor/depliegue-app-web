<?php

$token = 'BQAKRZp0nQEKXk1kni-0jOAuAU-DLszQaQecn0VgjsYUFu1XZqJGR6JNHE6ctaaTuxv5gOo7Wt7epGI2NAA';

$datos = [
  "q" => "track:breathe in the air",
  "type"=> "track",
  "limit" => "1",
  //"include_external"=> "audio",
];

$headers  = [
  'Content-Type: application/json',
  'Authorization: Bearer '.$token
];

$url      = 'api.spotify.com/v1/search?'.http_build_query($datos);
//$url = 'https://api.spotify.com/v1/artists/1vCWHaC5f2uS3yhpwWbIA6/albums?album_type=SINGLE&offset=20&limit=10';

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

$features = callSpotifyApi($options); 

function callSpotifyApi($options){
  $curl  = curl_init();
  
  curl_setopt_array($curl, $options); 
  $json  = curl_exec($curl);
  $error = curl_error($curl);
  curl_close($curl);

  if ($error)  return ['error'   => TRUE, 'message' => $error];
  
  $data  = json_decode($json, true);

  print_r(array_keys($data["tracks"]["items"]["0"]["external_urls"]));

  echo $data["tracks"]["items"]["0"]["external_urls"]["spotify"]; 

  // Eliminar
  foreach ($data as $hola) {
    echo '<pre>';
    print_r($hola);
    echo '</pre>';
  }
  // Eliminar
  
  if (is_null($data)) return ['error'   => TRUE, 'message' => json_last_error_msg()];
  
  return $data; 
}

//var_dump($features);
?>