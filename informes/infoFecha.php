<?php
include ("./headerInformes.php");
include('../conexion.php');

$fecha = $_POST["fecha"];
$fecha2 = $_POST["fecha2"];
$cuanto = $_POST["cuanto"];

$fInicial;
$fFinal;
$auxFecha;

if (empty($fecha2)){
    $fInicial=$fecha;
    $auxFecha = new DateTime($fecha);
    print ('<br>');
    if ($cuanto == "dia"){
        $intervalo = new DateInterval ('P1D');
        $auxFecha -> add ($intervalo);
    } else if ($cuanto == "semana"){
        $intervalo = new DateInterval ('P7D');
        $auxFecha -> add ($intervalo);
    } else if ($cuanto == "mes"){
        $intervalo = new DateInterval ('P1M');
        $auxFecha -> add ($intervalo);
    } 
    $fFinal = $auxFecha -> format('Y-m-d');
} else {
    if ($fecha >= $fecha2){
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
            WHERE turnos.fecha >='".$fInicial."' AND turnos.fecha < '".$fFinal."';";
$query = $conn->query($new_query);


$total_query ="SELECT SUM(servicios.valor) FROM turnos 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            WHERE turnos.fecha >='".$fInicial."' AND turnos.fecha < '".$fFinal."';";
$query2 = $conn->query($total_query);

//TOTAL SERVICIOS POR SEMANA
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.fecha>= '2023-10-11' AND fecha< '2023-10-18';
//TOTAL GUITA POR SEMANA
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido,SUM(servicios.valor) FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.fecha>= '2023-10-11' AND fecha< '2023-10-18';
?>
<div class="bloque">Facturacion realizada entre: <?php print($fInicial." y ".$fFinal);?></div>
<div class="">
        <table class="">
            <thead>
                <td scope="col">Fecha</td>
                <td scope="col">Hora</td>
                <td scope="col">Nombre</td>
                <td scope="col">Apellido</td>
                <td scope="col">Servicio</td>
                <td scope="col">Valor</td> 
            </thead>
            <tbody>
                <?php
                    while ($fila = mysqli_fetch_array($query)){
                        echo "<tr class='fila'>
                            <td>".$fila['fecha']."</td>
                            <td>".$fila['time']."</td>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['apellido']."</td>
                            <td>".$fila['tiposervicio']."</td>
                            <td class='numeracion'>".$fila['valor']."</td>";
                    }
                ?>  
        
        <br>
        <?php 
            $total = mysqli_fetch_row($query2);
            echo "<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class='numeracion total'>".$total[0]."</td>
                </tr>";
        ?>
            </tbody>
        </table>
</div>

