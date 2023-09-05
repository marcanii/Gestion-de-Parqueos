<?php
$idtarifa=$_POST['idtarifa'];

include('conexion.php');

$sql="DELETE FROM tarifa WHERE idtarifa=$idtarifa";
#echo $sql;
if ($con->query($sql) === TRUE) {
    echo '<div class="container w-50 mx-auto custum-container">Se elimino la tarifa correctamente';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>
