<?php
include("./headerInformes.php");
include('../conexion.php');

$fecha = $_POST["fecha"];
$fecha2 = $_POST["fecha2"];
$cuanto = $_POST["cuanto"];

$fInicial;
$fFinal;
$auxFecha;

if (empty($fecha2)) {
    $fInicial = $fecha;
    $auxFecha = new DateTime($fecha);
    if ($cuanto == "dia") {
        $intervalo = new DateInterval('P1D');
        $auxFecha->add($intervalo);
    } else if ($cuanto == "semana") {
        $intervalo = new DateInterval('P7D');
        $auxFecha->add($intervalo);
    } else if ($cuanto == "mes") {
        $intervalo = new DateInterval('P1M');
        $auxFecha->add($intervalo);
    } else if ($cuanto == "anio") {
        $intervalo = new DateInterval('P12M');
        $auxFecha->add($intervalo);
    }
    $fFinal = $auxFecha->format('Y-m-d');
} else {
    if ($fecha >= $fecha2) {
        $fInicial = $fecha2;
        $fFinal = $fecha;
    } else {
        $fInicial = $fecha;
        $fFinal = $fecha2;
    }
}

$new_query = "SELECT turnos.fecha, turnos.time, servicios.tiposervicio, 
            servicios.valor, barberos.nombre, barberos.apellido FROM turnos 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
            WHERE turnos.fecha >='" . $fInicial . "' AND turnos.fecha < '" . $fFinal . "';";
$query = $conn->query($new_query);


$total_query = "SELECT SUM(servicios.valor) FROM turnos 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            WHERE turnos.fecha >='" . $fInicial . "' AND turnos.fecha < '" . $fFinal . "';";
$query2 = $conn->query($total_query);

//TOTAL SERVICIOS POR SEMANA
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.fecha>= '2023-10-11' AND fecha< '2023-10-18';
//TOTAL GUITA POR SEMANA
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido,SUM(servicios.valor) FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.fecha>= '2023-10-11' AND fecha< '2023-10-18';
?>

<div class="container-fluid">
    <div class="container">
        <h2 class="text-white text-center p-2">Facturación realizada entre: <?php print($fInicial . " y " . $fFinal); ?></h2>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <td>Fecha</td>
                    <td>Hora</td>
                    <td>Nombre barbero</td>
                    <td>Apellido barbero</td>
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
                            <td>" . $fila['nombre'] . "</td>
                            <td>" . $fila['apellido'] . "</td>
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