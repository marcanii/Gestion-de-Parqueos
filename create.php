<?php
// include('verificar.php');#acceso solo para usuarios logueados
// include('permiso.php'); #acceso solo para usuarios de cierto nivel

$tipotarifa=$_POST['tipotarifa'];
$descripciontarifa=$_POST['descripciontarifa'];
$valor=$_POST['valor'];
include('conexion.php');

$sql="INSERT into tarifa (tipotarifa,descripciontarifa,valor) VALUES ('$tipotarifa','$descripciontarifa',$valor)";

//echo $sql;

if ($con->query($sql) === TRUE)#solo true si la ocnsulta se ejcuta sin errores
{
    echo '<div class="container w-50 mx-auto custum-container">Se creo la tarifa correctamente';
} 
else 
{
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>

