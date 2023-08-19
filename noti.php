<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once 'vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "ACa6e9414457df7ef67611f169e31eb0a1";
    $token  = "857fcb8221e198d7b9bd4db81ba38ac2";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+59169677638", // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "Hola, somos de la empresa de parqueo, le recordamos que su parqueo expira en 15 minutos. Por favor, diríjase a la empresa para renovar su parqueo o retirar su vehículo para evitar sanciones. Gracias."
        )
      );

print($message->sid);