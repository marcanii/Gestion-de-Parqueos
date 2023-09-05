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
// consultas para insertar en la base de datos
$query1 = "INSERT INTO cliente (placa, ci, nombres, apellidos, telefono, descripcionvehiculo)
VALUES ('$placa', '$ci', '$nombre', '$apellido', $telefono, '$descripcion')";
$query2 = "INSERT INTO parqueo (placa, fecha, horaentrada, horasalida, estado_parqueo, observaciones, estado_noti)
VALUES ('$placa', '$fecha', '$horaActual', '$hora_salida', '$estado_parqueo', '$observaciones', 0)";

// ejecutar las consultas
if ($con->query($query1) === TRUE) {
    if ($con->query($query2) === TRUE) {
        echo 'Se registro el parqueo correctamente';
        // redireccionar a la pagina inicio despues de 3 segundos con js
        echo '<script>setTimeout(function () { window.location.href = "inicio.php"; }, 3000);</script>';
    } else {
        echo "Error: " . $query2 . "<br>" . $con->error;
    }
} else {
    echo "Error: " . $query1 . "<br>" . $con->error;
}
?>