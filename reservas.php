<?php
session_start(); // Iniciar
// $espacios_totales=10;
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2>Espacios Disponibles</h2>
            <p class="display-4" id="espaciosLibres">
                <?php
                include("conexion.php");
                // Cantidad de espacios totales solo para fines de ejemplo
                if(isset($_SESSION['$espacios'])){
                    $espacios_totales = $_SESSION['$espacios'];
                }else{
                    $_SESSION['$espacios'] = 25;
                    $espacios_totales = $_SESSION['$espacios'];
                }
                // establecer zona horaria
                date_default_timezone_set('America/La_Paz');

                // Obtener la hora actual
                $horaActual = date("H:i:s");
                $fechaActual = date("Y:m:d");
                
                $consulta1 = "UPDATE parqueo SET estado_parqueo = 0 WHERE '$horaActual' > horasalida AND estado_parqueo = 1 AND '$fechaActual' <= fecha";
                // Ejecutar la consulta
                $con->query($consulta1);
                
                // Obtener la cantidad de espacios ocupados
                $consulta = "SELECT COUNT(*) AS NumOcup FROM parqueo WHERE estado_parqueo = 1";
                $resultado = $con->query($consulta); // Ejecutar la consulta
                if ($resultado->num_rows > 0) { // Si hay resultados
                    while ($fila = $resultado->fetch_assoc()) {
                        $espacios_ocupados = $fila["NumOcup"];
                        $espacios_disponibles = $espacios_totales - $espacios_ocupados;
                        // echo "eSPACIOS DIS: " . $espacios_disponibles;
                        // echo "<br>";
                        // echo "ESPACIOS TOT :" . $espacios_totales;
                        // echo "<br>";
                        // echo "ESPACIOS OCUP :" . $espacios_ocupados;
                        if ($espacios_disponibles <= 0) {
                            echo "No hay espacios disponibles, lo sentimos.";
                        } else {
                            echo $espacios_disponibles;
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
        <div class="card mx-3" style="width: 18rem ;">
            <img src="images/happy.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Planificar mi reserva</h5>
                    <p class="card-text">Reservar un espacio escogiendo fecha y hora de entrada</p>
                    <a class="btn btn-primary" href="javascript:cargarContenido('formreserva0.html')"  id="btnReservar" style="background-color: #41c9c9;">Reservar un espacio</a>
                    <!-- <a class="nav-link text-color-custom" href="javascript:cargarContenido('reservas.php')">Reservas</a> -->
                </div>
        </div>          
    
    
        <div class="card mx-3" style="width: 18rem;">
            <img src="images/impatientdriver.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Estoy corto de tiempo</h5>
                    <p class="card-text">Estoy ahi en 30 minutos o menos.</p>
                    <a href="#" class="btn btn-primary"onclick="reservar2()" id="btnReservar2" style="background-color: #41c9c9;" >Reserva rapida</a>
                </div>
        </div>
    </div>

        <!-- <div class="col-md-6 text-center">
            <div ><label for="" class=" h1">Reservar un espacio escogiendo fecha y hora de entrada</label></div>
            
            <button class="btn btn-primary btn-lg" onclick="cargarContenido('formreserva.html')" id="btnReservar">Reservar un Espacioooo </button>
        </div> -->

        <!-- <div class="col-md-6 text-center">
            <div><label for="" class=" h1">Estoy ahi en 30 minutos o menos</label></div>
            
            <button class="btn btn-primary btn-lg" onclick="reservar2()" id="btnReservar2">Reserva rapida</button>
        </div> -->

    <!-- </div> -->
</div>  
