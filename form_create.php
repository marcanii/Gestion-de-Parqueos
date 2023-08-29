<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
            width: auto;
            max-width: 700px;
            height: auto;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
            background-color: #232329;
            color: white;
            
        }

        #submit{
            margin-top: 10px;
            background-color: #41c9c9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        

    </style>
</head>
<body>
<?php 

include('conexion.php');

?>
<div class="card">
    <form action="javascript:crear1()" method="POST" id="formCrear1">
        <div class="form-group">
            <label for="tipotarifa">Tipo tarifa:</label>
            <select name="tipotarifa" id="tipotarifa">
                <option value="Diaria">Diaria</option>
                <option value="Semanal">Semanal</option>
                <option value="Mensual">Mensual</option>
                <option value="Rápida">Rápida</option>
                <option value="Planeada">Planeada</option>
            </select>
        </div>
        <div>
            <label for="Descripcion">Descripcion :</label>
            <input type="text" name="descripciontarifa">
        </div>

        <div>
            <label for="valor">Valor tarifa</label>
            <input type="number" name="valor">
        </div>


        <input type="submit" value="Crear" id="submit">

    </form>
</div>
    
</body>
</html>