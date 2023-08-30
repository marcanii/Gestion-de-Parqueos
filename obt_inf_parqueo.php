<?php
include('conexion.php');

if (isset($_POST['fechaSeleccionada'])) {
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    $sql = "SELECT c.nombres, c.apellidos, c.placa, c.telefono, c.descripcionvehiculo, p.fecha, p.horaentrada, p.horasalida
            FROM cliente c INNER JOIN parqueo p ON c.placa = p.placa
            WHERE DATE(p.fecha) = '$fechaSeleccionada'; ";

    $resultado = $con->query($sql);

    // Genera la tabla HTML
    if ($resultado->num_rows > 0) {
        echo '<table class="table table-dark table-bordered" id="tableToExport">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Descripcion del vehículo</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Fecha</th>
                            <th>Hora de entrada</th>
                            <th>Hora de salida</th>
                        </tr>
                    </thead>
                    <tbody>';
        while ($row = $resultado->fetch_assoc()) {
            echo '<tr>
                        <td>' . $row['placa'] . '</td>
                        <td>' . $row['descripcionvehiculo'] . '</td>
                        <td>' . $row['nombres'] . '</td>
                        <td>' . $row['apellidos'] . '</td>
                        <td>' . $row['telefono'] . '</td>
                        <td>' . $row['fecha'] . '</td>
                        <td>' . $row['horaentrada'] . '</td>
                        <td>' . $row['horasalida'] . '</td>
                    </tr>';
        }
        echo '</tbody>
            </table>';
    } else {
        echo "No hay registros para la fecha seleccionada :(";
    }
}
?>
