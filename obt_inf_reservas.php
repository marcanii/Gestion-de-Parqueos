<?php
include('conexion.php');

if (isset($_POST['fechaSeleccionada'])) {
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    $sql = "SELECT c.nombres, c.apellidos, c.placa, c.telefono, c.descripcionvehiculo, r.fechareserva, r.horainiciores, r.horafinalres
            FROM cliente c INNER JOIN reserva r ON c.ci = r.id_cliente
            WHERE DATE(r.fechareserva) = '$fechaSeleccionada'; ";

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
                        <td>' . $row['fechareserva'] . '</td>
                        <td>' . $row['horainiciores'] . '</td>
                        <td>' . $row['horafinalres'] . '</td>
                    </tr>';
        }
        echo '</tbody>
            </table>';
    } else {
        echo "No hay reservas programadas para la fecha seleccionada";
    }
}
?>
