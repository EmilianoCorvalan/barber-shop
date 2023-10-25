<?php
session_start();
include 'header.php';
include 'conexion.php';
$id = $_GET['idsucursal'];
$_POST['id'] = $id;

$nombre = $direccion = $ciudad = $telefono = $email = ''; // Se inicializan para que no generen error al no recibir los get al actualizar la sucursal.

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idsucursal"])) {
    $idSucursal = $_GET["idsucursal"];

    $stmt = $conn->prepare("SELECT nombre_sucursal, direccion_sucursal, ciudad_sucursal, telefono_sucursal, email_sucursal FROM sucursales WHERE id_sucursal = ?");
    $stmt->bind_param("i", $idSucursal);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $sucursal = $result->fetch_assoc();
        $nombre = $sucursal['nombre_sucursal'];
        $direccion = $sucursal['direccion_sucursal'];
        $ciudad = $sucursal['ciudad_sucursal'];
        $telefono = $sucursal['telefono_sucursal'];
        $email = $sucursal['email_sucursal'];
    } else {
        echo "No se encontró la sucursal.";
    }

    $stmt->close();
    $conn->close();
}
?>


<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="px-4">
            <h4 class="mt-4">Editar Sucursal</h4>
            <h6>Completa el siguiente formulario para editar una sucursal</h6>
            <hr>
        </div>

        <form action="" method="post">
            <input type="hidden" name="idsucursal" value="<?php echo $idSucursal; ?>">

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Nombre Sucursal</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Dirección</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?php echo $ciudad; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" minlength="8" maxlength="10" required>
                    </div>
                </div>
            </div>

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row p-4 my-2">
                <div class="col">
                    <input type="submit" class="btn btn-primary d-block mx-auto " value="Actualizar Sucursal" name="btnActualizarSucursal">
                </div>
            </div>
        </form>

        <!-- Mensaje de operación -->
        <div id="mensajeExito" class="alert alert-success" style="display:none;"></div>
        <div id="mensajeError" class="alert alert-danger" style="display:none;"></div>
    </div>
</section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnActualizarSucursal"])) {
    $idsucursal = $_POST["idsucursal"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    // Prepara la consulta para actualizar la sucursal
    $stmt = $conn->prepare("UPDATE sucursales SET nombre_sucursal=?, direccion_sucursal=?, ciudad_sucursal=?, telefono_sucursal=?, email_sucursal=? WHERE id_sucursal=?");
    $stmt->bind_param("sssssi", $nombre, $direccion, $ciudad, $telefono, $email, $idsucursal);

    // Ejecuta la consulta
    if ($stmt->execute() === TRUE) {
        echo "<script>
                alert('Sucursal actualizada con éxito.
                 Será redigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar la sucursal.
                 Será redigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    }

    // Cierra la declaración
    $stmt->close();
}
exit();
?>