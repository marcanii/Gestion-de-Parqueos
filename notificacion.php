<?php
include("conexion.php");
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

date_default_timezone_set('America/La_Paz');

$consulta = "SELECT parqueo.*, cliente.telefono
FROM parqueo
INNER JOIN cliente ON parqueo.placa = cliente.placa
WHERE parqueo.estado_parqueo = 1
AND CONCAT(parqueo.fecha, ' ', parqueo.horasalida) >= NOW()
AND parqueo.estado_noti = 0"; // Asegúrate de que estado_noti sea 0

$resultado = $con->query($consulta);
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $horaSalida = $fila["horasalida"];
        $fechaSalida = $fila["fecha"];
        $tiempoActual = strtotime("now");
        $tiempoSalida = strtotime("$fechaSalida $horaSalida");
        $tiempoLimite = $tiempoSalida - (15 * 60);

        if ($tiempoActual >= $tiempoLimite) {
            // Aquí deberías implementar el código para enviar el mensaje de WhatsApp
            // Utiliza una API de WhatsApp compatible para este propósito

            // Después de enviar la notificación, actualiza estado_noti a 1 para indicar que se ha enviado la notificación.
            $parqueoId = $fila["idparqueo"]; // Reemplaza "id" con el nombre real del campo de ID en tu tabla.
            // Actualiza el estado_noti
            $updateQuery = "UPDATE parqueo SET estado_noti = 1 WHERE idparqueo = $parqueoId";
            $con->query($updateQuery);

            // Update the path below to your autoload.php,
            // see https://getcomposer.org/doc/01-basic-usage.md
        
            $sid    = "ACa6e9414457df7ef67611f169e31eb0a1";
            $token  = "ee143a10149336d3fcec2e8a1c4605ac";
            $twilio = new Client($sid, $token);

            $message = $twilio->messages
            ->create("whatsapp:+591".$fila["telefono"], // to
                array(
                "from" => "whatsapp:+14155238886",
                "body" => "Hola, somos de la empresa de parqueo, le recordamos que su parqueo expira en 15 minutos. Por favor, diríjase a la empresa para renovar su parqueo o retirar su vehículo para evitar sanciones. Gracias."
                )
            );
            echo "Notificacion enviada a " . $fila["telefono"] . " a las " . date("H:i:s") . " del " . date("Y-m-d") . ". Su parqueo expira en 15.";
        }
    }
} else {
    echo "No hay registros activos en la tabla parqueo.";
}

$con->close();
?>
