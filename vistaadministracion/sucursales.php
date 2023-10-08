
<div class="container-fluid">
    <div class="container">
    <h4 class="text-center text-white mb-2">Sucursales</h4>
        <?php 
            $sucursales = $conn->query("SELECT * from sucursales");
        if ($sucursales->num_rows > 0){
            echo '<table class="table table-dark table-hover">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID Sucursal</th>';
            echo '<th>Nombre Sucursal</th>';
            echo '<th>Direccion</th>';
            echo '<th>Ciudad</th>';
            echo '<th>Telefono</th>';
            echo '<th>Email</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

        while($row = $sucursales->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["id_sucursal"] . '</td>';
            echo '<td>' . $row["nombre_sucursal"] . '</td>';
            echo '<td>' . $row["direccion_sucursal"] . '</td>';
            echo '<td>' . $row["ciudad_sucursal"] . '</td>';
            echo '<td>' . $row["telefono_sucursal"] . '</td>';
            echo '<td>' . $row["email_sucursal"] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No se encontraron sucursales.";
        } ?>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-success text-white m-3" >Agregar Sucursal</button>
            <button class="btn btn-danger text-white m-3">Borrar Sucursal</button>
        </div>

    </div>
</div>

