<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            width: auto;
            max-width: 700px;
            height: auto;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
            background-color: #232329;
            color: white;
            
        }

        #submit{
            margin-top: 10px;
            background-color: #41c9c9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
</head>
<body>
<?php 

include('conexion.php');
$id_reserva=$_POST['id_reserva'];

$sql="SELECT * from reserva where id_reserva=$id_reserva";
#$sql2="SELECT * from tarifa where idtarifa=$idtarifa";
$resultado=$con->query($sql);
// $resultado2=$con->query($sql2);
$fila=$resultado->fetch_assoc();


?>
<div class="card">
    <form action="javascript:editarReservaProg3()" method="POST" id="formEditar3">
        <input type="hidden" name="id_reserva" value="<?php echo $id_reserva; ?> ">
       
        <div>
            <label for="fechareserva">Fecha de reserva</label>
            <input type="date" name="fechareserva" id="fechareserva" value = <?php echo $fila['fechareserva']?>>
           
        </div>
        <div>
            <label for="horainiciores">Hora inicio reserva</label>
            <input type="time" name="horainiciores" id="horainiciores" value = <?php echo $fila['horainiciores']?>>
           
        </div>

        <div>
            <label for="horafinalres">Hora final reserva</label>
            <input type="time" name="horafinalres" id="horafinalres" value = <?php echo $fila['horafinalres']?>>
           
        </div>

        <input type="submit" value="Actualizar" id="submit">

    </form>
</div>
    
</body>
</html>

          