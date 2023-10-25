<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["idsucursal"])) {
    $idSucursal = $_GET["idsucursal"];

    $stmt = $conn->prepare("DELETE FROM sucursales WHERE id_sucursal = ?");
    $stmt->bind_param("i", $idSucursal);

    if ($stmt->execute() === TRUE) {
        echo '<script>alert("La sucursal ha sido borrada correctamente. Será redirigido al panel de control.");
                    window . location . href = "admin.php";
                </script>';
        exit();
    } else {
        echo "Error al borrar la sucursal: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
