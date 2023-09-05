<?php
// include('verificar.php');#acceso solo para usuarios logueados
// include('permiso.php'); #acceso solo para usuarios de cierto nivel
$tipotarifa = $_POST['tipotarifa'];
$descripciontarifa = $_POST['descripciontarifa'];
$valor = $_POST['valor'];
$idtarifa=$_POST['idtarifa'];

include('conexion.php');
###Seccion modificada para fotografia
$sql = "UPDATE tarifa SET tipotarifa='$tipotarifa', descripciontarifa='$descripciontarifa', valor='$valor' WHERE idtarifa=$idtarifa";
#

#solo comillas '' se usa para valores de tipo texto
#echo $sql;

if ($con->query($sql) === TRUE) {
    echo '<div class="container w-50 mx-auto custum-container">Se actualizo la tarifa correctamente';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
