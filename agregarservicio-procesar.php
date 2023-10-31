<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnAgregarServicio"])) {
    // datos del formulario
    $tipoServicio = $_POST["tiposervicio"];
    $valor = $_POST["valor"];

    // consulta para agregar el servicio
    $stmt = $conn->prepare("INSERT INTO servicios (tiposervicio, valor) VALUES (?, ?)");
    $stmt->bind_param("ss", $tipoServicio, $valor);

    // ejecuta la consulta
    if ($stmt->execute() === TRUE) {
        echo "<script>
                alert('Servicio agregado con éxito. Será redirigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al agregar el servicio. Será redirigido al panel de control');
                window.location.href = 'admin.php';
              </script>";
    }

    $stmt->close();
}
