<?php
if(!empty($_POST['btnContacto'])){
    if (empty($_POST['nombre']) or
        empty($_POST['apellido']) or
        empty($_POST['email']) or
        empty($_POST['asunto']) or
        empty($_POST['comentarios']))
        {
        echo '<div class="alert alert-danger mt-4">Uno o mas campos estan vacios</div>';
    } else {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $asunto = $_POST['asunto'];
        $comentarios = $_POST['comentarios'];
        try {
            $query = $conn->query ("INSERT INTO contacto (nombre,apellido,mail,asunto,comentarios) VALUES ('$nombre','$apellido','$email','$asunto','$comentarios')");
        } catch (Exception $e){
            echo '<div class="alert alert-danger mt-4">Error al enviar comentarios, intente nuevamente</div>';
        }
        if ($query == 1){
            echo '<div class="alert alert-success mt-4">La consulta se envió correctamente</div>';
            print "<script>window.setTimeout(function() { window.location = 'index.php' }, 3000);</script>";
        }
    }
}
?>