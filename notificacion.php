<?php
require 'vendor/autoload.php';
$token =  "GA230818213143";
$client = new GuzzleHttp\Client(['verify' => false ]);
$payload = array(
  "op" => "registermessage",
  "token_qr" => $token,
  "mensajes" => array(
	array("numero" => "59169677638","mensaje" => "su hora parqueo esta a punto de expirar"),)
);

$res = $client->request('POST', 'https://script.google.com/macros/s/AKfycbyoBhxuklU5D3LTguTcYAS85klwFINHxxd-FroauC4CmFVvS0ua/exec', [
            'headers' => [
                'Content-Type'     => 'application/json',
                'Accept' => 'application/json'
            ], 'json' =>  $payload
        ]);
echo $res->getStatusCode()."<br>";
echo $res->getBody();
?>