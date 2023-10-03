<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Reservas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css">
    <style>
        .custom-width-10 {
            width: 15%;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5 justify-content-center align-items-center">
        <hr style="color:white;">
        <h1 class="text-white">Reservas programadas</h1>
        <hr style="color:white;">

        <div class="form-group">
            <label for="fechaSeleccionada" class="text-white">Seleccionar Fecha:</label>
            <?php
            // Obtiene la fecha actual en el formato correcto para el input
            date_default_timezone_set('America/La_Paz');
            $fechaActual = date("Y-m-d");
            ?>
            <div class="d-flex align-items-center">
                <input type="date" class="form-control custom-width-10" id="fechaSeleccionada" name="fechaSeleccionada" value="<?php echo $fechaActual; ?>">
            </div>
        </div>

        <hr style="color:white;">
        <table class="table table-dark table-bordered" id="tableToExport">
        </table>
        <hr style="color:white;">
        <div class="">
            <a href="inicio.php" class="btn bg-btn-custom mx-3">Volver</a>
            <button id="exportButton" class="btn bg-btn-custom">Descargar como Excel</button>
        </div>
        <hr style="color:white;">
    </div>
    <script>
        // Función para cargar automáticamente los registros al cargar la página
        window.onload = function () {
            cargarRegistrosPorFecha();
        };

        // Función para cargar los registros por fecha seleccionada
        function cargarRegistrosPorFecha() {
            var fechaSeleccionada = document.getElementById("fechaSeleccionada").value;

            // Realiza una solicitud AJAX para obtener los registros de la fecha seleccionada
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "obt_inf_reservas.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Actualiza la tabla con los nuevos datos
                    document.getElementById("tableToExport").innerHTML = xhr.responseText;
                }
            };
            xhr.send("fechaSeleccionada=" + fechaSeleccionada);
        }

        // Agrega un evento para actualizar los registros cuando se cambie la fecha
        document.getElementById("fechaSeleccionada").addEventListener("change", cargarRegistrosPorFecha);

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
            link.download = "Informe_diario_reservas.xlsx"; // Nombre del archivo Excel
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
