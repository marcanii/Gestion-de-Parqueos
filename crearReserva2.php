<?php
session_start();
$fecha = $_POST['fecha'];
$horaentrada = $_POST['horaentrada'];
$horasalida = $_POST['horasalida'];
if(isset($_SESSION['$espacios']))
    {
        $espacios_totales = $_SESSION['$espacios'];
    }
    else{
        $_SESSION['$espacios'] = 25;
        $espacios_totales = $_SESSION['$espacios'];
    }

if(isset($_SESSION['ci']) and isset($_SESSION['placa'])) {
    $ci = $_SESSION['ci'];
    $placa = $_SESSION['placa'];
}
else {
    // redireccionar a login rompiendo el flujo de ejecución
    header("Location: login.php");
}

include('conexion.php');

$sql1= "SELECT count(*) as numOcup from parqueo where estado_parqueo = 1";
$resultado = $con->query($sql1);
if ($resultado->num_rows > 0) { // Si hay resultados
    while($fila = $resultado->fetch_assoc()) {
        $numOcup = $fila['numOcup'];
        if($numOcup < $espacios_totales) {
            $sql2 = "INSERT INTO parqueo (placa,fecha, horaentrada, horasalida, estado_parqueo, observaciones, estado_noti) 
            VALUES ('$placa','$fecha','$horaentrada','$horasalida',1,'Reserva rapida, cliente en camino ',0)";

            if ($con->query($sql2) === TRUE) { 
                 echo "Se realizo la reserva rapida correctamente, te esperamos en menos de 30 min.";
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
   

$con->close();
?>
