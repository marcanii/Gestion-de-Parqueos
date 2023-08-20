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

// $sql = "SELECT placa, ci, nombres FROM cliente WHERE ci ='$ci' and placa='$placa'";
// $resultado = $con->query($sql);

// if($resultado->num_rows > 0) {
//     $unicafila = $resultado->fetch_assoc();
//     $ci = $unicafila['ci'];
//     $placa = $unicafila['placa'];
// }

$sql2 = "INSERT INTO reserva (horainiciores, fechareserva, horafinalres, id_cliente, estado_reserva) 
VALUES ('$horainiciores','$fechareserva','$horafinalres','$ci',1)";

if ($con->query($sql2) === TRUE) { // Aquí corregí $sql a $sql2
    echo "Se añadió el registro correctamente";
} else {
    echo "Error: " . $sql2 . "<br>" . $con->error; // Aquí corregí $sql a $sql2
}

$con->close();
?>
