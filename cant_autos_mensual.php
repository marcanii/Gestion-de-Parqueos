<?php
include('conexion.php');

// Obtener el mes y el año seleccionados (por ejemplo, "2023-09" para septiembre de 2023)
$mes = $_GET['mes'];

// Almacenar en un array la cantidad de autos por día
$autos_por_dia = array();
// almacernar en un array el costo total
$costo_por_dia = array();

for ($dia = 1; $dia <= 30; $dia++) {
    // Consulta SQL para contar autos por día
    $consulta = "SELECT COUNT(*) AS total FROM parqueo WHERE MONTH(fecha) = '$mes' AND DAY(fecha) = '$dia';";
    $resultado = $con->query($consulta);
    $row = $resultado->fetch_assoc();
    $autos_por_dia[] = (int)$row['total'];

    // Consulta SQL para calcular el costo total por día
    $consultaCosto = "SELECT SUM(costo_total) AS total FROM parqueo WHERE MONTH(fecha) = '$mes' AND DAY(fecha) = '$dia';";
    $resultadoCosto = $con->query($consultaCosto);
    $rowCosto = $resultadoCosto->fetch_assoc();
    $costo_por_dia[] = (float)$rowCosto['total']; // Puedes usar (float) para asegurar que el costo sea un número decimal
}

// Cerrar la conexión
$con->close();
// Crear un array asociativo para almacenar ambos conjuntos de datos
$datos = array(
    'autos' => $autos_por_dia,
    'costo' => $costo_por_dia
);
// Convertir el array a JSON
echo json_encode($datos);

// Establecer el encabezado de respuesta como JSON
header("Content-Type: application/json");
?>