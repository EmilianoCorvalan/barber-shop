<div class="container-fluid">
    <div class="container">
        <h4 class="text-center text-white mb-2">Servicios</h4>
        <?php
        $servicios = $conn->query("SELECT * from servicios");
        if ($servicios->num_rows > 0) {
            echo '<table class="table table-dark table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID Servicio</th>';
            echo '<th>Tipo de servicio</th>';
            echo '<th>Valor</th>';
            echo '<th>Acciones</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $servicios->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["idservicio"] . '</td>';
                echo '<td>' . $row["tiposervicio"] . '</td>';
                echo '<td>' . $row["valor"] . '</td>';
                echo '<td> <div class="d-flex justify-content-center bg-dark text-white">
                            <a href="editarservicio.php?idservicio=' . $row['idservicio'] . '" class="mx-2 link-primary bg-dark"><i class="bi bi-pencil-fill bg-dark"></i></a>
                            <a href="borrarservicio.php?idservicio=' . $row['idservicio'] . '" class="mx-2 link-danger bg-dark"><i class="bi bi-trash icon bg-dark"></i></a>
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
            <a href="agregarservicios.php" class="btn btn-success text-white m-3">Agregar Servicio</a>
        </div>

    </div>
</div>