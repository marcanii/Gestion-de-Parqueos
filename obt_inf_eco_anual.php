<?php
include('conexion.php');

if (isset($_POST['anio'])) {
    $anio = $_POST['anio'];
    
    // Consulta para contar la cantidad de autos ingresados por mes
    $consultaAutos = "SELECT COUNT(*) AS total, MONTH(fecha) AS mes FROM parqueo WHERE YEAR(fecha) = '$anio' GROUP BY MONTH(fecha); ";
    $resultadoAutos = $con->query($consultaAutos);
    
    // Consulta para calcular el dinero total recaudado por mes
    $consultaDinero = "SELECT SUM(costo_total) AS total, MONTH(fecha) AS mes FROM parqueo WHERE YEAR(fecha) = '$anio' GROUP BY MONTH(fecha); ";
    $resultadoDinero = $con->query($consultaDinero);
    
    // Crear arrays para almacenar los datos
    $num_autos = array();
    $total_dinero = array();
    
    // Inicializar arrays con "0" para todos los meses
    for ($i = 0; $i < 12; $i++) {
        $num_autos[$i] = 0;
        $total_dinero[$i] = 0;
    }
    
    // Llenar los arrays con los datos
    while ($rowAutos = $resultadoAutos->fetch_assoc()) {
        $mes = $rowAutos['mes'] - 1; // Ajustar el índice del mes
        $num_autos[$mes] = $rowAutos['total'];
    }
    
    while ($rowDinero = $resultadoDinero->fetch_assoc()) {
        $mes = $rowDinero['mes'] - 1; // Ajustar el índice del mes
        $total_dinero[$mes] = round($rowDinero['total'], 2); // Redondear a dos decimales
    }

    // Devolver la tabla con los datos
    echo '<table class="table table-dark table-bordered" id="tableToExport">
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Cantidad de autos</th>
                        <th>Dinero Total</th>
                    </tr>
                </thead>
                <tbody>';
                
    // Array con los nombres de los meses
    $nombres_meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

    for ($i = 0; $i < 12; $i++) {
        echo '<tr>
                <td>' . $nombres_meses[$i] . '</td>
                <td>' . $num_autos[$i] . '</td>
                <td>' . $total_dinero[$i] . '</td>
              </tr>';
    }
    
    echo '</tbody>
          </table>';
}
?>
