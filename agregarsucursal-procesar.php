<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnAgregarSucursal"])) {
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    // Prepara la consulta para agregar la sucursal
    $stmt = $conn->prepare("INSERT INTO sucursales (nombre_sucursal, direccion_sucursal, ciudad_sucursal, telefono_sucursal, email_sucursal) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $direccion, $ciudad, $telefono, $email);

    // Ejecuta la consulta
    if ($stmt->execute() === TRUE) {
        echo "<script>
                alert('Sucursal agregada con éxito.
                 Será redirigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al agregar la sucursal.
                 Será redirigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    }

    // Cierra la declaración
    $stmt->close();
}
