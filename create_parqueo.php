<?php
include('conexion.php');
$ci = $_POST['ci'];
$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$placa = $_POST['placa'];
$descripcion = $_POST['descripcion'];
$hora_salida = $_POST['horasalida'];
$estado_parqueo = $_POST['estado'];
$observaciones = $_POST['observaciones'];
// establecer zona horaria
date_default_timezone_set('America/La_Paz');
$fecha = date("Y:m:d");
// Obtener la hora actual
$horaActual = date("H:i:s");
// -------------calcular el costo total-----------------
$horaActual = strtotime($horaActual);
$hora_salida = strtotime($hora_salida);
// restamos las horas
$tiempo = $hora_salida - $horaActual;
// convertimos los segundos a horas
$tiempo = $tiempo / 3600;
// consultamos la tarifa por hora
$tarifa = "SELECT valor FROM tarifa WHERE tipotarifa = 'Hora'";
$tarifa = $con->query($tarifa);
$tarifa = $tarifa->fetch_assoc();
$tarifa = $tarifa['valor'];
// calculamos el costo total
$costo_total = $tiempo * $tarifa;
$costo_total = round($costo_total, 2);
// convertirmos a horas la hora de salida y la hora actual
$hora_salida = date("H:i:s", $hora_salida);
$horaActual = date("H:i:s", $horaActual);
// consultas para insertar en la base de datos
$query1 = "INSERT INTO cliente (placa, ci, nombres, apellidos, telefono, descripcionvehiculo)
VALUES ('$placa', '$ci', '$nombre', '$apellido', $telefono, '$descripcion')";
$query2 = "INSERT INTO parqueo (placa, fecha, horaentrada, horasalida, estado_parqueo, costo_total, observaciones, estado_noti)
VALUES ('$placa', '$fecha', '$horaActual', '$hora_salida', '$estado_parqueo', $costo_total, '$observaciones', 0)";

// ejecutar las consultas
if ($con->query($query1) === TRUE) {
    if ($con->query($query2) === TRUE) {
        echo "<script>alert('Se registro el parqueo correctamente.'); window.location.href='inicio.php';</script>";
    } else {
        echo "Error: " . $query2 . "<br>" . $con->error;
    }
} else {
    echo "Error: " . $query1 . "<br>" . $con->error;
}
?>