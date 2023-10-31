<?php 
    session_start();
    include 'header.php'; 
    if (isset($_SESSION['email'])){ 
        include 'conexion.php';
        
    ?>

<section class="first main-font container-fluid d-flex justify-content-center text-light">
    <div class="col-12 col-md-8 col-lg-6 col-xl-6">
    <div class="px-4">
        <h2 class="mt-2 text-center">¿Seguro quiere borrar el siguiente turno?</h2>
        <br>

        <?php 
            $id = $_GET['idturno'];
            $_POST['idturno'] = $id;
            $query = $conn->query ("SELECT * FROM turnos WHERE idturno = '".$id."'");
            $turno = mysqli_fetch_array($query);
            echo "<h3 class='text-center'>Se borrara el turno del dia: </h3>";
            echo "<h2 class='text-center bg-warning bg-gradient bg-opacity-75'>".$turno['fecha']."</h2>";
            echo "<h2 class='text-center'>Reservado a las: </h2>";
            echo "<h3 class='text-center bg-warning bg-gradient bg-opacity-75'>".$turno['time']."</h3>";?>

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