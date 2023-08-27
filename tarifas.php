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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: #232329;
            color: white;
            
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
        }

        input[type="date"],
        input[type="time"] {
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        color: white; 

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
                session_start(); // Iniciar
                $consulta1 = "SELECT * FROM TARIFA";
                // Ejecutar la consulta
                $con->query($consulta1);
                
                $resultado = $con->query($consulta1); // Ejecutar la consulta
                if ($resultado->num_rows > 0) { // Si hay resultados
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
                    
                    <a href="#" class="btn btn-primary" onclick="cargarContenido('form_create.php')" id="btnReservar2" style="background-color: #41c9c9; width: 150px; " >Crear tarifa</a>
                    <?php
                }
                $con->close();
                ?>
    </div>
</body>
</html>


