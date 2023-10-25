<div class="container-fluid">
    <div class="container">
        <h4 class="text-center text-white mb-2">Sucursales</h4>
        <?php
        $sucursales = $conn->query("SELECT * from sucursales");
        if ($sucursales->num_rows > 0) {
            echo '<table class="table table-dark table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID Sucursal</th>';
            echo '<th>Nombre Sucursal</th>';
            echo '<th>Direccion</th>';
            echo '<th>Ciudad</th>';
            echo '<th>Telefono</th>';
            echo '<th>Email</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $sucursales->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id_sucursal"] . '</td>';
                echo '<td>' . $row["nombre_sucursal"] . '</td>';
                echo '<td>' . $row["direccion_sucursal"] . '</td>';
                echo '<td>' . $row["ciudad_sucursal"] . '</td>';
                echo '<td>' . $row["telefono_sucursal"] . '</td>';
                echo '<td>' . $row["email_sucursal"] . '</td>';
                echo '<td> <div class="d-flex justify-content-center bg-dark text-white">
                            <a href="editarsucursal.php?idsucursal=' . $row['id_sucursal'] . '" class="mx-2 link-primary bg-dark"><i class="bi bi-pencil-fill bg-dark"></i></a>
                            <a href="borrarsucursal.php?idsucursal=' . $row['id_sucursal'] . '" class="mx-2 link-danger bg-dark"><i class="bi bi-trash icon bg-dark"></i></a>
                        </div>
                </td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "No se encontraron sucursales.";
        } ?>

        <div class="d-flex justify-content-center mt-4">
            <a href="agregarsucursal.php" class="btn btn-success text-white m-3">Agregar Sucursal</a>
        </div>

    </div>
</div>