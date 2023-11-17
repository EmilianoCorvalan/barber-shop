<?php
include("./headerInformes.php");
include('../conexion.php');

$idServicio = $_POST['servicio'];
if ($idServicio == '999') {
    $new_query = "SELECT turnos.fecha, turnos.time, servicios.tiposervicio, servicios.valor FROM turnos 
        JOIN servicios ON turnos.idservicio = servicios.idservicio 
        ORDER BY turnos.fecha ASC, turnos.time ASC";
    $total_query = "SELECT SUM(servicios.valor) AS total FROM turnos 
        JOIN servicios ON turnos.idservicio = servicios.idservicio ";
} else {
    $new_query = "SELECT turnos.fecha, turnos.time, servicios.tiposervicio, servicios.valor FROM turnos 
        JOIN servicios ON turnos.idservicio = servicios.idservicio 
        WHERE servicios.idservicio = $idServicio ORDER BY turnos.fecha ASC, turnos.time ASC";
    $total_query = "SELECT SUM(servicios.valor) AS total FROM turnos 
        JOIN servicios ON turnos.idservicio = servicios.idservicio 
        WHERE servicios.idservicio = $idServicio";
}

$query = $conn->query($new_query);


$query2 = $conn->query($total_query);

//TOTAL SERVICIOS REALIZADOS 
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero where servicios.idservicio = 1;
//TOTAL GUITA POR SERVICIO
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido, SUM(servicios.valor) FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero where servicios.idservicio = 1;

?>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-white text-center p-2">Facturación por tipo de servicios</h2>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Hora</td>
                    <td>Servicio</td>
                    <td>Valor</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = mysqli_fetch_array($query)) {
                    echo "<tr>
                        <td>" . $fila['fecha'] . "</td>
                        <td>" . $fila['time'] . "</td>
                        <td>" . $fila['tiposervicio'] . "</td>
                        <td>$ " . $fila['valor'] . "</td>";
                }
                ?>
                <?php
                $total = mysqli_fetch_row($query2);
                echo "<tr>
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