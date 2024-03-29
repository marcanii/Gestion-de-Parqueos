<?php
include_once 'conexion.php';
$placa = $_POST['placa'];
$query = "SELECT p.*, c.* FROM parqueo p
    INNER JOIN cliente c ON p.placa = c.placa
    WHERE p.placa = '$placa'";
$result = $con->query($query);
$row = $result->fetch_assoc();
if ($row > 0) {
    //echo $row['ci'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <div class="p-5 rounded-5 text-secondary shadow bg-custom" style="width: 45rem">
        <div class="d-flex justify-content-center">
            <img src="./assets/add-user.png" width="100" height="100">
        </div>
        <div class="text-center fs-1 fw-bold text-white">Actualizar Parqueo</div>
        <form action="#" method="post" id="formUpdateParqueo2">
            <div class="row mt-2">
                <div class="col-md-6 form-group">
                    <label for="ci">CI:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/ci.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="number" placeholder="Carnet" name="ci" required value="<?php echo $row['ci']; ?>"/>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="nombres">Nombres:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/names.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="text" placeholder="Nombres" name="nombres" required value="<?php echo $row['nombres'] ?>"/>
                    </div>
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-md-6 form-group">
                    <label for="apellidos">Apellidos:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/names.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="text" placeholder="Apellidos" name="apellidos" required value="<?php echo $row['apellidos'] ?>"/>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="telefono">Teléfono:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/phone.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="number" placeholder="Teléfono" name="telefono" required value="<?php echo $row['telefono'] ?>"/>
                    </div>
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-md-6 form-group">
                    <label for="placa">Placa:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/placa.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="text" placeholder="Placa" name="placa" required value="<?php echo $row['placa'] ?>"/>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="descripcion">Descripcion Vehículo:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/descrip-vehiculo.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="text" placeholder="Descripcion Vehículo" name="descripcion" required value="<?php echo $row['descripcionvehiculo'] ?>"/>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 form-group">
                    <label for="fechaentrada">Hora de salida:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/hora-salida.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="time" placeholder="Hora de Salida" name="horasalida" required value="<?php echo $row['horasalida'] ?>"/>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="fechasalida">Estado Parqueo:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/activo.png" width="20" height="20">
                        </div>
                        <select name="estado" id="estado" class="form-control btn-light" required>
                            <option value="" disabled selected>Estado parqueo</option>
                            <option value="1" <?php if ($row['estado_parqueo'] == 1) echo 'selected'; ?>>Activo</option>
                            <option value="0" <?php if ($row['estado_parqueo'] == 0) echo 'selected'; ?>>Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 form-group">
                    <label for="observaciones">Observaciones:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/observaciones.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="text" placeholder="Observaciones" name="observaciones" required value="<?php echo $row['observaciones'] ?>"/>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label for="fechaentrada">Costo Toral:</label>
                    <div class="input-group mt-1">
                        <div class="input-group-text bg-icon-custom">
                            <img src="./assets/dinero.png" width="20" height="20">
                        </div>
                        <input class="form-control bg-light" type="number" placeholder="Costo Total" name="costototal" required value="<?php echo $row['costo_total'] ?>"/>
                    </div>
            </div>
            <input type="button" value="Actulizar" class="btn bg-btn-custom text-white w-25 mt-4 fw-semibold shadow-sm" onclick="updateParqueo()">
        </form>
        <a href="search_parqueo.html" class="btn bg-btn-custom text-white w-25 mt-4" style="margin-left:10px;">Cancelar</a>
        <a href="inicio.php" class="btn bg-btn-custom text-white w-25 mt-4" style="margin-left:10px;">Inicio</a>
    </div>
</body>
</html>
<?php
} else {
    echo "<script>alert('No existe el cliente con la placa $placa'); window.location.href='search_parqueo.html';</script>";
}
?>