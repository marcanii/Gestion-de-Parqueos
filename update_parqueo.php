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
$costo_total = $_POST['costototal'];
// establecer zona horaria
date_default_timezone_set('America/La_Paz');
$fecha = date("Y:m:d");
// -------------calcular el costo total-----------------
// sacamos la hora de entrada de la base de datos
$hora_entrada = "SELECT horaentrada FROM parqueo WHERE placa='$placa' AND fecha='$fecha'";
$hora_entrada = $con->query($hora_entrada);
$hora_entrada = $hora_entrada->fetch_assoc();
$hora_entrada = $hora_entrada['horaentrada'];
// convertimos las horas a segundos
$hora_entrada = strtotime($hora_entrada);
$hora_salida = strtotime($hora_salida);
// restamos las horas
$tiempo = $hora_salida - $hora_entrada;
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
// convertirmos a horas la hora de salida
$hora_salida = date("H:i:s", $hora_salida);
// consultas para actualizar en la base de datos
$query1 = "UPDATE cliente SET ci='$ci', nombres='$nombre', apellidos='$apellido', telefono=$telefono, descripcionvehiculo='$descripcion' WHERE placa='$placa'";
$query2 = "UPDATE parqueo SET placa='$placa', horasalida='$hora_salida', estado_parqueo='$estado_parqueo', costo_total=$costo_total, observaciones='$observaciones'
            WHERE placa='$placa' AND fecha='$fecha'";

// ejecutar las consultas
if ($con->query($query1) === TRUE) {
    if ($con->query($query2) === TRUE) {
        echo '<h3>Se actualizo el parqueo correctamente</h3>';
        // redireccionar a la pagina inicio despues de 3 segundos con js
        //echo '<script>setTimeout(function () { window.location.href = "search_parqueo.html"; }, 3000);</script>';
    } else {
        echo "Error: " . $query2 . "<br>" . $con->error;
    }
} else {
    echo "Error: " . $query1 . "<br>" . $con->error;
}
?>