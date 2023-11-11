<?php
include('../conexion.php');

$idbarbero = $_POST['barbero'];
$new_query = "SELECT turnos.fecha, turnos.time, turnos.mail, servicios.tiposervicio, servicios.valor, 
            barberos.nombre, barberos.apellido FROM turnos 
            JOIN usuarios ON turnos.mail = usuarios.mail 
            JOIN servicios ON turnos.idservicio = servicios.idservicio 
            JOIN barberos ON turnos.idbarbero = barberos.idbarbero 
            WHERE turnos.idbarbero = $idbarbero ORDER BY turnos.fecha ASC, turnos.time ASC";
$query = $conn->query($new_query);

$total_query ="SELECT SUM(servicios.valor) AS total FROM turnos 
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
<section class="main-font container-fluid text-white d-flex justify-content-center">
    <div class="container px-4 col-12 col-md-10 col-lg-10 col-xl-10">
        <div>
            <table class="table table-dark table-hover">
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
                        while ($fila = mysqli_fetch_array($query)){
                            echo "<tr>
                                <td>".$fila['fecha']."</td>
                                <td>".$fila['time']."</td>
                                <td>".$fila['mail']."</td>
                                <td>".$fila['nombre']."</td>
                                <td>".$fila['apellido']."</td>
                                <td>".$fila['tiposervicio']."</td>
                                <td>".$fila['valor']."</td>";
                        }
                    ?>  
                </tbody>
            </table>
            <div>
                <?php 
                    $total = mysqli_fetch_row($query2);
                    echo "<div>".$total[0]."</div>";
                ?>
            </div>
        </div>
    </div>
</section>
