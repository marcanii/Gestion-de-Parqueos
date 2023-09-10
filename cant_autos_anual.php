<?php
include('conexion.php');

$anio = $_GET['anio'];

// Almacenar en un array la cantidad de autos por mes
$autos_por_mes = array();
// Almacenar en un arrat el costo total
$costo_por_mes = array();

for ($mes = 1; $mes <= 12; $mes++) {
    // Consulta SQL para contar autos por mes
    $consulta = "SELECT COUNT(*) AS total FROM parqueo WHERE YEAR(fecha) = '$anio' AND MONTH(fecha) = '$mes';";
    $resultado = $con->query($consulta);
    $row = $resultado->fetch_assoc();
    $autos_por_mes[] = (int)$row['total'];

    // Consulta SQL para calcular el costo total por mes
    $consultaCosto = "SELECT SUM(costo_total) AS total FROM parqueo WHERE YEAR(fecha) = '$anio' AND MONTH(fecha) = '$mes';";
    $resultadoCosto = $con->query($consultaCosto);
    $rowCosto = $resultadoCosto->fetch_assoc();
    $costo_por_mes[] = (float)$rowCosto['total']; // Puedes usar (float) para asegurar que el costo sea un número decimal
}

// Cerrar la conexión
$con->close();

// Crear un array asociativo para almacenar ambos conjuntos de datos
$datos = array(
    'autos' => $autos_por_mes,
    'costo' => $costo_por_mes
);

echo json_encode($datos);

// Establecer el encabezado de respuesta como JSON
header("Content-Type: application/json");
?>
