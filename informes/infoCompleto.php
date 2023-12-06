<?php
include("./headerInformes.php");
include('../conexion.php');
//var_dump ($_POST);

//array(5) { ["barbero"]=> string(4) "none" ["servicio"]=> string(4) "none" ["fecha"]=> string(0) "" ["fecha2"]=> string(0) "" ["cuanto"]=> string(3) "dia" }
$barbero = $_POST["barbero"];
$servicio = $_POST["servicio"];
$fecha1 = $_POST["fecha"];
$fecha2 = $_POST["fecha2"];
$cuanto = $_POST["cuanto"];

$stringBarbero = "";
$stringServicio = "";
$fInicial;
$fFinal;
$auxFecha;

if ($barbero != 'none') {
    //print ('Entro a barbero');
    $stringBarbero = " turnos.idbarbero = '" . $barbero . "' ";
}
if ($servicio != 'none') {
    //print ('Entro a servicio');
    $stringServicio = " turnos.idservicio = '" . $servicio . "' ";
}
//Si no ponemos fecha ni periodo asignamos para que tome los del dia
if (empty($fecha1) and empty($fecha2)) {
    $fecha1 = date('Y-m-d');
    $cuanto = "dia";
}
if (!empty($fecha1) and $cuanto == 'none') {
    $cuanto = "dia";
}

if (!empty($fecha1) and !empty($fecha2)) { //SI TENEMOS LAS DOS FECHAS ENTONCES ESTO.
    if ($fecha1 >= $fecha2) {
        $fInicial = $fecha2;
        $fFinal = $fecha1;
    } else {
        $fInicial = $fecha1;
        $fFinal = $fecha2;
    }
} else if (!empty($fecha1) and $cuanto != 'none') { //SI TENEMOS FECHA INICIAL Y CUANTO ENTONCES ESTO.
    $fInicial = $fecha1;
    $auxFecha = new DateTime($fecha1);
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
}

$filtro = ' WHERE ';
if ($stringBarbero != "") { //.' WHERE '
    $filtro = $filtro . $stringBarbero;
}
if ($stringBarbero == "" and $stringServicio != "") { //. ' WHERE '
    $filtro = $filtro . $stringServicio;
} else if ($stringServicio != "") {
    $filtro = $filtro . ' AND ' . $stringServicio;
}
if ($stringBarbero != "" or $stringServicio != "") {
    $filtro = $filtro . " AND ";
}
$filtro = $filtro . "turnos.fecha >= '" . $fInicial . "' AND turnos.fecha <= '" . $fFinal . "'";



$new_query = "SELECT turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, 
            barberos.nombre, barberos.apellido FROM turnos 
            JOIN usuarios ON turnos.mail = usuarios.mail 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
            $filtro ORDER BY turnos.fecha ASC, turnos.time ASC";
$query = $conn->query($new_query);

$total_query = "SELECT SUM(servicios.valor) AS total FROM turnos 
            JOIN usuarios ON turnos.mail = usuarios.mail 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
            $filtro";
$query2 = $conn->query($total_query);


?>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-white text-center p-2">Informe de facturación</h2>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <td scope="col">Fecha</td>
                    <td scope="col">Hora</td>
                    <td scope="col">Email</td>
                    <td scope="col">Nombre</td>
                    <td scope="col">Apellido</td>
                    <td scope="col">Servicio</td>
                    <td scope="col">Valor</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = mysqli_fetch_array($query)) {
                    echo "<tr class='fila'>
                        <td>" . $fila['fecha'] . "</td>
                        <td>" . $fila['time'] . "</td>
                        <td>" . $fila['mail'] . "</td>
                        <td>" . $fila['nombre'] . "</td>
                        <td>" . $fila['apellido'] . "</td>
                        <td>" . $fila['tiposervicio'] . "</td>
                        <td class='numeracion'>" . $fila['valor'] . "</td>";
                }
                ?><br>
                <?php
                $total = mysqli_fetch_row($query2);
                echo "<tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='numeracion total'>" . $total[0] . "</td>
                    </tr>";
                ?>

            </tbody>
        </table>

        <button id="printButton" style="padding: 10px 15px;
                                    font-size: 14px;
                                    background-color: #fff;
                                    color: #000;
                                    border: 1px solid #000;
                                    cursor: pointer;
                                    margin: 2rem;
                                    display: block;
                                    margin: 15px auto;" onmouseover="this.style.backgroundColor='#000'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#fff'; this.style.color='#000';">
            Imprimir</button>
    </div>
</div>
<script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>