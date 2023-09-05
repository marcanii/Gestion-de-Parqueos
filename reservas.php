<?php
session_start(); // Iniciar
// $espacios_totales=10;
?>
<div class="container mt-4 custum-container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 style= "margin-bottom:50px; color: #5cd2c6">Nuestro parqueo en tiempo real:</h2>
            <p class="display-4" id="espaciosLibres">
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
                                        if ($cont3 == 2) {
                                        ?>
                                            <td style="width: 80px"></td>
                                        <?php
                                            $cont3 = 0;
                                        }
                                        ?>

                                <?php
                                    } else {
                                        $aleatorio = random_int(1, 3);
                                ?>
                                        <td style="width: 80px; height: 60px; background-image: url(images/coche<?php echo $aleatorio ?>.jpg);background-size: 100% 100%; border-radius: 15% / 40%;">&nbsp</td>
                                <?php
                                    }

                                    if ($cont == 8) {
                                        $cont = 0;
                                        $contf += 1;
                                ?>
                                        </tr>
                                    <?php
                                    if ($contf == 2) {
                                    ?>
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
                                        }
                                ?>
                            </tr>
                        </table>
                                                    
                            
                            
                        <?php
                        if ($espacios_disponibles <= 0) {
                            echo "No hay espacios disponibles, lo sentimos.";
                        } else {
                            ?>
                            <h2 style="margin-top: 50px ;color: white; font-weight: bold"; ><?php  echo "Hay " . $espacios_disponibles . " espacios disponibles    estimado cliente.";
                            if ($espacios_disponibles>0){
                                ?>
                                <h2 style ="color: #5cd2c6; margin-top :20px">¿Deseas realizar una reserva?</h1>
                                <?php
                            }?></h2>
                           <?php
                        }
                    }
                } else { // Si no hay resultados
                    echo "0 results";
                }
                ?>
            </p>
        </div>
    </div>

    <div class="row justify-content-center mt-4"> 

        <div class="card mx-3 bg-dark text-white" style="width: 18rem ;">
            <img src="images/happy.jpg" class="card-img-top mt-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="color: red">Reserva programada</h5>
                    <p class="card-text">Reservar un espacio escogiendo fecha y hora </p>
                    <?php
                    if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['ci'])) { ?>
                    <a class="btn btn-primary" href="javascript:cargarContenido('formreserva0.html')"  id="btnReservar" style="background-color: #41c9c9;">Reservar un espacio</a>
                    <?php } else { ?>
                    <a class="btn btn-primary" href="login.php"  id="btnReservar" style="background-color: #41c9c9;">Iniciar Sesion</a>
                    <?php } ?>
                </div>
        </div>          
    
    
        <div class="card mx-3 bg-dark text-white" style="width: 18rem;">
            <img src="images/impatientdriver.jpg" class="card-img-top mt-3" alt="...">
                <div class="card-body ">
                    <h5 class="card-title" style="color: red">Reserva rapida</h5>
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
    <?php
    $mostrar = 0;
    ?>
    
    <div class="row justify-content-center mt-5"> 
        
        <?php
        $consulta2 = "SELECT * FROM parqueo WHERE placa = '$placa' and estado_parqueo = 1";
        $resultado2 = $con->query($consulta2);
        if ($resultado2->num_rows > 0) {
            while ($fila2 = $resultado2->fetch_assoc()) {
                $mostrar = 1;
        ?>
        
        <h2 style="color: #5cd2c6"> Tus reservas vigentes: </h2>
            <div class="card mx-3 mt-4 bg-dark text-white" style="width: 18rem;">
                <img src="images/modify.jpg" class="card-img-top mt-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title" style="color: red">Cancelar reserva rapida</h5>
                    <p class="card-text">Quiero cancelar mi reserva rapida</p>
                    <a class="btn btn-primary" onclick="eliminarReserva('<?php echo $fila2['idparqueo']; ?>')" style="background-color: #41c9c9;">Eliminar reserva rapida</a>
                </div>
            </div>
        <?php
            }
        }
        ?>

    <?php
    $consulta3 = "SELECT * FROM reserva WHERE id_cliente= '$ci' and estado_reserva = 1";
    $resultado3 = $con->query($consulta3);
    if ($resultado3->num_rows > 0) {
        while ($fila3 = $resultado3->fetch_assoc()) {
            if($mostrar !=1){
                ?>
                <h2> Tus reservas vigentes: </h2>
                <?php
            }
         ?>
        <div class="card mx-3 mt-4 bg-dark text-white" style="width: 18rem;">
            <img src="images/modify.jpg" class="card-img-top mt-3" alt="..." id="one">
            <div class="card-body">
                <h5 class="card-title" style="color: red">Editar reserva programada</h5>
                <p class="card-text" >Quiero cancelar/modificar mi reserva programada</p>
                <a class="btn btn-primary" onclick="eliminarReservaProgramada('<?php echo $fila3['id_reserva']; ?>')" style="background-color: #41c9c9; ">Eliminar reserva programada</a>
                <a class="btn btn-primary" onclick="editarReservaProgramada('<?php echo $fila3['id_reserva']; ?>')" style="background-color: #41c9c9; margin-top: 15px">Modificar reserva programada</a>
            </div>
        </div>
    <?php
        }
    }
    $con->close();
    ?>

</div>
</div>  
