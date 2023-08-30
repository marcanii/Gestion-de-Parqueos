<?php
session_start();
include('conexion.php');

$contrasena = $_POST['contrasena'];
$carnet = $_POST['carnet'];

$sql = "SELECT idusuario, contrasena, nivel FROM usuario WHERE idusuario ='$carnet' and contrasena='$contrasena'";
    $resultado = $con->query($sql);
    if($resultado->num_rows > 0) {
        $unicafila = $resultado->fetch_assoc();
        setcookie('carnet', $carnet, 0);
        $_SESSION['ci'] = $unicafila['idusuario'];
        $_SESSION['placa'] = $unicafila['contrasena'];
        $_SESSION['nivel'] = $unicafila['nivel'];
        
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false));
    }

$con->close();




