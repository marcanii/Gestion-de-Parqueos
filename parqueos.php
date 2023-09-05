<?php
session_start(); // Iniciar
// $espacios_totales=10;
?>
<div class="container mt-1 custum-container">
    <div class="row justify-content-center p-5">
        <h2 style= "margin-bottom:50px; color: #5cd2c6">Nuestro parqueo en tiempo real:</h2>
            <?php
                include("conexion.php");
                if(isset($_SESSION['$espacios2'])){
                    $espacios_totales = $_SESSION['$espacios2'];
                }else{
                    $_SESSION['$espacios2'] = 31;
                    $espacios_totales = $_SESSION['$espacios2'];
                }
                if(isset($_SESSION['nivel']))
                    if($_SESSION['nivel']==1){
                        $placa = "administrador";
                    }
                    else if(isset($_SESSION['placa'])){
                        $placa =$_SESSION['placa'];
                    }
                if(isset($_SESSION['ci'])){
                    $ci = $_SESSION['ci'];
                }else{
                    $ci = "visitante";
                }
                        
                

                // establecer zona horaria
                date_default_timezone_set('America/La_Paz');

                // Obtener la hora actual
                $horaActual = date("H:i:s");
                $fechaActual = date("Y:m:d");
                
                $consulta1 = "UPDATE parqueo SET estado_parqueo = 0 WHERE '$horaActual' > horasalida AND estado_parqueo = 1 AND '$fechaActual' >= fecha";
                $consulta01= "UPDATE reserva SET estado_reserva = 0 WHERE '$horaActual' > horafinalres AND estado_reserva = 1 AND '$fechaActual' >= fechareserva";
                $consulta02= "UPDATE reserva SET estado_reserva = 0 WHERE '$fechaActual' > fechareserva";
                $con->query($consulta1);
                $con->query($consulta01);
                $con->query($consulta02);
                // Obtener la cantidad de espacios ocupados
                $consulta = "SELECT COUNT(*) AS NumOcup FROM parqueo WHERE estado_parqueo = 1";
                $resultado = $con->query($consulta); // Ejecutar la consulta
                if ($resultado->num_rows > 0) { // Si hay resultados
                    while ($fila = $resultado->fetch_assoc()) {
                        $espacios_ocupados = $fila["NumOcup"];
                        $espacios_disponibles = $espacios_totales - $espacios_ocupados;
                        ?>
                        <table style="margin-left: auto; margin-right: auto">
                            <tr>
                            <?php
                            $cont=0;
                            $cont2=0;
                            $cont3=0;
                            $contf=0;
                            
                            for ($i = 0; $i <= $espacios_totales; $i++) {
                                $cont += 1;
                                if ($cont2 <= $espacios_disponibles) {
                                    $cont2 += 1;
                                    $cont3 += 1;
                                    ?>
                                    <td style="width: 120px; height: 60px; margin: 30px; background-color: darkgray; color: yellow; border-radius: 5% / 50%; font-weight: bold">E<?php echo $cont2 ?></td>
                                    <?php
                                    if ($cont3 == 2) { ?>
                                        <td style="width: 80px"></td>
                                        <?php $cont3 = 0;
                                    }
                                } else {
                                    $aleatorio = random_int(1, 3); ?>
                                    <td style="width: 80px; height: 60px; background-image: url(images/coche<?php echo $aleatorio ?>.jpg);background-size: 100% 100%; border-radius: 15% / 40%;">&nbsp</td>
                                    <?php
                                }
                                if ($cont == 8) {
                                    $cont = 0;
                                    $contf += 1; ?>
                                    </tr>
                                    <?php
                                    if ($contf == 2) { ?>
                                        <tr>
                                            <td colspan="10">&nbsp</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                    <tr></tr>
                                    <?php
                                }
                            } ?>
                            </tr>
                        </table>
                        <?php
                        if ($espacios_disponibles <= 0) {
                            echo "No hay espacios disponibles, lo sentimos.";
                        } else {
                            ?>
                            <h2 style="margin-top: 50px ;color: white; font-weight: bold"; ><?php  echo "Hay " . $espacios_disponibles + 1 . " espacios disponibles"; ?></h2>
                        <?php
                        }
                    }
                } else { // Si no hay resultados
                    echo "0 results";
                }
                ?>
        <br>
        <div class="col-md-4">
            <div class="card bg-dark text-white p-4">
                <div class="card-header">
                    <h3>Registrar Cliente</h3>
                </div>
                <img src="images/registrar-cliente.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <!-- Contenido del informe 1 -->
                    <p class="text-custom">Registrar un cliente que nunca fue registrado en el sistema para que pueda reservar un parqueo.
                        Ademas de registrar el cliente, se registra el parqueo.
                    </p>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <a class="btn bg-btn-custom text-white" href="form_parqueo.html">Registrar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white p-4">
                <div class="card-header">
                    <h3>Parqueos</h3>
                </div>
                <img src="images/registrar-parqueo.avif" class="card-img-top" alt="...">
                <div class="card-body">
                    <!-- Contenido del informe 2 -->
                    <p class="text-custom">Muestra los parqueos que estan disponibles y los que estan ocupados. Muestra el estado del parqueo, si esta ocupado o disponible.
                    </p>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <a class="btn bg-btn-custom text-white">Ver parqueos</a>
                    </div>
                </div> 
            </div>  
        </div>
    </div>
</div>