<?php
include("./headerInformes.php");
include('../conexion.php');

$idbarbero = $_POST['barbero'];
if ($idbarbero == '999') {
    $new_query = "SELECT turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, 
        barberos.nombre, barberos.apellido FROM turnos 
        JOIN usuarios ON turnos.mail = usuarios.mail 
        JOIN servicios ON turnos.idservicio = servicios.idservicio 
        JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
        ORDER BY turnos.fecha ASC, turnos.time ASC";
    $total_query = "SELECT SUM(servicios.valor) AS total FROM turnos 
        JOIN usuarios ON turnos.mail = usuarios.mail 
        JOIN servicios ON turnos.idservicio = servicios.idservicio 
        JOIN barberos ON turnos.idbarbero = barberos.idbarbero";
} else {
    $new_query = "SELECT turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, 
        barberos.nombre, barberos.apellido FROM turnos 
        JOIN usuarios ON turnos.mail = usuarios.mail 
        JOIN servicios ON turnos.idservicio = servicios.idservicio 
        JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
        WHERE turnos.idbarbero = $idbarbero ORDER BY turnos.fecha ASC, turnos.time ASC";
    $total_query = "SELECT SUM(servicios.valor) AS total FROM turnos 
        JOIN usuarios ON turnos.mail = usuarios.mail 
        JOIN servicios ON turnos.idservicio = servicios.idservicio 
        JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
        WHERE turnos.idbarbero = $idbarbero";
}

$query = $conn->query($new_query);
$query2 = $conn->query($total_query);

//SERVICIOS HECHOS POR BARBERO
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.idbarbero =[ACA_VA_EL_ID];
//TOTAL GUITA POR BARBERO
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido,SUM(servicios.valor) FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.idbarbero =[ACA_VA_EL_ID];

?>

<div class="container-fluid">
    <div class="container">
        <h2 class="text-white text-center p-2">Facturación por barbero</h2>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Email cliente</th>
                        <th>Nombre barbero</th>
                        <th>Apellido barbero</th>
                        <th>Servicio</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($fila = mysqli_fetch_array($query)) {
                        echo "<tr>
                            <td>" . $fila['fecha'] . "</td>
                            <td>" . $fila['time'] . "</td>
                            <td>" . $fila['mail'] . "</td>
                            <td>" . $fila['nombre'] . "</td>
                            <td>" . $fila['apellido'] . "</td>
                            <td>" . $fila['tiposervicio'] . "</td>
                            <td>$ " . $fila['valor'] . "</td>
                        </tr>";
                    }

                    $total = mysqli_fetch_row($query2);
                    echo "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='table-active'>$ " . $total[0] . " - Total</td>
                    </tr>";
                    ?>
                </tbody>
            </table>

        <button id="printButton" class="btn btn-primary" style="margin: 15px auto; display: block;">
            Imprimir
        </button>
    </div>
</div>





<script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>