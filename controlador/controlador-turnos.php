<?php
if(!empty($_POST['btnTurno'])){
    if (empty($_POST['codArea']) or
        empty($_POST['telefono']) or
        empty($_POST['servicio']) or
        empty($_POST['fecha']) or
        empty($_POST['horas'])or
        empty($_POST['barbero']))
        {
        echo '<div class="alert alert-danger container mt-4">Uno o mas campos estan vacios</div>';
        /*var_dump($_POST);
        print($_POST['codArea']);
        print($_POST['telefono']);
        print($_POST['servicio']);
        print($_POST['fecha']);
        print($_POST['horas']);
        print($_POST['barbero']);*/
        

    } else {//(fecha,time,mail,idServicio,cod_area,telefono)
        $fecha = $_POST['fecha'];
        $time = $_POST['horas'];
        $email = $_SESSION['email'];
        $idservicio = $_POST['servicio'];
        $cod_area = $_POST['codArea'];
        $telefono = $_POST['telefono'];
        $idbarbero = $_POST['barbero'];
        
        //Creamos los datos para mandar el mail de confirmacion.
        $subject = 'Recordatorio de turno';
        $message = 'Le recordamos que tiene turno el dia '.$fecha.' a las '.$time.PHP_EOL.'Lo esperamos.';
        
        try {
            $query = $conn->query ("INSERT INTO turnos (fecha,time,mail,idservicio,cod_area,telefono,idbarbero) VALUES ('$fecha','$time','$email','$idservicio','$cod_area','$telefono','$idbarbero')");
            //mail($email, $subject,$message);
            echo '<script>
                    alert("Su turno fue gestionado correctamente. Muchas gracias!")
                  </script>';
        } catch (Exception $e){
            echo  $e->getMessage();
            echo '<div class="alert alert-danger mt-4">Error al seleccionar el turno</div>';
        }/*
        if ($query == true){
            echo '<div class="alert alert-success mt-4">La consulta se emvio correctamente</div>';
            print "<script>window.setTimeout(function() { window.location = 'index.php' }, 3000);</script>";
        }*/
    }
}
?>