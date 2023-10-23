<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnAgregarBarbero"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $especialidad = $_POST["especialidad"];
    $dni = $_POST["dni"];
    $sucursal = $_POST["sucursal"];

    // Prepara la consulta para insertar el nuevo barbero
    $stmt = $conn->prepare("INSERT INTO barberos (nombre, apellido, direccion, telefono, especialidad, dni, id_sucursal) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $nombre, $apellido, $direccion, $telefono, $especialidad, $dni, $sucursal);

    // Ejecuta la consulta
    if ($stmt->execute() === TRUE) {
        echo '<script>
                document.getElementById("mensajeExito").innerHTML = "Nuevo barbero agregado con éxito";
                document.getElementById("mensajeExito").style.display = "block";
                document.getElementById("mensajeError").style.display = "none";
              </script>';
    } else {
        echo '<script>
                document.getElementById("mensajeError").innerHTML = "Error: ' . $stmt->error . '";
                document.getElementById("mensajeError").style.display = "block";
                document.getElementById("mensajeExito").style.display = "none";
              </script>';
    }

    // Cierra la declaración y la conexión
    $stmt->close();
    $conn->close();
}
