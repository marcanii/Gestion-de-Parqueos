<?php
session_start(); // Iniciar

?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2>Espacios Disponibles</h2>
            <p class="display-4" id="espaciosLibres">
                <?php
                include("conexion.php");
                // Cantidad de espacios totales solo para fines de ejemplo
                $espacios_totales = 12;

                // establecer zona horaria
                date_default_timezone_set('America/La_Paz');

                // Obtener la hora actual
                $horaActual = date("H:i:s");
                $fechaActual = date("Y:m:d");
                // echo "Hora actual: " . $horaActual . "<br>";
                // echo "Fecha actual: " . $fechaActual . "<br>";
                // Actualizar registros donde la hora de salida sea menor o igual a la hora actual
                $consulta1 = "UPDATE parqueo SET estado_parqueo = 0 WHERE '$horaActual' > horasalida AND estado_parqueo = 1 AND '$fechaActual' <= fecha";
                // Ejecutar la consulta
                $con->query($consulta1);
                
                // Obtener la cantidad de espacios ocupados
                $consulta = "SELECT COUNT(*) AS NumOcup FROM parqueo WHERE estado_parqueo = 1";
                $resultado = $con->query($consulta); // Ejecutar la consulta
                if ($resultado->num_rows > 0) { // Si hay resultados
                    while ($fila = $resultado->fetch_assoc()) {
                        if ($espacios_totales - $fila["NumOcup"] <= 0) {
                            echo "No hay espacios disponibles, lo sentimos.";
                        } else {
                            echo "Espacios disponibless: " . ($espacios_totales - $fila["NumOcup"]);
                        }
                    }
                } else { // Si no hay resultados
                    echo "0 results";
                }
                $con->close();
                ?>
            </p>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6 text-center">
            <div ><label for="" class=" h1">Reservar un espacio escogiendo fecha y hora de entrada</label></div>
            
            <button class="btn btn-primary btn-lg" onclick="cargarContenido('formreserva.html')" id="btnReservar">Reservar un Espacio </button>
        </div>
        <div class="col-md-6 text-center">
            <div><label for="" class=" h1">Estoy ahi en 30 minutos o menos</label></div>
            
            <button class="btn btn-primary btn-lg" onclick="reservar2()" id="btnReservar2">Reserva rapida</button>
        </div>
    </div>
</div>  

