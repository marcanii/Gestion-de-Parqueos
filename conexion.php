<?php
$con =new mysqli("localhost", "root", "","bd_parqueo3");
if ($con->connect_error)
 die ("conexion fallada".$con->connect_error);
?>