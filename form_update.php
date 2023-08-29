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
$idtarifa=$_POST['idtarifa'];
$tipotarifa=$_POST['tipotarifa'];
$sql="SELECT * from tarifa where idtarifa=$idtarifa";
$sql2="SELECT * from tarifa where idtarifa=$idtarifa";
$resultado=$con->query($sql);
$resultado2=$con->query($sql2);
$fila=$resultado->fetch_assoc();
?>
<div class="card">
    <form action="javascript:editar1()" method="POST" id="formEditar1">
        <input type="hidden" name="idtarifa" value="<?php echo $idtarifa; ?> ">
       
        <div>
            <label for="tipotarifa">Tipo tarifa</label>
            <select name="tipotarifa" id="">
                <?php
                while ($fila2 = $resultado2->fetch_assoc()) {
                    $opcion = $fila2['tipotarifa'];
                    ?>
                    <option value="<?php echo $opcion; ?>" <?php if ($opcion == $tipotarifa) echo "selected"; ?>>
                        <?php echo $opcion; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
           
        </div>
        <div>
            <label for="Descripcion">Descripcion :</label>
            <input type="text" name="descripciontarifa" value="<?php echo $fila['descripciontarifa']; ?>" >
        </div>

        <div>
            <label for="valor">Valor tarifa</label>
            <input type="number" name="valor" value="<?php echo $fila['valor']; ?>" >
        </div>


        <input type="submit" value="Actualizar" id="submit">

    </form>
</div>
    
</body>
</html>