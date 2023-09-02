<?php
$idparqueo=$_POST['idparqueo'];

include('conexion.php');

$sql="DELETE FROM parqueo WHERE idparqueo=$idparqueo";
#echo $sql;
if ($con->query($sql) === TRUE) {
    echo "Se elimino la reserva rapida correctamente. Gracias por avisar a tiempo!";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
