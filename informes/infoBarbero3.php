<?php
include("./headerInformes.php");
include('../conexion.php');

$idbarbero = $_POST['barbero'];
$new_query = "SELECT turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, 
            barberos.nombre, barberos.apellido FROM turnos 
            JOIN usuarios ON turnos.mail = usuarios.mail 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
            WHERE turnos.idbarbero = $idbarbero ORDER BY turnos.fecha ASC, turnos.time ASC";
$query = $conn->query($new_query);

$total_query = "SELECT SUM(servicios.valor) AS total FROM turnos 
            JOIN usuarios ON turnos.mail = usuarios.mail 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
            WHERE turnos.idbarbero = $idbarbero";
$query2 = $conn->query($total_query);

//SERVICIOS HECHOS POR BARBERO
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.idbarbero =[ACA_VA_EL_ID];
//TOTAL GUITA POR BARBERO
//SELECT turnos.idturno, turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, barberos.nombre, barberos.apellido,SUM(servicios.valor) FROM turnos JOIN usuarios ON turnos.mail = usuarios.mail JOIN servicios ON turnos.idservicio = servicios.idservicio JOIN barberos ON turnos.idbarbero = barberos.idbarbero WHERE turnos.idbarbero =[ACA_VA_EL_ID];

?>
<div class="bloque">Facturacion por barbero </div>
<div>
    <table>
        <thead>
            <td scope="col">Fecha</td>
            <td scope="col">Hora</td>
            <td scope="col">Email</td>
            <td scope="col">Nombre</td>
            <td scope="col">Apellido</td>
            <td scope="col">Servicio</td>
            <td scope="col">Valor</td>
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
                                    margin: 15px auto;" 
                                    onmouseover="this.style.backgroundColor='#000'; this.style.color='#fff';"
                                    onmouseout="this.style.backgroundColor='#fff'; this.style.color='#000';">
        Imprimir</button>
</div>

<script>
    document.getElementById('printButton').addEventListener('click', function() {
        window.print();
    });
</script>