<?php
if(!empty($_POST['btnRegistro'])){
    if (empty($_POST['nombre']) or
        empty($_POST['apellido']) or
        empty($_POST['email']) or
        empty($_POST['password']))
        {
        echo '<div class="alert alert-danger mt-4">Uno o mas campos estan vacios</div>';
    }
    else{
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass_cifrado = hash ('sha256',$password.$email);
        try {
            $query = $conn->query ("INSERT INTO usuarios (nombre,apellido,mail,pass) VALUES ('$nombre','$apellido','$email','$pass_cifrado')");
        } catch (Exception $e){
            echo '<div class="alert alert-danger mt-4"> Error al insertar usuario, email ya registrado. </div>'; 
            print "<script>window.setTimeout(function() { window.location = 'registrate.php' }, 3000);</script>";
            exit();
        }
        if ($query == 1){
            echo '<div class="alert alert-success mt-4">Usuario registrado correctamente. Puede iniciar sesion</div>'; 
            print "<script>window.setTimeout(function() { window.location = 'login.php' }, 3000);</script>";
        }
        else{
            echo '<div class="alert alert-danger mt-4">Error al registrar, intente nuevamente</div>';
        }
    }
}
?>