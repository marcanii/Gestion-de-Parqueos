<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/index.css" />

    <style>
        .bg-custom {
            background-color: #171b177a;
        }
        .bg-icon-custom{
            background-color: #5cd2c6;
        }
        .color-text-custom{
            color: #5cd2c6;
        }
        .bg-btn-custom{
            background-color: #5cd2c6;
        }
        .bg-btn-custom:hover{
            background-color: #8ecbcf;
        }
    </style>
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">
    <div class="p-5 rounded-5 text-secondary shadow bg-custom" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <img src="./assets/login.png" width="100" height="100">
        </div>
        <div class="text-center fs-1 fw-bold text-white">Iniciar Sesión</div>

        <form action="javascript:autenticar()" method="post" id="formLogin">
            <div class="input-group mt-4">
                <div class="input-group-text bg-icon-custom">
                    <img src="./assets/user.png" width="16", height="16">
                </div>
                <input class="form-control bg-light" type="text" placeholder="User name" name="carnet"
                <?php if(isset($_COOKIE['carnet'])) { ?> value="<?php echo $_COOKIE['carnet'];}?>">
            </div>
            <div class="input-group mt-1">
                <div class="input-group-text bg-icon-custom">
                    <img src="./assets/password.png" width="16" height="16">
                </div>
                <input class="form-control bg-light" type="password" placeholder="Contraseña" name="contrasena"/>
            </div>
            <div class="d-flex justify-content-around mt-1">
                <div class="d-flex align-items-center gap-1">
                    <input class="form-check-input" type="checkbox" />
                    <div class="pt-1" style="font-size: 0.9rem">Recuérdamelo</div>
                </div>
                <div class="pt-1">
                    <a href="#" class="text-decoration-none color-text-custom fw-semibold fst-italic"
                        style="font-size: 0.9rem">Olvidaste tu contraseña?</a>
                </div>
            </div>
            
            <input type="submit" value="Iniciar Sesión" class="btn bg-btn-custom text-white w-100 mt-4 fw-semibold shadow-sm">
            
            <div class="d-flex gap-1 justify-content-center mt-1">
                <div>No tienes una cuenta?</div>
                <a href="#" class="text-decoration-none color-text-custom fw-semibold">Registrar</a>
            </div>

            <div class="p-3">
                <div class="border-bottom text-center" style="height: 0.9rem">
                    <span class="bg-white px-3">o</span>
                </div>
            </div>

            <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
                <img src="./assets/google.png" alt="google-icon" width="24" height="24"/>
                <div class="fw-semibold text-secondary">Continuar con Google</div>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>