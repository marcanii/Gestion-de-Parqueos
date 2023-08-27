<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

include('conexion.php');

?>
<div class="card">
    <form action="javascript:crear1()" method="POST" id="formCrear1">
       
        <div>
            <label for="tipotarifa">Tipo tarifa</label>
           <input type="text" name="tipotarifa"> 
           
        </div>
        <div>
            <label for="Descripcion">Descripcion :</label>
            <input type="text" name="descripciontarifa">
        </div>

        <div>
            <label for="valor">Valor tarifa</label>
            <input type="number" name="valor">
        </div>


        <input type="submit" value="Crear">

    </form>
</div>
    
</body>
</html>