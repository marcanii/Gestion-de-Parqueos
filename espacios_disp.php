<?php
include("conexion.php");
$cantidad = 45;
$consulta = "SELECT COUNT(*) AS NumOcup FROM parqueo WHERE estado_parqueo = 1";
$resultado = $con->query($consulta);
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "Espacios disponibles: " . ($cantidad - $fila["NumOcup"]);
    }
} else {
    echo "0 results";
}
?>