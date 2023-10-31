<?php
session_start();
include 'header.php';
include 'conexion.php';
$id = $_GET['idservicio'];
$_POST['id'] = $id;

$tipoServicio = $valor = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idservicio"])) {
    $idServicio = $_GET["idservicio"];

    $stmt = $conn->prepare("SELECT tiposervicio, valor FROM servicios WHERE idservicio = ?");
    $stmt->bind_param("i", $idServicio);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $servicio = $result->fetch_assoc();
        $tipoServicio = $servicio['tiposervicio'];
        $valor = $servicio['valor'];
    } else {
        echo "No se encontró el servicio.";
    }

    $stmt->close();
    $conn->close();
}
?>

<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
        <div class="px-4">
            <h4 class="mt-4">Editar Servicio</h4>
            <h6>Completa el siguiente formulario para editar un servicio</h6>
            <hr>
        </div>

        <form action="" method="post">
            <input type="hidden" name="idservicio" value="<?php echo $idServicio; ?>">

            <div class="row px-4">
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Tipo de Servicio</label>
                        <input type="text" class="form-control" name="tiposervicio" value="<?php echo $tipoServicio; ?>" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="control-label text-white">Valor</label>
                        <input type="text" class="form-control" name="valor" value="<?php echo $valor; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row p-4 my-2">
                <div class="col">
                    <input type="submit" class="btn btn-primary d-block mx-auto " value="Actualizar Servicio" name="btnActualizarServicio">
                </div>
            </div>
        </form>

        <!-- Mensaje de operación -->
        <div id="mensajeExito" class="alert alert-success" style="display:none;"></div>
        <div id="mensajeError" class="alert alert-danger" style="display:none;"></div>
    </div>
</section>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnActualizarServicio"])) {
    $idservicio = $_POST["idservicio"];
    $tipoServicio = $_POST["tiposervicio"];
    $valor = $_POST["valor"];

    // Prepara la consulta para actualizar el servicio
    $stmt = $conn->prepare("UPDATE servicios SET tiposervicio=?, valor=? WHERE idservicio=?");
    $stmt->bind_param("ssi", $tipoServicio, $valor, $idservicio);

    // Ejecuta la consulta
    if ($stmt->execute() === TRUE) {
        echo "<script>
                alert('Servicio actualizado con éxito. Será redigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al actualizar el servicio. Será redigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    }

    // Cierra la declaración
    $stmt->close();
    exit();
}
?>