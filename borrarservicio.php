<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idservicio"])) {
    $idServicio = $_GET["idservicio"];

    $stmt = $conn->prepare("DELETE FROM servicios WHERE idservicio = ?");
    $stmt->bind_param("i", $idServicio);

    if ($stmt->execute() === TRUE) {
        echo '<script>alert("El servicio ha sido borrado correctamente. Será redirigido al panel de control.");
                    window . location . href = "admin.php";
                </script>';
        exit();
    } else {
        echo "Error al borrar el servicio: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
