<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscar parqueo</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css">
    <style>
        .bg-custom {
            background-color: #171b177a;
        }
        .bg-icon-custom{
            background-color: #5cd2c6;
        }
        .color-text-custom{
            color: #5cd2c6;
        }
        .bg-btn-custom{
            background-color: #5cd2c6;
        }
        .bg-btn-custom:hover{
            background-color: #8ecbcf;
        }
    </style>
</head>
<?php
include('conexion.php');
$query1 = "SELECT * FROM parqueo p INNER JOIN cliente c on p.placa = c.placa WHERE estado_parqueo = 1";
$result1 = $con->query($query1);
if ($result1->num_rows > 0) {?>
    <div class="container mt-5 justify-content-center align-items-center">
        <hr style="color:white;">
        <h1 class="text-white">Vehiculos en el parqueo</h1>
        <hr style="color:white;">
        
    </div>
    <div class="container mt-5 justify-content-center align-items-center">
        <?php
    echo '<table class="table table-dark table-bordered" id="tableCont" style="vertical-align: middle;">
                <thead>
                    <tr>
                        <th>Placa</th>
                        <th>Descripcion del vehículo</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Hora de entrada</th>
                        <th>Acciones</th>  
                    </tr>
                </thead>
                <tbody>';
    while ($row = $result1->fetch_assoc()) 
    {
        echo '<tr>
                <td>' . $row['placa'] . '</td>
                <td>' . $row['descripcionvehiculo'] . '</td>
                <td>' . $row['nombres'] . '</td>
                <td>' . $row['apellidos'] . '</td>
                <td>' . $row['horaentrada'] . '</td>
                <td>
                <input type="button" value="Liberar" style="vertical-align: middle";
                    class="btn bg-btn-custom text-white w-10 mt-4 fw-semibold shadow-sm" 
                    onclick="enviarFormulario(\'' . $row['placa'] . '\')"> 
                </td>
              </tr>';
    }
    echo '</tbody>
        </table>';
} else {
    echo "No hay vehiculos en el parqueo";
}
?> 
</div>
<body class="bg-dark">
    <div class="container mt-5 justify-content-center align-items-center">      
        <hr style="color:white;">
        <h2 class="text-white mt-5">Información del parqueo</h2>
        <div id="resultado" class="container mt-3 justify-content-center align-items-center text-white">
            <p>Sin datos, busca un parqueo.</p>
        </div>
        <hr style="color:white;">
    </div>

    <div class="modal fade" id="modalFormulario" tabindex="-1" role="dialog" aria-labelledby="modalFormularioLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body bg-dark" id="modalContenido">
                    <!-- Aquí irá el contenido del formulario -->
                </div>
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        function enviarFormulario(placa) {
        //const placa = $('#placa').val();

        $.ajax({
            type: 'POST',
            url: 'form_parqueo_update.php',
            data: { placa: placa },
            success: function(response) {
                // Coloca el resultado en el contenido del modal
                    $('#modalContenido').html(response);
                    // Muestra el modal
                    $('#modalFormulario').modal('show');
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
        }

        function updateParqueo() {
            const formData = $('#formUpdateParqueo2').serialize();

            $.ajax({
                type: 'POST',
                url: 'update_parqueo.php',
                data: formData,
                success: function(response) {
                    // Manejar la respuesta aquí, por ejemplo, mostrarla en un elemento HTML con id "resultado"
                    $('#resultado').html(response);
                    obtenerYExportarTabla();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        function obtenerYExportarTabla() {
            var form = document.getElementById("modalFormulario");
            
            // Verificar si el formulario existe
            if (!form) {
                console.error('No se encontró el formulario con el ID "formUpdateParqueo2"');
                return;
            }

            var inputs = form.querySelectorAll("input");
            var csv = "CI,Nombres,Apellidos,Celular,Placa,Descripcion,HoraEntrada,HoraSalida,Tiempo,Tipo de reserva,Costo\n"; 

            // Añadir datos
            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                csv += input.value + ",";
            }

            csv = csv.slice(0, -1);
            csv += "\n";

            var blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });
            var link = document.createElement("a");
            
            link.href = URL.createObjectURL(blob);
            link.download = "Papeleta.csv";
            link.style.display = "none";
            
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

    </script>
</body>
</html>