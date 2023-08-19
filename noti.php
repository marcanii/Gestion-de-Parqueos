<?php
require_once 'vendor/autoload.php'; // Reemplaza con el archivo de la biblioteca que elijas

// Configura las credenciales de Twilio
$accountSid = 'ACa6e9414457df7ef67611f169e31eb0a1';
$authToken = '58ecf09bd18a3a5f96b3fc4cda44cee9';

// Inicializa el cliente de Twilio
$client = new Twilio\Rest\Client($accountSid, $authToken);

// Número de teléfono de destino (con prefijo internacional, ej. +1 para Estados Unidos)
$recipientNumber = '+59169677638';

// Mensaje que deseas enviar
$message = 'Hola, este es un mensaje de prueba desde mi aplicación PHP.';

try {
    // Envía el mensaje de WhatsApp
    $client->messages->create(
        $recipientNumber,
        [
            'from' => 'whatsapp:+tu_numero_de_whatsapp', // Debe estar registrado en WhatsApp Business
            'body' => $message
        ]
    );

    echo 'Mensaje enviado con éxito.';
} catch (Exception $e) {
    echo 'Error al enviar el mensaje: ' . $e->getMessage();
}