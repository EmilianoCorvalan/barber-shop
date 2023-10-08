<div class="container-fluid">
    <div class="container">
    <h4 class="text-center text-white mb-2">Barberos</h4>
        <?php 
            $barberos = $conn->query("SELECT barberos.*, sucursales.nombre_sucursal AS nombre_sucursal
                                        FROM barberos JOIN sucursales ON barberos.id_sucursal = sucursales.id_sucursal");
        if ($barberos->num_rows > 0){
            echo '<table class="table table-dark table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID Empleado</th>';
            echo '<th>Nombre</th>';
            echo '<th>Apellido</th>';
            echo '<th>Direccion</th>';
            echo '<th>Telefono</th>';
            echo '<th>Especialidad</th>';
            echo '<th>Sucursal</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

        while($row = $barberos->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["idbarbero"] . '</td>';
            echo '<td>' . $row["nombre"] . '</td>';
            echo '<td>' . $row["apellido"] . '</td>';
            echo '<td>' . $row["direccion"] . '</td>';
            echo '<td>' . $row["telefono"] . '</td>';
            echo '<td>' . $row["especialidad"] . '</td>';
            echo '<td>' . $row["nombre_sucursal"] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No se encontraron barberos.";
        } ?>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-success text-white m-3" >Agregar Barbero</button>
            <button class="btn btn-danger text-white m-3">Borrar Barbero</button>
        </div>

    </div>
</div>