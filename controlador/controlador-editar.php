<?php
if(!empty($_POST['btnEditar'])){
    if (empty($_POST['codArea']) or
        empty($_POST['telefono']) or
        empty($_POST['servicio']) or
        empty($_POST['fecha']) or
        empty($_POST['horas']) )//or
        //empty($_POST['barbero'])) FALLA AL VALIDAR EL BARBERO... QUE ONDA!!??
        {
        echo '<div class="alert alert-danger mt-4">Uno o mas campos estan vacios</div>';
        /*var_dump($_POST);
        print($_POST['codArea'].' cod<br>');
        print($_POST['telefono'].' telefono<br>');
        print($_POST['servicio'].' servicio<br>');
        print($_POST['fecha'].' fecha<br>');
        print($_POST['horas'].' hora<br>');
        print($_POST['barbero'].' barbero<br>');*/

    } else {//(fecha,time,mail,idServicio,cod_area,telefono)
        $fecha = $_POST['fecha'];
        $time = $_POST['horas'];
        $email = $_SESSION['email'];
        $idservicio = $_POST['servicio'];
        $cod_area = $_POST['codArea'];
        $telefono = $_POST['telefono'];
        $id = $_POST['id'];
        $idbarbero = $_POST['barbero'];
        try {
            $borrar = $conn->query ("DELETE FROM turnos WHERE idturno = $id"); 
            //echo 'entramos al try';
            //print_r($_POST);
            $query = $conn->query ("INSERT INTO turnos (fecha,time,mail,idservicio,cod_area,telefono, idbarbero) VALUES ('$fecha','$time','$email','$idservicio','$cod_area','$telefono','$idbarbero')");
            //echo 'termino la query';
            print "<script>window.setTimeout(function() { window.location = 'admin.php' }, 1000);</script>"; 
        } catch (Exception $e){
            echo  $e->getMessage();
            echo '<div class="alert alert-danger mt-4">Error al seleccionar el turno</div>';
        }
        /*
        if ($query == true){
            echo '<div class="alert alert-success mt-4">La consulta se emvio correctamente</div>';
            print "<script>window.setTimeout(function() { window.location = 'index.php' }, 3000);</script>";
        }*/
    }
}
?>