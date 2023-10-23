<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idbarbero"])) {
    $idBarbero = $_GET["idbarbero"];

    $stmt = $conn->prepare("DELETE FROM barberos WHERE idbarbero = ?");
    $stmt->bind_param("i", $idBarbero);

    if ($stmt->execute() === TRUE) {
        echo '<script>alert("El barbero ha sido borrado correctamente. Será redirigido al panel de control.");
                    window . location . href = "admin.php";
                </script>';
        exit();
    } else {
        echo "Error al borrar el barbero: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
