<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Economicos Mensuales</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .custom-width-15 {
            width: 15%;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5 justify-content-center align-items-center">
        <hr style="color:white;">
        <h1 class="text-white">Informe Económicos Mensuales</h1>
        <hr style="color:white;">

        <div class="form-group">
            <label for="mes" class="text-white">Seleccionar Mes:</label>
            <div class="d-flex align-items-center">
                <?php
                    // Obtiene el mes actual en el formato correcto para el input
                    date_default_timezone_set('America/La_Paz');
                    $mesActual = date("m");
                    //echo "<script>console.log($mesActual);</script>"
                ?>
                <select name="mes" id="mes" class="form-control btn-light custom-width-15">
                    <option value="1" <?php if ($mesActual == 1) echo 'selected'; ?>>Enero</option>
                    <option value="2" <?php if ($mesActual == 2) echo 'selected'; ?>>Febrero</option>
                    <option value="3" <?php if ($mesActual == 3) echo 'selected'; ?>>Marzo</option>
                    <option value="4" <?php if ($mesActual == 4) echo 'selected'; ?>>Abril</option>
                    <option value="5" <?php if ($mesActual == 5) echo 'selected'; ?>>Mayo</option>
                    <option value="6" <?php if ($mesActual == 6) echo 'selected'; ?>>Junio</option>
                    <option value="7" <?php if ($mesActual == 7) echo 'selected'; ?>>Julio</option>
                    <option value="8" <?php if ($mesActual == 8) echo 'selected'; ?>>Agosto</option>
                    <option value="9" <?php if ($mesActual == 9) echo 'selected'; ?>>Septiembre</option>
                    <option value="10" <?php if ($mesActual == 10) echo 'selected'; ?>>Octubre</option>
                    <option value="11" <?php if ($mesActual == 11) echo 'selected'; ?>>Noviembre</option>
                    <option value="12" <?php if ($mesActual == 12) echo 'selected'; ?>>Diciembre</option>
                </select>
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
            <canvas id="grafica"></canvas>
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
            cargarRegistrosPorMes();
        };

        // Función para cargar los registros por fecha seleccionada
        function cargarRegistrosPorMes() {
            obtenerDatos();
            var mesSeleccionado = document.getElementById("mes").value;
            //console.log(mesSeleccionado);

            // Realiza una solicitud AJAX para obtener los registros de la fecha seleccionada
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "obt_inf_eco_mensual.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Actualiza la tabla con los nuevos datos
                    document.getElementById("tableToExport").innerHTML = xhr.responseText;
                }
            };
            xhr.send("mes=" + mesSeleccionado);
        }

        // Agrega un evento para actualizar los registros cuando se cambie la fecha
        document.getElementById("mes").addEventListener("change", cargarRegistrosPorMes);

        // funcion que pasa por ajax la fecha seleccionada y devuelve un array con los datos
        function obtenerDatos() {
            var mesSeleccionado = document.getElementById("mes").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "cant_autos_mensual.php?mes=" + mesSeleccionado, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var dataJSON = xhr.responseText;
                    var datos = JSON.parse(dataJSON); // Convierte el JSON en un objeto JavaScript
                    //console.log(datos); // Accede a los datos como un objeto JavaScript
                    graficar(datos);
                }
            };

            xhr.send();
        }
        var miGrafico = null;
        // funcion para graficar el array de datos
        function graficar(datos){
            // graficar los datos de la tabla
            const canvas = document.getElementById('grafica');
            // Verifica si ya existe un gráfico en el canvas y destrúyelo si es necesario
            // Verifica si ya existe un gráfico y destrúyelo si es necesario
            if (miGrafico !== null) {
                miGrafico.destroy();
            }
            miGrafico_auto = new Chart(canvas, {
                type: 'line',
                data: {
                    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11,12,13,
                    14,15,16,17,18,19,20,21,22,23,24,25,26,27,
                    28,29,30], // Array con los días del mes (del 1 al 30
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
