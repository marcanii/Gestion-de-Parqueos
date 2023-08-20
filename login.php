<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <div id="resp">
    <form action="javascript:autenticar()" method="post" id="formLogin">
        <div>
            <label for="">Carnet de identidad</label>
            <input type="text" name="carnet" <?php if(isset($_COOKIE['carnet'])) { ?> value="<?php echo $_COOKIE['carnet'];}?>">
        </div>
        <div>
            <label for="">Contraseña(Placa)</label>
            <input type="password" name="contrasena">
        </div>
        <div>
            <input type="submit" value="Ingresar">
        </div>
    <script src="ajax.js"></script>
    </form>
    </div>
</body>