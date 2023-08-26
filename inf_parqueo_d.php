<?php
// incluir la conexion
include('conexion.php');
// hacer la consulta
$sql = "SELECT c.nombres, c.apellidos, c.placa, c.telefono, c.descripcionvehiculo, p.fecha, p.horaentrada, p.horasalida
        FROM cliente c INNER JOIN parqueo p ON c.placa = p.placa
        WHERE DATE(p.fecha) = CURDATE(); ";

// ejecutar la consulta
$resultado = $con->query($sql);
// verificar si hay filas
if($resultado->num_rows > 0) { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Informe Parqueos</title>
            <!-- Agrega la referencia a Bootstrap CSS -->
            <link rel="stylesheet" href="css/bootstrap.min.css" />
        </head>
        <body class="bg-dark">
            <div class="container mt-5 justify-content-center align-items-center">
                <hr style="color:white;">
                <h1 class="text-white">Informe de Parqueos</h1>
                <hr style="color:white;">
                <table class="table table-dark table-bordered" id="tableToExport">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Descripcion del vehículo</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Fecha</th>
                            <th>Hora de entrada</th>
                            <th>hora de salida</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = $resultado->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['placa'] ?></td>
                            <td><?php echo $row['descripcionvehiculo'] ?></td>
                            <td><?php echo $row['nombres'] ?></td>
                            <td><?php echo $row['apellidos'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><?php echo $row['horaentrada'] ?></td>
                            <td><?php echo $row['horasalida'] ?></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
                <hr style="color:white;">
                <div class="">
                    <a href="inicio.html" class="btn btn-primary mx-3">Volver</a>
                    <button id="exportButton" class="btn btn-primary">Descargar como Excel</button>
                </div>
                <hr style="color:white;">
            </div>
            <script>
            document.getElementById("exportButton").addEventListener("click", function() {
            // Obtener la tabla
            var table = document.getElementById("tableToExport");
            
            // Crear un objeto HTMLTableElement fuera del DOM para exportarlo
            var tableClone = table.cloneNode(true);

            // Establecer estilos específicos para Excel (opcional)
            // Quitar clases de Bootstrap para bordes y colores
            tableClone.classList.remove("table-bordered");
            tableClone.classList.remove("table-dark");

            // Crear un objeto Blob con el contenido de la tabla
            var blob = new Blob([tableClone.outerHTML], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=utf-8" });

            // Crear un elemento "a" para el enlace de descarga
            var link = document.createElement("a");
            link.href = window.URL.createObjectURL(blob);
            link.download = "Informe_diarios_de_parqueos.xlsx"; // Nombre del archivo Excel
            link.style.display = "none";

            // Agregar el enlace al DOM y simular un clic
            document.body.appendChild(link);
            link.click();

            // Limpiar el elemento "a" y liberar la memoria del objeto Blob
            document.body.removeChild(link);
            window.URL.revokeObjectURL(link.href);
            });
            </script>
        </body>
        </html>
    <?php
} else {
    echo "No hay registros para mostrar :(";
}
?>