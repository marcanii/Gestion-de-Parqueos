<?php
include("conexion.php");
$consulta = "SELECT * FROM parqueo";
$resultado = $con->query($consulta);
if ($resultado->num_rows > 0) {
 while($fila = $resultado->fetch_assoc()) {
 echo "idparqueo: " . $fila["idparqueo"]. " - placa: " . $fila["placa"]. " - fecha: " . $fila["fecha"].  " - horaentrada: " . $fila["horaentrada"]. " - horasalida: " . $fila["horasalida"] . " - observaciones: " . $fila["observaciones"] . "<br>";
 }
} else {
 echo "0 results";
}
?>