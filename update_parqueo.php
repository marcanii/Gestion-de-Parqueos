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
// consultas para actualizar en la base de datos
$query1 = "UPDATE cliente SET ci='$ci', nombres='$nombre', apellidos='$apellido', telefono=$telefono, descripcionvehiculo='$descripcion' WHERE placa='$placa'";
$query2 = "UPDATE parqueo SET placa='$placa', horasalida='$hora_salida', estado_parqueo='$estado_parqueo', observaciones='$observaciones'
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