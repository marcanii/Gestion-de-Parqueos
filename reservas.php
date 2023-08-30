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
                
                $con->query($consulta1);
                
                // Obtener la cantidad de espacios ocupados
                $consulta = "SELECT COUNT(*) AS NumOcup FROM parqueo WHERE estado_parqueo = 1";
                $resultado = $con->query($consulta); // Ejecutar la consulta
                if ($resultado->num_rows > 0) { // Si hay resultados
                    while ($fila = $resultado->fetch_assoc()) {
                        $espacios_ocupados = $fila["NumOcup"];
                        $espacios_disponibles = $espacios_totales - $espacios_ocupados;
                   
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
                    <?php
                    if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['ci'])) { ?>
                    <a class="btn btn-primary" href="javascript:cargarContenido('formreserva0.html')"  id="btnReservar" style="background-color: #41c9c9;">Reservar un espacio</a>
                    <?php } else { ?>
                    <a class="btn btn-primary" href="login.php"  id="btnReservar" style="background-color: #41c9c9;">Iniciar Sesion</a>
                    <?php } ?>
                </div>
        </div>          
    
    
        <div class="card mx-3" style="width: 18rem;">
            <img src="images/impatientdriver.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Estoy corto de tiempo</h5>
                    <p class="card-text">Estoy ahi en 30 minutos o menos.</p>
                    <?php
                    if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['ci'])) { ?>
                    <a class="btn btn-primary" onclick="reservar2()" id="btnReservar2" style="background-color: #41c9c9;" >Reserva rapida</a>
                    <?php } else { ?>
                    <a class="btn btn-primary" href="login.php"  id="btnReservar" style="background-color: #41c9c9;">Iniciar Sesion</a>
                    <?php } ?>
                </div>
        </div>
    </div>

    
</div>  
