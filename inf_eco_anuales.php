<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Economicos Anuales</title>
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
        <h1 class="text-white">Informe Económicos Anuales</h1>
        <hr style="color:white;">

        <div class="form-group">
            <label for="anio" class="text-white">Seleccionar Año:</label>
            <div class="d-flex align-items-center">
                <?php
                    // Obtiene el año actual en el formato correcto para el input
                    date_default_timezone_set('America/La_Paz');
                    $year = date("Y");
                    //echo "<script>console.log($year);</script>"
                ?>
                <select name="anio" id="anio" class="form-control btn-light custom-width-15">
                    <?php
                    for ($i = $year-5; $i <= $year; $i++) {
                        echo "<option value='$i' ";
                        if ($year == $i) echo 'selected';
                        echo ">$i</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <hr style="color:white;">
        <table class="table table-dark table-bordered" id="tableToExport">
            <thead>
                <tr>
                    <th>Mes</th>
                    <th>Descripcion</th>
                    <th>Cantidad de autos</th>
                    <th>Dinero Total</th>
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
            cargarRegistrosPorAnio();
        };

        // Función para cargar los registros por fecha seleccionada
        function cargarRegistrosPorAnio() {
            obtenerDatos();
            var anioSeleccionado = document.getElementById("anio").value;

            // Realiza una solicitud AJAX para obtener los registros de la fecha seleccionada
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "obt_inf_eco_anual.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Actualiza la tabla con los nuevos datos
                    document.getElementById("tableToExport").innerHTML = xhr.responseText;
                }
            };
            xhr.send("anio=" + anioSeleccionado);
        }

        // Agrega un evento para actualizar los registros cuando se cambie la fecha
        document.getElementById("anio").addEventListener("change", cargarRegistrosPorAnio);

        // funcion que pasa por ajax la fecha seleccionada y devuelve un array con los datos
        function obtenerDatos() {
            var anioSeleccionado = document.getElementById("anio").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "cant_autos_anual.php?anio=" + anioSeleccionado, true);

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
            //console.log(datos);
            // graficar los datos de la tabla
            const canvas = document.getElementById('grafica');
            // Verifica si ya existe un gráfico en el canvas y destrúyelo si es necesario
            // Verifica si ya existe un gráfico y destrúyelo si es necesario
            if (miGrafico !== null) {
                miGrafico.destroy();
            }
            miGrafico = new Chart(canvas, {
            type: 'line',
            data: {
                // 12 meses
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Cantidad de autos',
                    data: datos.autos,
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
                    label: 'Dinero total',
                    data: datos.costo,
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
