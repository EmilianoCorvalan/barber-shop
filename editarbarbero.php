<?php
session_start();
include 'header.php';
include 'conexion.php';
$id = $_GET['idbarbero'];
$_POST['id'] = $id;

$nombre = $apellido = $direccion = $telefono = $especialidad = $dni = $id_sucursal = ''; //Se inicializan para que no generen error al no recibir los get al actualizar el barbero.

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idbarbero"])) {
    $idBarbero = $_GET["idbarbero"];

    $stmt = $conn->prepare("SELECT nombre, apellido, direccion, telefono, especialidad, dni, id_sucursal FROM barberos WHERE idbarbero = ?");
    $stmt->bind_param("i", $idBarbero);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $barbero = $result->fetch_assoc();
        $nombre = $barbero['nombre'];
        $apellido = $barbero['apellido'];
        $direccion = $barbero['direccion'];
        $telefono = $barbero['telefono'];
        $especialidad = $barbero['especialidad'];
        $dni = $barbero['dni'];
        $id_sucursal = $barbero['id_sucursal'];
    } else {
        echo "No se encontró el barbero.";
    }

    $stmt->close();
    $conn->close();
}
?>


<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="px-4">
            <h4 class="mt-4">Editar Barbero</h4>
            <h6>Completa el siguiente formulario para editar un barbero</h6>
            <hr>
        </div>

        <form action="" method="post">
            <input type="hidden" name="idbarbero" value="<?php echo $idBarbero; ?>">

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Apellido</label>
                        <input type="text" class="form-control" name="apellido" value="<?php echo $apellido; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Dirección</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Especialidad</label>
                        <input type="text" class="form-control" name="especialidad" value="<?php echo $especialidad; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">DNI</label>
                        <input type="text" class="form-control" name="dni" value="<?php echo $dni; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Sucursal</label>
                        <select type="number" class="form-control" name="sucursal" required>
                            <option value="1" <?php if ($id_sucursal == 1) echo 'selected'; ?>>Mataderos</option>
                            <!-- Agrega más opciones según las sucursales disponibles -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="row p-4 my-2">
                <div class="col">
                    <input type="submit" class="btn btn-primary d-block mx-auto " value="Actualizar Barbero" name="btnActualizarBarbero">
                </div>
            </div>
        </form>

        <!-- Mensaje de operación -->
        <div id="mensajeExito" class="alert alert-success" style="display:none;"></div>
        <div id="mensajeError" class="alert alert-danger" style="display:none;"></div>
    </div>
</section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnActualizarBarbero"])) {
    $idbarbero = $_POST["idbarbero"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $dni = $_POST["dni"];
    $sucursal = $_POST["sucursal"];

    // Prepara la consulta para actualizar el barbero
    $stmt = $conn->prepare("UPDATE barberos SET nombre=?, apellido=?, direccion=?, telefono=?, especialidad=?, dni=?, id_sucursal=? WHERE idbarbero=?");
    $stmt->bind_param("ssssssii", $nombre, $apellido, $direccion, $telefono, $especialidad, $dni, $sucursal, $idbarbero);

    // Ejecuta la consulta
    if ($stmt->execute() === TRUE) {
        echo "<script>
                alert('Barbero actualizado con éxito.
                 Será redigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
        
    } else {
        echo "<script>
                alert('Error al actualizar el barbero.
                 Será redigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    }

    // Cierra la declaración
    $stmt->close();
    }
    exit();
?>