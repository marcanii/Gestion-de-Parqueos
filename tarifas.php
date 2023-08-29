<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
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

        .btn {
            margin-top: 10px;
            background-color: #41c9c9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        table {
        width: auto;
        border-collapse: collapse;
        background-color: #232329; 
        

    }

    table, th, td {
        border: 1px solid #ccc;
        padding: 10px; 
    }

    th {
        background-color: #41c9c9; 
        color: white; 
    }

    </style>
</head>
<body>
    <div class="card">
        <h2>Tarifas</h2>
        <?php
                include("conexion.php");
                session_start(); 
                $consulta1 = "SELECT * FROM TARIFA";
                $con->query($consulta1);
                if(!isset($_SESSION['nivel'])){
                    $_SESSION['nivel']=0;
                }
                $resultado = $con->query($consulta1); 
                if ($resultado->num_rows > 0) {
                    ?>
                    
                    <table>
                    <tr>
                        <th>Id Tarifa</th>
                        <th>Tipo tarifa</th>
                        <th>Descripcion</thtd>
                        <th>Precio</th>
                        <?php
                        if($_SESSION['nivel'] == 1)
                        {
                        ?>
                        <th>Acciones</th>
                        <th>Acciones</th>
                        <?php   


                        }
                        ?>
                    </tr>
                    <?php
                    while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $fila["idtarifa"]; ?></td>
                        <td><?php echo $fila["tipotarifa"]; ?></td>
                        <td><?php echo $fila["descripciontarifa"]; ?></td>
                        <td><?php echo $fila["valor"]; ?></td>
                        <?php
                        if($_SESSION['nivel'] == 1)
                        {
                        ?>
                        <td><a href="javascript:void(0)" onclick="editartarifa('<?php echo $fila['idtarifa']; ?>', '<?php echo $fila['tipotarifa']; ?>')">Editar</a></td>
                        <td><a href="javascript:void(0)" onclick="eliminartarifa('<?php echo $fila['idtarifa']; ?>')">Eliminar</a></td>
                        
                        
                    <?php
                        }
                    }

                    ?>
                    </table>
                    <?php
                } else { // Si no hay resultados
                    echo "0 results";
                }
                if($_SESSION['nivel']==1)
                {
                    ?>
                    
                    <a href="#" class="btn btn-primary" onclick="cargarContenido('form_create.php')" id="btntarifa" style="background-color: #41c9c9; width: 150px; " >Crear tarifa</a>
                    <?php
                }
                $con->close();
                ?>
    </div>
</body>
</html>


