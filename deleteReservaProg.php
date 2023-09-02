<?php
$id_reserva=$_POST['id_reserva'];

include('conexion.php');

$sql="DELETE FROM reserva WHERE id_reserva=$id_reserva";
#echo $sql;
if ($con->query($sql) === TRUE) {
    echo "Se elimino la reserva programada correctamente. Gracias por avisar a tiempo!";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
