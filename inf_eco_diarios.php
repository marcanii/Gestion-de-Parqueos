<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Economicos Diarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .custom-width-10 {
            width: 15%;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5 justify-content-center align-items-center">
        <hr style="color:white;">
        <h1 class="text-white">Informe Económicos Diarios</h1>
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
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los registros de la base de datos -->
            </tbody>
        </table>
        <hr style="color:white;">
        <h1 class="text-white">Gráfica</h1>
        <div>
            <canvas id="grafica-auto"></canvas>
        </div>
        <hr style="color:white;">
        <div class="">
            <a href="inicio.php" class="btn bg-btn-custom mx-3">Volver</a>
        </div>
        <hr style="color:white;">
    </div>
    <script>
        // Función para cargar automáticamente los registros al cargar la página
        window.onload = function () {
            cargarRegistrosPorFecha();
            //obtenerDatos();
        };

        // Función para cargar los registros por fecha seleccionada
        function cargarRegistrosPorFecha() {
            obtenerDatos();
            var fechaSeleccionada = document.getElementById("fechaSeleccionada").value;

            // Realiza una solicitud AJAX para obtener los registros de la fecha seleccionada
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "obt_inf_eco_diario.php", true);
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

        // funcion que pasa por ajax la fecha seleccionada y devuelve un array con los datos
        function obtenerDatos() {
            var fechaSeleccionada = document.getElementById("fechaSeleccionada").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "cant_autos.php?fecha=" + fechaSeleccionada, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var dataJSON = xhr.responseText;
                    var datos = JSON.parse(dataJSON); // Convierte el JSON en un objeto JavaScript
                    //console.log(datos); // Accede a los datos como un objeto JavaScript
                    graficar_auto(datos);
                }
            };

            xhr.send();
        }
        var miGrafico_auto = null;
        // funcion para graficar el array de datos
        function graficar_auto(datos){
            // graficar los datos de la tabla
            const canvas = document.getElementById('grafica-auto');

            // Verifica si ya existe un gráfico en el canvas y destrúyelo si es necesario
            if (miGrafico_auto !== null) {
                miGrafico_auto.destroy();
            }

            miGrafico_auto = new Chart(canvas, {
                type: 'line',
                data: {
                    labels: ['07:00', '08:00', '09:00', '10:00', '11:00', '12:00',
                            '13:00', '14:00', '15:00', '16:00', '17:00', '18:00',
                            '19:00', '20:00', '21:00'],
                    datasets: [{
                        label: 'Cantidad de autos',
                        data: datos.autos, // Array con la cantidad de autos
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)', // Color de la línea
                        borderWidth: 2, // Ancho de la línea
                        lineTension: 0.3, // Controla la curvatura de las líneas
                        fill: {
                            target: 'origin', // Relleno desde el eje y hacia abajo
                            above: 'rgba(255, 99, 132, 0.2)', // Color del fondo
                        },
                    },
                    {
                        label: 'Dinero ingresante',
                        data: datos.costo, // Array con el dinero ingresante
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)', // Color de la línea
                        borderWidth: 2, // Ancho de la línea
                        lineTension: 0.3, // Controla la curvatura de las líneas
                        fill: {
                            target: 'origin', // Relleno desde el eje y hacia abajo
                            above: 'rgba(54, 162, 235, 0.2)', // Color del fondo
                        },
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true, // Mostrar leyenda
                            position: 'top', // Posición de la leyenda
                        },
                    },
                }
            });
        }    
    </script>
</body>
</html>
