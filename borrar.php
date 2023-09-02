<?php 
    session_start();
    include 'header.php'; 
    if (isset($_SESSION['email'])){ 
        include 'conexion.php';
        
    ?>

<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
    <div class="px-4">
        <h6>¿Seguro quiere borrar el siguiente turno?</h6>

        <?php 
            $id = $_GET['idturno'];
            $_POST['idturno'] = $id;
            $query = $conn->query ("SELECT * FROM turnos WHERE idturno = '".$id."'");
            $turno = mysqli_fetch_array($query);
            echo "<h2>Se borrara el turno del dia: </h2>";
            echo "<h2>".$turno['fecha']."</h2>";
            echo "<h2>reservado a las: </h2>";
            echo "<h2>".$turno['time']."</h2>";?>

        <form method="POST">

           <?php
            include("conexion.php");
            include("controlador/controlador-eliminar.php");
            ?>
            
            <input type="submit" class="btn btn-primary d-block mx-auto " value="ELIMINAR" name="btnEliminar">
        </form>
<?php 
} else {
    header("location:login.php");
}
include 'footer.php'; ?>