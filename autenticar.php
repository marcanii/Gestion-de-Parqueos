<?php
session_start();
include('conexion.php');

$contrasena = $_POST['contrasena'];
$carnet = $_POST['carnet'];

$sql = "SELECT placa, ci, nombres FROM cliente WHERE ci ='$carnet' and placa='$contrasena'";
$resultado = $con->query($sql);
if($resultado->num_rows > 0) {
    $unicafila = $resultado->fetch_assoc();
    setcookie('carnet', $carnet, 0);
    $_SESSION['nombres'] = $unicafila['nombres'];
    $_SESSION['ci'] = $unicafila['ci'];
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
