<?php 
    session_start();
    include('header.php');
?>

<section class="first main-font container-fluid text-white d-flex justify-content-center">
    
    <div class="px-4 col-12 col-md-6 col-lg-6 col-xl-4">
        <h3 class="mt-4 text-center">Iniciar sesión</h3>

        <form method="POST" action="">

        <div class="form-group my-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
        </div>

        <div class="form-group my-2">
            <label for="apellido">Contraseña</label>
            <input type="password" class="form-control" id="apellido" name="password" placeholder="Ingrese su contraseña">
        </div>

        <?php
        include("conexion.php");
        include("controlador/controlador-login.php");
        ?>

        <div class="d-grid col-12 mx-auto">
            <input type="submit" name="btnLogin" class="btn btn-primary btn-lg my-4" value="Iniciar sesion">
            <a href="registrate.php" class="btn btn-dark btn-lg">Registrate</a>
        </div>
        </form>
    </div>
</section>

<?php include('footer.php');?>