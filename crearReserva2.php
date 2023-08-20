<?php
session_start();
$fecha = $_POST['fecha'];
$horaentrada = $_POST['horaentrada'];
$horasalida = $_POST['horasalida'];

if(isset($_SESSION['ci']) and isset($_SESSION['placa'])) {
    $ci = $_SESSION['ci'];
    $placa = $_SESSION['placa'];
} 

include('conexion.php');

$sql2 = "INSERT INTO parqueo (placa,fecha, horaentrada, horasalida, estado_parqueo, observaciones, estado_noti) 
VALUES ('$placa','$fecha','$horaentrada','$horasalida',1,'Reserva rapida, cliente en camino ',0)";

if ($con->query($sql2) === TRUE) { 
    echo "Se añadió el registro correctamente";
} else {
    echo "Error: " . $sql2 . "<br>" . $con->error; 
}

$con->close();
?>
