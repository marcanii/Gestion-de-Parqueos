<?php
include("conexion.php");
// establecer zona horaria
date_default_timezone_set('America/La_Paz');
// Consulta SQL para obtener la hora y fecha de la tabla "parqueo"
$consulta = "SELECT parqueo.*, cliente.telefono
FROM parqueo
INNER JOIN cliente ON parqueo.placa = cliente.placa
WHERE parqueo.estado_parqueo = 1
AND CONCAT(parqueo.fecha, ' ', parqueo.horasalida) >= NOW()"; // Asume que los registros activos tienen estado 1

$resultado = $con->query($consulta);
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $horaSalida = $fila["horasalida"];
        $fechaSalida = $fila["fecha"];
        // Procesar la hora y fecha según tus necesidades
        // Puedes compararla con la hora actual y enviar un mensaje si es necesario
        // Por ejemplo, si está a punto de expirar en los próximos 30 minutos
        $tiempoActual = strtotime("now"); // Tiempo actual en segundos
        $tiempoSalida = strtotime("$fechaSalida $horaSalida"); // Tiempo de salida en segundos
        // echo "Tiempo actual: " . $tiempoActual . "<br>";
        // echo "Tiempo de salida: " . $tiempoSalida . "<br>";
        $tiempoLimite = $tiempoSalida - (15 * 60); // Resta 15 minutos

        if ($tiempoActual >= $tiempoLimite) {
            // Aquí deberías implementar el código para enviar el mensaje de WhatsApp
            // Utiliza una API de WhatsApp compatible para este propósito
            echo "Enviar mensaje de WhatsApp a " . $fila["telefono"] . " para recordarle que su reserva expira en 15 minutos.";
        }
    }
} else {
    echo "No hay registros activos en la tabla parqueo.";
}

$con->close();
?>
