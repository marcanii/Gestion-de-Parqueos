<?php
include('conexion.php');

if (isset($_POST['fechaSeleccionada'])) {
    $fechaSeleccionada = $_POST['fechaSeleccionada'];
    // contar cuando autos ingresaron en el dia
    $num_autos = "SELECT COUNT(*) AS total FROM parqueo WHERE DATE(fecha) = '$fechaSeleccionada'; ";
    $resultado = $con->query($num_autos);
    $row = $resultado->fetch_assoc();
    $total_autos = $row['total'];
    // sacar el total de dinero que se recaudo en el dia
    $total_dinero = "SELECT SUM(costo_total) AS total FROM parqueo WHERE DATE(fecha) = '$fechaSeleccionada'; ";
    $resultado = $con->query($total_dinero);
    $row = $resultado->fetch_assoc();
    $total_dinero = $row['total'];
    // redondea el dinero a dos decimales
    $total_dinero = round($total_dinero, 2);

    // condiciones para cuando no hayan registros
    if ($total_autos == 0 and $total_dinero == 0) {
        echo "No hay registros para la fecha seleccionada :(";
    } else{
        // devolver la tabla con los datos
        echo '<table class="table table-dark table-bordered" id="tableToExport">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Numero de autos que ingresaron en el dia</td>
                            <td>' . $total_autos . '</td>
                        </tr>
                        <tr>
                            <td>Total de dinero recaudado en el dia</td>
                            <td>' . $total_dinero . '</td>
                        </tr>
                    </tbody>
              </table>';
    }   
}
?>
