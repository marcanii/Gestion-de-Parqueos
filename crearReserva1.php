<?php
session_start();
$fechareserva = $_POST['fechareserva'];
$horainiciores = $_POST['horainiciores'];
$horafinalres = $_POST['horafinalres'];

if(isset($_SESSION['ci']) and isset($_SESSION['placa']) and $_SESSION['nivel']==0) {
    $ci = $_SESSION['ci'];
    $placa = $_SESSION['placa'];
}
 else
{
    echo "Debe logearse como cliente para poder realizar las reservas";
    exit;
}

include('conexion.php');

date_default_timezone_set('America/La_Paz');

$fechaactual = date("Y-m-d");
$horaActual = new DateTime();

$horainicioresObj = new DateTime($horainiciores);
$difHoras = $horainicioresObj->diff($horaActual);

if ($fechaactual > $fechareserva) {
    echo "No se permite la reserva porque la fecha de reserva ya pasó.";
} 
else if($fechareserva == $fechaactual and $difHoras->h < 3) {
    echo "No se permite la reserva porque la hora de reserva es en menos de 3 horas.";
}
else{
        $sql2 = "INSERT INTO reserva (horainiciores, fechareserva, horafinalres, id_cliente, estado_reserva) 
        VALUES ('$horainiciores','$fechareserva','$horafinalres','$ci',1)";

        if ($con->query($sql2) === TRUE) {
            echo "Se realizo la reserva correctamente! <br>";
            echo "Su fecha de reserva: ".$fechareserva."<br>";
            echo "Lo esperamos a las: ".$horainiciores."<br>";
            echo "La reserva culmina a las: ".$horafinalres."<br>";
        } else {
            echo "Error: " . $sql2 . "<br>" . $con->error;
        }
    }


$con->close();
?>
