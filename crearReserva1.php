<?php
session_start();
$fechareserva = $_POST['fechareserva'];
$horainiciores = $_POST['horainiciores'];
$horafinalres = $_POST['horafinalres'];

if(isset($_SESSION['ci'])) {
    $ci = $_SESSION['ci'];
} else {
    $ci = 0;
}
if(isset($_SESSION['placa'])) {
    $placa = $_SESSION['placa'];
} else {
    $placa = 0;
}

include('conexion.php');

date_default_timezone_set('America/La_Paz');
$fechaActual = date("Y-m-d");
$fechaReserva = date("Y-m-d", strtotime($fechareserva)); // Convertir la fecha de reserva a formato Y-m-d

$horaActual = new DateTime();
$horainicioresObj = new DateTime($horainiciores);
$difHoras = $horainicioresObj->diff($horaActual);

if ($fechaActual > $fechaReserva) {
    echo "No se permite la reserva porque la fecha de reserva ya pasó.";
} 
else if($fechareserva == $fechaActual and $difHoras->h < 3) {
    echo "No se permite la reserva porque la hora de reserva es en menos de 3 horas.";
}
else{
        $sql2 = "INSERT INTO reserva (horainiciores, fechareserva, horafinalres, id_cliente, estado_reserva) 
        VALUES ('$horainiciores','$fechareserva','$horafinalres','$ci',1)";

        if ($con->query($sql2) === TRUE) {
            echo "Se añadió el registro correctamente";
        } else {
            echo "Error: " . $sql2 . "<br>" . $con->error;
        }
    }


$con->close();
?>
