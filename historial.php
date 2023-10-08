<?php
session_start();
include('conexion.php');
include('header.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $historial = $conn->query("SELECT turnos.idturno, turnos.fecha, turnos.time, servicios.tiposervicio, servicios.valor
                              FROM turnos
                              JOIN servicios ON turnos.idservicio = servicios.idservicio
                              WHERE turnos.mail = '$email'");
?>
<div class="container-fluid first main-font">
    <h4 class="text-white text-center mt-2">Bienvenido <?php echo ucfirst($_SESSION['nombre']);?></h4>
    <h5 class="text-white text-center">Aqui puede ver su historial de turnos</h5>
    <div class="container text-white pt-3">
<?php
    
    if ($historial->num_rows > 0) {
        echo '<table class="table table-dark table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID Turno</th>';
        echo '<th>Fecha</th>';
        echo '<th>Hora</th>';
        echo '<th>Tipo de Servicio</th>';
        echo '<th>Valor</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while($row = $historial->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["idturno"] . '</td>';
            echo '<td>' . $row["fecha"] . '</td>';
            echo '<td>' . $row["time"] . '</td>';
            echo '<td>' . $row["tiposervicio"] . '</td>';
            echo '<td>' . $row["valor"] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No se encontraron turnos para este usuario.";
    }
    ?></div></div><?php
}?>