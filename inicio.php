<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mi Sitio Web</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style2.css" />
    <style>
        .bg-btn-custom{
            background-color: #5cd2c6;
        }
        .bg-btn-custom:hover{
            background-color: #8ecbcf;
        }
        .bg-black-transparent {
            background-color: rgba(43, 43, 43, 0.281);
            /* Negro con una opacidad del 50% */
            margin: 0 auto;
        }
        #contenido {
            height: auto;
            padding: 50px;
        }
        .text-custom {
            font-size: 18px;
        }
        .custum-container{
            background-color: rgba(30, 32, 36, 0.75);
            border-radius: 20px;
            padding: 20px;
        }
    </style>
</head>

<body id="all">
    <div class="position-absolute w-50" style="opacity: 0.1; left: 5%">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="#363753"
                d="M32.5,-57.5C40.2,-51.9,43.2,-39.3,50.7,-28.5C58.3,-17.8,70.4,-8.9,76.5,3.5C82.7,16,82.8,32,74.6,41.5C66.3,51,49.6,54,35.8,58.8C21.9,63.5,11,70.1,-1.1,71.9C-13.1,73.7,-26.2,70.9,-40.6,66.4C-55,62,-70.8,56,-76,44.7C-81.3,33.3,-75.9,16.7,-69.4,3.8C-62.8,-9.1,-55,-18.2,-49.3,-28.7C-43.7,-39.3,-40.1,-51.4,-32.3,-56.9C-24.4,-62.5,-12.2,-61.6,0.1,-61.7C12.4,-61.9,24.8,-63.2,32.5,-57.5Z"
                transform="translate(100 100)" />
        </svg>
    </div>

    <nav class="navbar navbar-expand-lg border-body">
        <div class="container">
            <a class="navbar-brand text-white text-title" href="inicio.php">
                <img src="images/carlogo1.png" alt="Logo" width="45" height="45"
                    class="d-inline-block align-text-top" />
                El auto dormido
            </a>
        </div>
        <div class="container-fluid">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li>
                        <a class="nav-link text-color-custom" href="javascript:cargarContenido('presentacion.html')">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-color-custom" href="javascript:cargarContenido('reservas.php')">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-color-custom" href="javascript:cargarContenido('tarifas.php')">Tarifas</a>
                    </li>
                    <?php
                    if($_SESSION['nivel'] == 1) { ?>
                    <li class="nav-item">
                        <a class="nav-link text-color-custom" href="javascript:cargarContenido('informes.html')">Informes</a>
                    </li>
                    <?php } ?>
                    <?php
                    if (!(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['ci']))) { ?>
                    <li class="nav-item">
                        <a class="btn bg-btn-custom text-white" href="login.php" style="width: 150px;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn bg-btn-custom text-white" href="#" style="width: 150px; margin-left:10px;">Sign up</a>
                    </li>
                    <?php }
                    if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['ci'])) { ?>
                    <li class="nav-item">
                        <a class="btn bg-btn-custom text-white" href="cerrar_sesion.php">Cerrar Sesión</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="p-5 text-center mb-5 text-white justify-content-center align-items-center main-custom" id="contenido">
        <div class="container w-50 mx-auto custum-container">
            <h1 class="mb-3">Bienvenido al parqueo "El Auto dormido"</h1>
            <p style="width: 500px; margin: 0 auto">
                Aquí ofrecemos los mejores servicios de estacionamiento en la ciudad.
                Con una amplia variedad de opciones, nuestros clientes siempre
                encuentran el mejor lugar para sus vehículos. Reserva tu espacio ahora y
                disfruta de la comodidad de estar cerca de tus destinos favoritos.
            </p>
        </div>
    </div>

    <div class="container">
        <h3>Notificaciones</h3>
        <hr />
        <p id="notificacion">No hay notificaciones</p>
    </div>

    <!-- Footer con información de contacto -->
    <footer class="text-center text-lg-start bg-dark text-white">
        <section class="d-flex justify-content-center p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Conectate con nosotros en las redes sociales:</span>
            </div>
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-github"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-envelope-at"></i>
                </a>
            </div>
        </section>

        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>El Auto Dormido
                        </h6>
                        <p>
                            Aquí ofrecemos los mejores servicios de estacionamiento en la
                            ciudad. Con una amplia variedad de opciones, nuestros clientes
                            siempre encuentran el mejor lugar para sus vehículos.
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Servicios</h6>
                        <p><a href="#!" class="text-reset">Estacionamiento</a></p>
                        <p><a href="#!" class="text-reset">Servicio 2</a></p>
                        <p><a href="#!" class="text-reset">Servicio 3</a></p>
                    </div>

                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Enlaces utiles</h6>
                        <p><a href="#!" class="text-reset">Reservas</a></p>
                        <p><a href="#!" class="text-reset">Tarifas</a></p>
                        <p><a href="#!" class="text-reset">Configuracion</a></p>
                        <p><a href="#!" class="text-reset">Ayuda</a></p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <p>
                            <i class="fas fa-home me-3"></i> Avenida Hernando Siles, Sucre -
                            Bolivia
                        </p>
                        <p><i class="fas fa-envelope me-3"></i>info@ejemplo.com</p>
                        <p><i class="fas fa-phone me-3"></i> + 591 70000000</p>
                        <p><i class="fas fa-print me-3"></i> + 591 70000000</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.15)">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="">AutoDormido.com</a>
        </div>
    </footer>

    <script src="js/bootstrap.min.js"></script>
    <script src="ajax.js"></script>
    <script>
        // Definir la función que deseas ejecutar
        function enviarNotificacion() {
            console.log("Este es mi script automático.");
            //cargarContenido('notificacion.php');
            fetch("notificacion.php")
                .then((response) => response.text())
                .then(
                    (data) => (document.getElementById("notificacion").innerHTML = data)
                );

            fetch("reservas.php").then((response) => response.text());
        }
        // Configurar la ejecución automática cada 10 segundos (10000 milisegundos)
        var intervalo = setInterval(enviarNotificacion, 10000);

      // Puedes detener la ejecución automática en cualquier momento si es necesario
      //clearInterval(intervalo);
    </script>
</body>

</html>