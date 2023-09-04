<?php
session_start();
// obtener la fecha actual
date_default_timezone_set('America/La_Paz');
$fecha = date("Y-m-d");
$horaentrada = $_POST['horaentrada'];
$horasalida = $_POST['horasalida'];

if(isset($_SESSION['$espacios']))
{
$espacios_totales = $_SESSION['$espacios'];
}else
{
$_SESSION['$espacios'] = 25;
$espacios_totales = $_SESSION['$espacios'];
}


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

$sql1= "SELECT count(*) as numOcup from parqueo where estado_parqueo = 1";
$resultado = $con->query($sql1);

$sql2= "SELECT * from parqueo where estado_parqueo = 1 and placa = '$placa'";
$resultado2 = $con->query($sql2);
if ($resultado2->num_rows > 0) { 
    echo "Estimado usuario usted ya tiene una reserva rapida en este instante. ";

}else {
    if ($resultado->num_rows > 0) { 
        while($fila = $resultado->fetch_assoc()) {
            $numOcup = $fila['numOcup'];
            if($numOcup < $espacios_totales) {
                $sql2 = "INSERT INTO parqueo (placa,fecha, horaentrada, horasalida, estado_parqueo, observaciones, estado_noti) 
                VALUES ('$placa','$fecha','$horaentrada','$horasalida',1,'Reserva rapida, cliente en camino',0)";
    
                if ($con->query($sql2) === TRUE) { 
                     echo "Se realizo la reserva rapida correctamente (aplican tarifas adicionales), te esperamos en menos de 30 min.";
                } else 
                {
                    echo "Error: " . $sql2 . "<br>" . $con->error; 
                }
            } else {
                echo "No hay espacios disponibles, lo sentimos.";
        }
    
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $con->error; 
    }
}



$con->close();
?>
