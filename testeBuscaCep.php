<?php

$data['destino'] = 23090710;



function dd($json){

  echo "<pre>";
  var_dump($json);
  echo "</pre>";

}

$url = file_get_contents('https://viacep.com.br/ws/'. $data['destino']. '/json/unicode/');

dd(json_decode($url));

$json = json_decode($url, true);

echo $json['cep'];

?>