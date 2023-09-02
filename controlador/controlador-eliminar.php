<?php
if(!empty($_POST['btnEliminar'])){
    if (empty($_POST['idturno'])){
        echo '<div class="alert alert-danger mt-4">Uno o mas campos estan vacios</div>';
    } else {
        try {
            $id= $_POST['idturno'];
            $borrar = $conn->query ("DELETE FROM turnos WHERE idturno = $id"); 
            print "<script>window.setTimeout(function() { window.location = 'registroturnos.php' }, 3000);</script>";
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