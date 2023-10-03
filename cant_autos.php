<?php
include('conexion.php');

// Obtener la fecha seleccionada
$fechaSeleccionada = $_GET['fecha'];

// Almacenar en un array la cantidad de autos por hora
$autos_por_hora = array();
// Almacenar en un array el costo total por hora
$costo_por_hora = array();

for ($i = 7; $i < 22; $i++) {
    // Consulta SQL para contar autos por hora
    $consultaAutos = "SELECT COUNT(*) AS total FROM parqueo WHERE DATE(fecha) = '$fechaSeleccionada' AND HOUR(horaentrada) = '$i'; ";
    $resultadoAutos = $con->query($consultaAutos);
    $rowAutos = $resultadoAutos->fetch_assoc();
    $autos_por_hora[] = (int)$rowAutos['total'];
    
    // Consulta SQL para calcular el costo total por hora
    $consultaCosto = "SELECT SUM(costo_total) AS total FROM parqueo WHERE DATE(fecha) = '$fechaSeleccionada' AND HOUR(horaentrada) = '$i'; ";
    $resultadoCosto = $con->query($consultaCosto);
    $rowCosto = $resultadoCosto->fetch_assoc();
    $costo_por_hora[] = (float)$rowCosto['total']; // Puedes usar (float) para asegurar que el costo sea un número decimal
}

// Cerrar la conexión
$con->close();

// Crear un array asociativo para almacenar ambos conjuntos de datos
$datos = array(
    'autos' => $autos_por_hora,
    'costo' => $costo_por_hora
);

// Convertir el array a JSON
$jsonData = json_encode($datos);

// Establecer el encabezado de respuesta como JSON
header("Content-Type: application/json");

// Enviar el JSON como respuesta
echo $jsonData;
?>

